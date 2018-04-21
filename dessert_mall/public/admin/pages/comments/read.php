<?php require('../../../../private/initialize.php');?>
<?php require_admin_login(); ?>
  <?php
    $id=$_GET['id'];
   
    /* not implemented not sure if I want this functionality */
  ?>
  
<!DOCTYPE html>
<html>
<head>
	<title>Read Customer Comment</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/edit-style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css"/>
</head>
<body>

<div class="edit">
    <textarea id ="comment" row="55" col="7" disabled>some text</textarea>
</div>
<form action="#" method="post">
    <div class="menu">
    <input class="btn" type="submit" name="remove" value="REMOVE"/> 
    	
    <input class="btn" type="submit" name="back" value="BACK"/> 
    </div>
</form>
<?php require('../../../../private/shared/footer.php');?>
</body> 
</html>