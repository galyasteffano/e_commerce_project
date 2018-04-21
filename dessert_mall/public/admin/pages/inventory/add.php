<?php require('../../../../private/initialize.php');?>
<?php require_admin_login(); ?>
<?php
   if(post_request()){
       if(isset($_POST['add'])){
            $added=[];
            $added['id']=$_POST['item_id'];
            $added['name']=$_POST['item_name'];
            $added['price']=$_POST['item_price'];
            $added['available']=$_POST['item_avail'];
        #call query here and add to database
      		$result=add_item();
            if($result){
                header("location:show.php?id=".$added['id']);
                exit();
            }
		}
		if(isset($_POST['cancel'])){
			header("location:index.php");
		}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Galya Stefanova">
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/edit-style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css"/>
</head>
<body>
	 <?php include (SHARED_PATH.' /admin_nav_inner.php'); ?>
    <form action="<?php echo h('add.php'); ?>" method="post" >
    	<div class="edit">
    		<h3>ADD NEW ITEM <!-- put order id here --></h3>
    		<div class="row-left">
    			<label for="name">Item ID</label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="item_id">
    		</div>
    		<div class="row-left">
    			<label for="item_name">Item Description</label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="item_name">
    		</div>
    		<div class="row-left">
    			<label for="item_price">Item Price</label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="item_price">
    		</div>
    		<div class="row-left">
    			<label for="item_avail">Available</label>
    		</div>
    		<div class="row-right">
    			<input type="text"	name="item_avail" maxlength="1" >
    		</div>
        </div> <!--DIV  EDIT ENDS HERE  -->
    	<div class="menu">
			<input class="btn" type="submit" name="add" value="ADD"/>
            <input class="btn" type="submit" name="cancel" value="CANCEL"/>
		</div>
	</form>
    <?php include(SHARED_PATH.' /footer.php');?>
   </body>
</html>
