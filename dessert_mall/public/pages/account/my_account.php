<?php require('../../../private/initialize.php');?>

<?php require_login();?>
 <?php
    // print_r($_SESSION);
    $account=[];    #save the account details in an array
    $id=$_SESSION['user_id'];
    $account=find_user_details("users_tbl","user_id",$id);
    $name=$account['first_name'];
    // var_dump($account);
 ?>
<!DOCTYPE html>
<html>
 <head>
    <title>My Account</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../stylesheets/global-style.css">
    <link rel="stylesheet" type="text/css" href="../../stylesheets/account-style.css">
    
</head>
<body>
<?php include(SHARED_PATH.'/account_nav.php'); ?>
    <div class="form-container">
        <h2> Welcome <?php echo $name;?> ! </h2>
    </div>
     <div class="account-body">
        <div class="left">
             <h3>PERSONAL INFORMATION</h3>
             <dl><?php echo $account['first_name'];?>  <?php echo $account['last_name'];?> </dl>
             <dl><?php echo $account['email'];?></dl>
        </div>
        <div class="right" >
            <dl><a class="underline" href="#">Order History</a></dl>
            <dl><a class="underline" href="#">Address Book</a></dl>
            <dl><a class="underline" href="#">Edit</a></dl>
            <dl><a class="underline" href="#">Change Password</a></dl>
        </div>
      </div>
<?php include(SHARED_PATH.'/footer.php'); ?>
</body>
</html>
