<?php
   require_once('db_credentials.php');
    #put all db functions here
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); # show all errors and exeptions
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    function db_connect(){
        $connection=mysqli_connect(DB_SERVER,DB_USER, DB_PASS);
        db_error();
        mysqli_select_db($connection,DB_NAME )or die(mysql_error());      //open specific database it needs the connection too
         mysqli_set_charset($connection,'utf8'); 
        return $connection;
    }
    function db_disconnect($connection){
        if(isset($connection)){
            mysqli_close($connection);
        }
    }
    //handle db connection errors lynda.com
    function db_error(){
        if(mysqli_connect_errno()){
            $msg="Database connection failed ";
            $msg.=mysqli_connect_error();
            $msg.=" (".mysqli_connect_errno().")";
            exit($msg);
        }
    }
    #error checking for queries
    function confirm_qry($qry){
        if(!$qry){
            exit("Database query failed.");
        }
    }
    function post_request(){
        return $_SERVER['REQUEST_METHOD']=='POST';
    }
    function secure($password){
        return password_hash($password,PASSWORD_DEFAULT);
    }
    
    function escape_str($connection,$str){
        return mysqli_real_escape_string($connection,$str);
    }
    function set_purchase_qty(){
        return $_SESSION['qty']=$_POST['quantity'];
    }
    function set_cart($session){
       global $cart;
       $cart['product_id']=$_SESSION[$session];
       $cart['qty']=(int)set_purchase_qty();
    }
    function set_cart_id(){
        $cart['product_id']=$_SESSION['id1'];
        return $_SESSION['id1'];
    }
    function get_session_id($id){
        return $_SESSION[$id];
    }
    function cart(){
	    $sum="";
		$result=get_all_cart_items("cart");
		foreach($result as $item){
			$result=item($item['product_id']);
			$item_name=$result['product_name'];	//find the name of the product
			$item_cost=$result['product_price'];
			echo "<tr>";
				echo "<td>".$item_name."</td>";
				echo "<td>".$item_cost."</td>";
                echo "<td>".$item['qty']."</td>";
                echo "<td>".$item['total']."</td>";
				echo "<td>".$item['cart_date']."</td>";
			echo "</tr>";
		    total_cart($item['total']);
        }
    }
    function get_product_name(){
        global $index;
        global $data;
        $name=item($index['product_id']);
        return $index['product_name']=$name['product_name'];
    }
?>