<?php 
 $send = mail("goahemtravels@gmail.com","test subject","test message","From:support@bookyourtrips.in");
 if($send){
echo "sent";
}else
 {
echo "not sent";
};
?>