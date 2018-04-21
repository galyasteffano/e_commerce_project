<?php require('../../../../private/initialize.php')?>
<?php require_admin_login();?>
<?php
	$id=$_GET['id'];
	$update_user=[];
	$result=find_user_details("users_tbl","user_id",$id);
	if(post_request()){
        $update_user['first_name']=$_POST['f_name'];
		$update_user['last_name']=$_POST['l_name'];
		$update_user['id']=$id;

		if(isset($_POST['cancel'])){
			redirect_to("users.php");
		}
		else if(isset($_POST['submit'])){
			update_user();
			header("location: users.php");
		}
		else if(isset($_POST['delete'])){
			header("location:delete.php?id=".$id);
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Galya Stefanova">
     <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/edit-style.css" />
     <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css" />
</head>
<body>
     <?php include(SHARED_PATH.' /admin_nav_inner.php'); ?>
    <form action="<?php echo h("edit.php?id=".$result['user_id']);?>" method="post">
    	<div class="edit">
    		<h3>UPDATE USER DATA: <!-- put order id here --></h3>
    		<div class="row-left">
    			<label for="name">First Name </label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="f_name" value="<?php echo $result['first_name'];?>">
    		</div>
    		<div class="row-left">
    			<label for="l_name">Last Name </label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="l_name" value="<?php echo $result['last_name'];?>">
    		</div>
    		<div class="row-left">
    			<label for="email_id">Email Address:</label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="email_id" value="<?php echo $result['email'];?>" disabled>
    		</div>
        </div><!-- END OF CLASS EDIT -->
    	<div class="menu">
    		<input class="btn" type="submit" name="submit" value="Submit"/>
    		<input class="btn" type="submit" name="cancel" value="Cancel"/>
    		<input class="btn" type="submit" name="delete" value="Delete"/>
    	</div>
	</form>
    <?php include(SHARED_PATH.'/footer.php');?>
   </body>
</html>
