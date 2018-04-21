<?php require('../../../../private/initialize.php');?>
<?php require_admin_login(); ?>
<?php
        $del_id=$_GET['id'];
        $data=select_item($del_id);
        $to_del=mysqli_fetch_assoc($data);
?>
<?php
    if(post_request()){
        if(isset($_POST['delete'])){
            $result=delete_item($del_id);
            if($result){
                header("location: index.php");
            }
        }
       else{ #must be cancel 
             header("location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Item</title>
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
        <h3>Are you sure you want to delete " <?php echo $to_del['product_name']; ?> "?</h3>
        <hr>
        <form action="<?php echo h("delete.php?id=".$to_del['product_id'])?>" method="post">
            <div class="tab">
                <input class="btn" type="submit" name="delete" value="Delete"/>
    	        <input class="btn" type="submit" name="cancel" value="Cancel"/>
            </div>
        </from>
    </div>
    <div class="tab">
		<a class="btn-link" href="<?php echo url_for("admin/pages/index.php");?>" >Back</a>
    </div>
<?php include('../../../../private/shared/footer.php');?>
   </body>
</html>
