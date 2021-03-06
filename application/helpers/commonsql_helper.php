<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * This function will display the common page view with header content and footer.
 * Requires: path of content view and any data to pass to the view
 */


/* insert the data to table
 * $tableName -> Name of the table
 * $tableData -> Array -> Table data
 *  */
 
 //Insert Table
 if (!function_exists('insertTable')) {

    function insertTable($tableName, $tableData) {
        $CI = & get_instance();
        $CI->load->model('commonsql_model');
        return $insertid = $CI->commonsql_model->insert_table($tableName, $tableData);
    }

}
 if (!function_exists('getGuestLoginDeteails')) {

    function getGuestLoginDeteails($array) {
        $CI = & get_instance();
		$email = isset($array['email'])?$array['email']:'';
		$phone = isset($array['phone'])?$array['phone']:'';
		$user_fullname = isset($array['user_fullname'])?$array['user_fullname']:'';
		if($phone =='' && $email==''){
			return 0;
		}
        $CI->load->model('user_model');
		$check = $CI->user_model->select('user_master',array('email'=>strtolower($email),'phone'=>$phone));
		if($check->num_rows()>0){
			$ch = $check->row();
			return $ch->id;
		}
		else{
			$tableData =  array('user_fullname'=>  ucwords($user_fullname),'email'=>strtolower($email),'phone'=>$phone,'user_type'=>'GU','password'=>md5(md5(123456)));
        	return $insertid = $CI->user_model->insert('user_master', $tableData);
		}
    }

}



/* get the data to table
 * $result = selectTable($tableName, $whereData = array(),$showField = array('*'), $orWhereData=array(), $group = array(), $order = '', $having = '', $limit =array(), $result_way = 'all', $echo = 0);

 * $tableName -> string of database table name
 * $whereData -> Array -> An associative array in which array key should be table column and array value would be table column value
 * $showField -> Array -> string of database table column in comma separated or * for all column
 * $orWhereData -> Array -> An associative array in which array key should be table column and array value would be table column value
 * $group     -> Array -> an array of database column e.g array("user_id") so it gives output as group by user_id
 * $order     ->  string of database column with ASC or DESC parameter e.g 'user_id DESC'
 * $having    ->   string of database column with condition say sum('coin') > 0
 * $limit     ->  Array -> an array of limit string e.g array("10,0″) so this gives output as limit 0,10
 * $result_way -> string for output way
 * $echo       ->   0 or 1 . if you want the query string from codeigniter than set this value as 1
 *  */
if (!function_exists('selectTable')) {

    function selectTable($tableName, $whereData = array(), $showField = array('*'), $orWhereData = array(), $group = array(), $order = '', $having = '', $limit = array(), $result_way = 'all', $echo = 0,$inWhereData = array(),$notInWhereData = array()) {
        $CI = & get_instance();
        $CI->load->model('commonsql_model');
        return $resultData = $CI->commonsql_model->selectTable($tableName, $whereData, $showField, $orWhereData, $group, $order, $having, $limit, $result_way, $echo,$inWhereData,$notInWhereData);
    }

}

/* update the data to table
 * $tableName -> Name of the table
 * $whereData -> Array -> where fields
 * $updateData -> Array -> updated fields and data
 *  */
if (!function_exists('updateTable')) {

    function updateTable($tableName, $whereData = array(), $updateData = array()) {
        $CI = & get_instance();
        $CI->load->model('commonsql_model');
        return $resultData = $CI->commonsql_model->updateTable($tableName, $whereData, $updateData);
    }

}
/* update the data to table
 * $tableName -> Name of the table
 * $whereData -> Array -> where fields
 * $updateData -> Array -> updated fields and data
 *  */
if (!function_exists('deleteTableData')) {

    function deleteTableData($tableName, $whereData = array()) {
        $CI = & get_instance();
        $CI->load->model('commonsql_model');
        return $resultData = $CI->commonsql_model->deleteTableData($tableName, $whereData);
    }

}

/* $joins = array(
  array(
  'table' => 'table2',
  'condition' => 'table2.id = table1.id',
  'jointype' => 'LEFT'
  ),
  );

 * $group     -> Array -> an array of database column e.g array("user_id") so it gives output as group by user_id
 * $order     ->  string of database column with ASC or DESC parameter e.g 'user_id DESC'
 * $having    ->   string of database column with condition say sum('coin') > 0
 * $limit     ->  Array -> an array of limit string e.g array("10,0″) so this gives output as limit 0,10
 * $result_way -> string for output way
 * $echo       ->   0 or 1 . if you want the query string from codeigniter than set this value as 1
 */
if (!function_exists('get_joins')) {

    function get_joins($table, $columns, $joins, $whereData = array(), $orWhereData = array(), $group = array(), $order = '', $having = '', $limit = array(), $result_way = 'all', $echo = 0,$inWhereData = array()) {
		
		//echo $table;exit;
        $CI = & get_instance();
        $CI->db->select($columns)->from($table);
        if (is_array($joins) && count($joins) > 0) {
            foreach ($joins as $k => $v) {
                $CI->db->join($v['table'], $v['condition'], $v['jointype']);
            }
        }
        if (isset($whereData) && !empty($whereData)) {
            $CI->db->where($whereData);
        }
        if (isset($orWhereData) && !empty($orWhereData)) {
            $CI->db->or_where($orWhereData);
        }
        if (isset($inWhereData) && !empty($inWhereData)) {
            $CI->db->where_in($inWhereData[0],$inWhereData[1]);
        }
        if (!empty($group)) {
            $CI->db->group_by($group);
        }
        if ($order != '') {
            $CI->db->order_by($order);
        }
        if (count($limit)>0) {
            if (isset($limit[1])) {
                $CI->db->limit($limit[0],$limit[1]);//example $limit[0] = "0,10" where  0 is for offset and 10 for limit
            }else{ 
                $CI->db->limit($limit[0]);//example $limit[0] = "0,10" where  0 is for offset and 10 for limit
            }
        }
        $query = $CI->db->get();
        switch ($result_way) {
            case 'row':
                $result = $query->row();
                break;
            case 'row_array':
                $result = $query->row_array();
                break;
            case 'count':
                $result = $query->num_rows();
                break;
            default:
                $result = $query;
                break;
        }
        if ($echo == 1) {
            echo $CI->db->last_query();
            exit;
        }
        return $result;
    }

}


if (!function_exists('search_string_clean')) {

    function search_string_clean($search_value='') {
            if(!is_array($search_value) && $search_value!=''){
                $search_value= trim($search_value);
                return preg_replace('/[^a-zA-Z0-9_ \-()\/-]/s', '', $search_value); // Removes special chars.
            }else if(is_array($search_value)){
                //$temp = array (".com",".in",".aus",".cz");
                return $temp = preg_replace("/[^a-zA-Z0-9_ \-()\/-]/s", "", $search_value );
            }
            return $search_value;
        }
}
?>