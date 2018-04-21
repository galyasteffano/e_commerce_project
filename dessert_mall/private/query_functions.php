<?php
    function find_all_data($tbl_name){
        global $db;     //must be made global or passed as param.
        $sql="SELECT * FROM $tbl_name ";
        $result=mysqli_query($db,$sql);
        confirm_qry($result);
        if(!$result){
            db_error();
            db_disconnect($db);
            exit;
        }
       return $result;
    }
    function find_products($type){
        $type=$type."%";
        global $db;
        $sql="SELECT * FROM products ";
        $sql.="WHERE product_id ";
        $sql.="LIKE '$type';";
        $qry=mysqli_query($db,$sql);
        confirm_qry($qry);
        return $qry;
    }
    function select_item($id){
        global $db;
        $sql="SELECT * FROM products ";
        $sql.="WHERE product_id ='$id'";
        $qry=mysqli_query($db,$sql);
        confirm_qry($qry);
        return $qry;
    }
    function update_item(){
        global $db;
        global $new_item;
        $qry="UPDATE products ";
        $qry.="SET product_name= ";
        $qry.="'".$new_item['product_name']."' ".",";
        $qry.="product_price= ";
        $qry.="'".$new_item['product_price']."'".",";
        $qry.=" product_available= ";
        $qry.="'".$new_item['available']."'";
        $qry.="WHERE product_id= ";
        $qry.="'".$new_item['product_id']."' ";
        $qry.="LIMIT 1".";";
        $result = mysqli_query($db, $qry) or die("Error: " . $db->errno . " : " . $db->error);
        if($result){
            return true;
        }
        else{
            echo mysqli_error($db);
            db_disconnect($db);
            exit();
        }
    }
    function update_user(){
        global $db;
        global $update_user;
        $qry="UPDATE users_tbl ";
        $qry.="SET first_name= ";
        $qry.="'".$update_user['first_name']."' ".",";
        $qry.="last_name= ";
        $qry.="'".$update_user['last_name']."' ";
        $qry.="WHERE user_id= ";
        $qry.="'".$update_user['id']."' ";
        $qry.="LIMIT 1".";";
        // echo $qry;
        $result = mysqli_query($db, $qry) or die("Error: " . $db->errno . " : " . $db->error);
        if($result){
            return true;
        }
        else{
            echo mysqli_error($db);
            db_disconnect($db);
            exit();
        }
    }
    function add_item(){
            global $db;
            global $added;
            $qry="INSERT INTO products ";
            $qry.="VALUES "."( ";
            $qry.="'".$added['id']."'".",";
            $qry.="'".$added['name']."'".",";
            $qry.="'".$added['price']."'".",";
            $qry.="'".$added['available']."' ";
            $qry.=")";
            $result=mysqli_query($db,$qry);
            return $result;
    }
    function delete_item($del_id){
        global $to_del;
        global $db;
        $qry="DELETE from products ";
        $qry.="WHERE product_id= ";
        $qry.="'".$del_id."'";
        $qry.="LIMIT 1 ".";";
        $result=mysqli_query($db,$qry);
         return $result;
    }
    function delete($del_tbl,$del_col){
        global $to_del;
        global $db;
        global $del_id;
        $qry="DELETE FROM ".$del_tbl;
        $qry.=" WHERE ".$del_col."= ";
        $qry.="'".$del_id."' ";
        $qry.=" LIMIT 1 ".";";
        $result=mysqli_query($db,$qry);
        confirm_qry($result);
         return $result;
    }
    function delete_order(){
        global $del_id;
        global $db;
        $qry="DELETE FROM cart ";
        $qry.=" WHERE cart_id= ";
        $qry.="'".$del_id."' ";
        $qry.=" LIMIT 1 ".";";
        $result=mysqli_query($db,$qry);
        confirm_qry($result);
        if($result){
            return true;
        }
        else{
            db_error();
            db_disconnect($db);
            exit;
        }

    }
    function insert_user($user){
        global $db;
        $qry="INSERT INTO users_tbl ";
        $qry.="(first_name,last_name,email,hashed_pass,hashed_q,hashed_a) ";
        $qry.="VALUES"."( ";
        $qry.="'".escape_str($db,$user['first_name'])."'".",";
        $qry.="'".escape_str($db,$user['last_name'])."'".",";
        $qry.="'".escape_str($db,$user['username'])."'".",";    #username->email
        $qry.="'".secure($user['password'])."'".",";
        $qry.="'".secure($user['sec_question'])."'".",";
        $qry.="'".secure($user['sec_answer'])."' ";
        $qry.=");";
        confirm_qry($qry);
        $result= mysqli_query($db,$qry);
        if($result){
            return true;
        }
        else{
            db_error();
            db_disconnect($db);
            exit;
        }
    }
    function insert_comment(){
        global $db;
        global $comment;
        $qry="INSERT INTO user_comments ";
        $qry.="(uc_first_name,uc_last_name,uc_email,user_comment) ";
        $qry.="VALUES"."( ";
        $qry.="'".escape_str($db,$comment['f_name'])."'".",";
        $qry.="'".escape_str($db,$comment['l_name'])."'".",";
        $qry.="'".escape_str($db,$comment['email'])."'".",";
        $qry.="'".escape_str($db,$comment['comment'])."' ";
        $qry.=");";
        confirm_qry($qry);
        $result= mysqli_query($db,$qry);
        if($result){
            return true;
        }
        else{
            db_error();
            db_disconnect($db);
            exit;
        }
    }
    function find_user($user){
        global $db;
        $qry="SELECT * FROM users_tbl ";
        $qry.="WHERE email=";
        $qry.="'".escape_str($db,$user)."'";
        $qry.="LIMIT 1";
        $qry_result=mysqli_query($db,$qry);
        confirm_qry($qry_result);
        $user=mysqli_fetch_assoc($qry_result);  #arr with user+password for that user
        mysqli_free_result($qry_result);
        return $user;
    }
    function select($id){
        global $db;
        $sql="SELECT * FROM products ";
        $sql.="WHERE product_id ='$id'";

        $qry=mysqli_query($db,$sql);
        confirm_qry($qry);
        $id=mysqli_fetch_assoc($qry);
        mysqli_free_result($qry);
        return $id;
    }
    function item_price($id){
        global $db;
        $sql="SELECT * FROM products ";
        $sql.="WHERE product_id ='$id'";

        $qry=mysqli_query($db,$sql);
        confirm_qry($qry);
        $qry=mysqli_fetch_assoc($qry);
        return $qry;
    }
    function item($id){
        global $db;
        $sql="SELECT * FROM products ";
        $sql.="WHERE product_id ='$id'";

        $qry=mysqli_query($db,$sql);
        confirm_qry($qry);
        $row=mysqli_fetch_assoc($qry);
        return $row;
    }
    function  add_to_cart($price){
        global $db;
        global $cart;
        $price=select($_SESSION['id1']);
        $total=(int)$cart['qty']*$price['product_price'];
        $cart['total']=$total;
        $cart['date']=date("Y-m-d");
        $qry="INSERT INTO cart ";
        $qry.="(product_id,qty,total,cart_date) ";
        $qry.="VALUES"."( ";
        $qry.="'".$cart['product_id']."'".",";
        $qry.="'".$cart['qty']."'".",";
        $qry.="'".$cart['total']."'".",";
        $qry.="'".$cart['date']."'";
        $qry.=");";
        confirm_qry($qry);
        $result= mysqli_query($db,$qry);
        return $result;
    }
