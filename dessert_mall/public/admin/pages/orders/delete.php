<?php require('../../../../private/initialize.php');?>
<?php require_admin_login(); ?>
<?php
  $id=$_GET['id'];
?>
<?php
    if(post_request()){
        $del_id=$id;
        if(isset($_POST['delete'])){
            $result=delete_order();
            if($result){
                header("location: index.php");

            }
        }
       else{ #must be cancel then
                header("location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Order</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Galya Stefanova">
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/edit-style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/buttons-style.css"/>
</head>
<body>
	<ul>
	 	<li><a href="../index.php">MAIN</a></li>
		<li style="float:right"><a class="active" href="">SIGN OUT</a></li>
    </ul>
    <div class="edit">
        <h3>Are you sure you want to delete this order?</h3>
        <hr>
        <form action="<?php echo h("delete.php?id=".$id);?>" method="post">
            <div class="tab">
                <input class="btn" type="submit" name="delete" value="YES"/>
    	        <input class="btn" type="submit" name="cancel" value="NO"/>
            </div>
        </from>
    </div>
<?php include(SHARED_PATH.' /footer.php');?>
   </body>
</html>
