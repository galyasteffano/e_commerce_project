<?php require('../../../../private/initialize.php');?>
<?php require_admin_login(); ?>
<?php 
	$id=$_GET['id'];
	$data=select_item($id);
	$result=mysqli_fetch_array($data);
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
		$new_item = [];
		$new_item['product_id']=$_POST['item_id'];
		$new_item['product_name']=$_POST['item_name'];
		$new_item['product_price']=$_POST['item_price'];
		$new_item['available']=$_POST['item_avail'];
		if(isset($_POST['change'])){	#if the chage button was clicked
			$result= update_item();
            // $dbcon->close();
            if($result){
                header("location:show.php?id=".$new_item['product_id']);
                exit(); 
            }
		}
		if(isset($_POST['add'])){
			header("location:add.php");
			exit();
		}
		if(isset($_POST['delete'])){
			header("location:delete.php?id=".$new_item['product_id']);
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Item</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Galya Stefanova">
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/edit-style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css"/>
</head>
<body>
    <?php include (SHARED_PATH.' /admin_nav_inner.php'); ?>
    <form action="<?php echo h('update.php?id='.$result['product_id']); ?>" method="post" >
    	<div class="edit">
    		<h3>UPDATE ITEMS </h3>
    		<div class="row-left">
    			<label for="name">Item ID</label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="item_id" value="<?php echo $id; ?>">
    		</div>
    		<div class="row-left">	
    			<label for="item_name">Item Description</label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="item_name" value="<?php echo $result['product_name'];?>">
    		</div>
    		<div class="row-left">	
    			<label for="item_price">Item Price</label>
    		</div>
    		<div class="row-right">	
    			<input type="text" name="item_price" value="<?php echo $result['product_price']; ?>">
    		</div>
    		<div class="row-left">
    			<label for="item_avail">Available</label>
    		</div>
    		<div class="row-right">
    			<input type="text"	name="item_avail" value="<?php echo $result['product_available'];  ?>">
    		</div>
    	</div>
    	<div class="menu">
		   <input class="btn" type="submit" name="change" value="Change"/> 
    	   <input class="btn" type="submit" name="delete" value="Delete"/> 
		</div>
	</form>
    <?php include(SHARED_PATH.' /footer.php');?>
   </body> 
</html>