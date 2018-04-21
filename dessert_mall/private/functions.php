<?php

function url_for($script_path){
	if($script_path[0]!='/'){
		$script_path="/".$script_path;
	}
	return WWW_ROOT.$script_path;
}
// url encode function
function ucode($string=""){
	return urlencode($string);
}
function h($string=""){
	return htmlspecialchars($string);
}
function redirect_to($location){
	header("Location: ".$location);
	exit;
}
function drop_menu($qty){
    $choices=array(1,2,3,4,5,6,7,8,9);
    $choices_sz=count($choices);
    $value='';
    $select= "<option value="."'".$value."'"." selected disabled hidden>";
    $select.= "Qty";
    $select.= "</option>";
    for($i=0;$i<$choices_sz;$i++){
        $value=$choices[$i];
        $select.="<option value=".$value.">".$choices[$i];
        if($qty==$choices[$i]){
            echo " selected";
        }
        $select.="</option>\n";
    }
 return $select;
}
function total(){
    global $quantity;
    global $price;
    $total=(int)$quantity*$price;
    return $total;
}

function get_sum(){
    global $sum;
    return $sum;
}
function total_cart($total){
    global $sum;
    $sum=$sum+$total;

}
function clear_session(){
    session_unset();
}

?>
