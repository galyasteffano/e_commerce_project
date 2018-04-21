<?php require('../../../../private/initialize.php')?>
<?php require_admin_login(); ?>
<?php
    $del_id=$_GET['id'];
    $to_del=find_user_details("users_tbl","user_id",$del_id);

?>
<?php
    if(post_request()){
        var_dump($to_del);
        $del_id=$_GET['id'];
        if(isset($_POST['delete'])){
            $result=delete("users_tbl","user_id");
            if($result){
                header("location: users.php");
            }
        }
       else{ #must be cancel then
            header("location: users.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete User</title>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Galya Stefanova">
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/edit-style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/buttons-style.css"/>
</head>
<body>
	 <?php include (SHARED_PATH.' /admin_nav_inner.php'); ?>
    <div class="edit">
        <h3>Are you sure you want to delete</h3>
        <h3><?php echo $to_del['first_name']; ?></h3>
        <h3><?php echo $to_del['last_name']?> </h3>
        <h3><?php echo $to_del['email']?> </h3>
        <hr>
        <form action="<?php echo h("delete.php?id=".$to_del['user_id'])?>" method="post">
            <div class="tab">
                <input class="btn" type="submit" name="delete" value="Delete"/>
    	        <input class="btn" type="submit" name="cancel" value="Cancel"/>
            </div>
        </from>
    </div>
    <div class="tab">
		<a class="btn-link" href="<?php echo url_for("admin/pages/user/users.php")?>" >Back</a>
    </div>
<?php include(SHARED_PATH.'/footer.php');?>
   </body>
</html>