#return the entire content of the table
    function get_all_cart_items($table){
        global $db;
        $sql="SELECT * FROM ". $table;
	    $qry=mysqli_query($db,$sql);
	    confirm_qry($qry);
	     return $result=mysqli_fetch_all($qry,MYSQLI_ASSOC);
    }
    #pull data from any table given $table: table name, $search_key: name of column, $key
    # is the search criteria
    function find_user_details($table,$search_key,$key){
        global $db;
        $sql="SELECT * FROM $table";
        $sql.=" WHERE ".$search_key." = "."'".$key."'";
        $qry=mysqli_query($db,$sql);
        confirm_qry($qry);
        $result=mysqli_fetch_assoc($qry);
        return $result;
    }
    function find_admin($user){
        global $db;
        $qry="SELECT * FROM admin_tbl ";
        $qry.="WHERE username=";
        $qry.="'".escape_str($db,$user)."'";
        $qry.="LIMIT 1";
        $qry_result=mysqli_query($db,$qry);
        confirm_qry($qry_result);
        $user=mysqli_fetch_assoc($qry_result);  #arr with user+password for that user
        mysqli_free_result($qry_result);
        return $user;
    }
    function add_admin($user){
        global $db;
        $qry="INSERT INTO admin_tbl ";
        $qry.="(first_name,last_name,username,pass) ";
        $qry.="VALUES"."( ";
        $qry.="'".escape_str($db,$user['first_name'])."'".",";
        $qry.="'".escape_str($db,$user['last_name'])."'".",";
        $qry.="'".escape_str($db,$user['username'])."'".",";    #username->email
        $qry.="'".secure($user['password'])."' "/*."," */;
        $qry.=");";
        confirm_qry($qry);
        $result= mysqli_query($db,$qry);
        if($result){
            return true;
        }
        else{
            db_error();
            db_disconnect($db);
            exit;
        }
    }
?>
