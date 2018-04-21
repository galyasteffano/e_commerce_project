<?php require('../../../private/initialize.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thank You</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="cakes desserts ">
        <meta name="author" content="Galya Stefanova">
    </head>
    <body>
      <ul>
        <li><a class="active" href="<?php echo url_for('/index.php');?>">Go Shopping</a></li>
        <li><a href="<?php echo url_for('pages/account/my_account.php'); ?>">View Account</a></li>
      </ul>
      <div id="frame">
        <h1><?php echo $_SESSION['first_name']?? ''; ?>,Thank You For Registering!</h1>
      </div>
   </div>
    <?php include(SHARED_PATH.'/footer.php');?>
</body>
        
    
</html>