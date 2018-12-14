<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends CI_Controller {

    function __construct() {
        parent::__construct(); //echo "hi";exit;
        $this->load->helper('custom_helper');
    }

    function index() {

        $loginuser_id = $this->session->userdata('user_id');
        $pnr = $this->session->userdata('bk_pnr_no');
        if ($pnr != '') {
            $userDetails = payment_user_details($pnr, $loginuser_id);
            $total_amount = $userDetails['net_price'];
//            echo "<pre>";print_r($this->session->all_userdata());
//            echo "<pre>";print_r($userDetails);
            $mypayment = checkbal_mypayment($loginuser_id, 2);
            $balance = (int) $mypayment - (int) $userDetails['total_amount'];
            $pay_amount = $balance * -1;
        }
//            if ($balance <=0) {
//                
//            }echo $balance;
//            exit;

        $address = '';
        $zip_code = '';
        $city = '';
        $state = '';
        $whereData = array('id' => $loginuser_id);
        $user_info = selectTable('user_master', $whereData);
        if ($user_info->num_rows() > 0) {
            $userinfo = $user_info->row();
            $address = $userinfo->address;
            $zip_code = $userinfo->zip_code;
            $city = $userinfo->city;
            $state = $userinfo->state;
        }
        if (count($userDetails) > 0 && $pay_amount > 0) {
//                echo $balance;
            $pay_amount = 1;
//            exit;
            $this->session->set_userdata('order_id', 1);
            $merchant_data = '';
            $working_key = '258F2674D98E07B367821344FA3558E5'; //Shared by CCAVENUES
            $access_code = 'AVDQ81FK89CC75QDCC'; //Shared by CCAVENUES
            $merchant_data.='tid=' . date('Ymdhis') . '&';
            $merchant_data.='merchant_id=' . '169177' . '&';
            $merchant_data.='order_id=' . $pnr . '&';
            //$merchant_data.='amount='.'1.00'.'&';
            $merchant_data.='amount=' . $pay_amount . '&';
            $merchant_data.='currency=' . 'INR' . '&';
            $merchant_data.='redirect_url=' . base_url() . 'response' . '&';
            $merchant_data.='cancel_url=' . base_url() . 'response' . '&';
            $merchant_data.='language=' . 'EN' . '&';
            $merchant_data.='billing_name=' . $userDetails['user_fullname'] . '&';
            $merchant_data.='billing_address=' . $address . '&';
            $merchant_data.='billing_city=' . $city . '&';
            $merchant_data.='billing_state=' . $state . '&';
            $merchant_data.='billing_zip=' . $zip_code . '&';
            $merchant_data.='billing_country=' . 'India' . '&';
            $merchant_data.='billing_tel=' . $userDetails['phone'] . '&';
            $merchant_data.='billing_email=' . $userDetails['email'];

            $encrypted_data = $this->encrypt($merchant_data, $working_key);
            ?>
            <form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
                <?php
                echo "<input type=hidden name=encRequest value=$encrypted_data>";
                echo "<input type=hidden name=access_code value=$access_code>";
                ?>
            </form>
            <script language='javascript'>document.redirect.submit();</script>
            <?php
        }
    }

    function response() {

        $workingKey = '258F2674D98E07B367821344FA3558E5';
        $encResponse = $_POST["encResp"];
        $rcvdString = $this->decrypt($encResponse, $workingKey);  //Crypto Decryption used as per the specified working key.
        $order_status = "";
        $order_status = "";
        $order_id = "";
        $card_name = "";
        $tracking_id = "";
        $payment_amount = "";
        $updatedata = array();
        $decryptValues = explode('&', $rcvdString);
        $dataSize = sizeof($decryptValues);
        for ($i = 0; $i < $dataSize; $i++) {
            $information = explode('=', $decryptValues[$i]);
            if ($i == 0)
                $order_id = $information[1];

            if ($i == 3)
                $order_status = $information[1];

            if ($i == 6)
                $card_name = $information[1];

            if ($i == 5)
                $payment_mode = $information[1];

            if ($i == 1)
                $tracking_id = $information[1];

            if ($i == 10)
                $payment_amount = $information[1];

            if ($i == 12)
                $updatedata['address'] = $information[1];

            if ($i == 15)
                $updatedata['zip_code'] = $information[1];

            if ($i == 13)
                $updatedata['city'] = $information[1];

            if ($i == 14)
                $updatedata['state'] = $information[1];
        }
        // print_r($decryptValues);

        $loginuser_id = $this->session->userdata('user_id');
        if (count($updatedata) > 0) {
            $whereData = array('id' => $loginuser_id);
            $result = updateTable('user_master', $whereData, $updatedata);
        }
        if ($order_status === "Success") {
            //echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
            $loginuser_id = $this->session->userdata('user_id');

            $pnr = $this->session->userdata('bk_pnr_no');
            if ($pnr != '' && $order_id == $pnr) {
                $userDetails = payment_user_details($pnr, $loginuser_id);
                $trip_amount = $userDetails['net_price'];
                // echo "<pre>";print_r($this->session->all_userdata());
                //echo "<pre>";print_r($userDetails);
                if ($this->session->userdata('user_type') != 'VA') {
                    $loginuser_id = $userDetails['user_id'];
                }
                //  Cash Deposited to B2b /b2c
                $paymentdata = array(
                    'userid' => $loginuser_id,
                    'transaction_notes' => 'Cash Deposited',
                    'from_userid' => -1,
                    'book_pay_id' => 0,
                    'book_pay_details_id' => 0,
                    'pnr_no' => $order_id,
                    'trip_id' => 0,
                    'deposits' => $trip_amount, //$payment_amount,
                    'status' => 2);
                //print_r($paymentdata);exit;
                make_mypayment($paymentdata);
                //Amount Move to B2b /b2c to BYT 
                $paymentdata = array(
                    'userid' => 0,
                    'transaction_notes' => 'Trip has been booked ' . $pnr,
                    'withdrawal_notes' => 'Office Booking PNR' . $pnr,
                    'pnr_no' => $pnr,
                    'from_userid' => $loginuser_id,
                    'deposits' => $trip_amount,
                    'status' => 2);
                if (make_mypayment($paymentdata)) {

                    //UPDATE PAYMENT DETAILS
                    $updatedata = array(
                        'payment_type' => 1, // 1 - net, 2 - credit, 3 - debit
                        'payment_status' => 1,
                        'status' => 2);

                    //$pnr_no = $this->session->userdata('bk_pnr_no');

                    trip_book_paid_sucess($updatedata, $order_id, 1);

                    //CLEAR BOOKING SESSIONS
                    $array_items = array('bk_no_of_adult', 'bk_no_of_children', 'bk_no_of_infan', 'bk_from_date', 'bk_usecouponcode',
                        'bk_to_date', 'bk_location', 'bk_pnr_no');
                    $this->session->unset_userdata($array_items);

                    redirect('PNR-status/' . $pnr);
                }
            }
        } else if ($order_status === "Aborted") {
            $this->session->set_userdata('err', 'Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail');
            redirect('PNR-status/' . $pnr . '/5');
            //echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
        } else if ($order_status === "Failure") {
            $this->session->set_userdata('err', 'Thank you for shopping with us.However,the transaction has been declined.');
            redirect('PNR-status/' . $pnr . '/6');
            //echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
        } else {
            $this->session->set_userdata('err', 'Security Error. Illegal access detected');
            redirect('/');
        }exit;
        $this->session->set_userdata('order_id', '');
        $this->session->unset_userdata('order_id');
        //$this->cart->destroy();
    }

    function encrypt($plainText, $key) {
        $secretKey = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
        $blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
        $plainPad = $this->pkcs5_pad($plainText, $blockSize);
        if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1) {
            $encryptedText = mcrypt_generic($openMode, $plainPad);
            mcrypt_generic_deinit($openMode);
        }
        return bin2hex($encryptedText);
    }

    function decrypt($encryptedText, $key) {
        $secretKey = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = $this->hextobin($encryptedText);
        $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
        mcrypt_generic_init($openMode, $secretKey, $initVector);
        $decryptedText = mdecrypt_generic($openMode, $encryptedText);
        $decryptedText = rtrim($decryptedText, "\0");
        mcrypt_generic_deinit($openMode);
        return $decryptedText;
    }

    //*********** Padding Function *********************

    function pkcs5_pad($plainText, $blockSize) {
        $pad = $blockSize - (strlen($plainText) % $blockSize);
        return $plainText . str_repeat(chr($pad), $pad);
    }

    //********** Hexadecimal to Binary function for php 4.0 version ********

    function hextobin($hexString) {
        $length = strlen($hexString);
        $binString = "";
        $count = 0;
        while ($count < $length) {
            $subString = substr($hexString, $count, 2);
            $packedString = pack("H*", $subString);
            if ($count == 0) {
                $binString = $packedString;
            } else {
                $binString.=$packedString;
            }

            $count+=2;
        }
        return $binString;
    }

}
