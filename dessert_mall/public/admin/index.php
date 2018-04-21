
<?php require ('../../private/initialize.php');?>
<?php require (PRIVATE_PATH.'/valid_input_helpers.php'); ?>
<?php
  $username='';
  $password='';
    if(post_request()){
      if(isset($_POST['new_admin'])){
        redirect_to('pages/create_admin.php');
        exit;
      }
      $username='';
      $password= '';
      if(is_blank($_POST['username'])){
        $errors['email']="Please enter your email address.";
      }
      else if(size_is_exeeded($_POST['username'],80)||!is_valid_email($_POST['username'])){
        $errors['email']="Please enter a valid email address.";
      }

      if(is_blank($_POST['password'])){
        $errors['password']="Please enter your password.";
      }
      else{
        $username=$_POST['username'];
        $password=$_POST['password'];
        $admin=find_admin($username);
        if($admin){
            if(password_verify($password,$admin['pass'])){
                admin_login($admin);
                redirect_to(url_for('admin/pages/inventory'));
            }
            else{
              $errors['password']="No match was found.";
            }
        }
        else{
           redirect_to('index.php');
        }
      }
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <meta charset="utf-8" >
    <meta name="author" content="Galya Stefanova">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="../../public/stylesheets/admin-main-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../public/stylesheets/global-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../public/stylesheets/buttons-style.css" />
  </head>
  <body>
    <h2> PLEASE SIGN IN </h2>
    <div class="form-container">
      <form action="<?php echo h('index.php'); ?>" method="post" novalidate>
        <div class="fields">
          <label for="email">EMAIL ADDRESS</label><span class="required" >*</span><br>
          <input type="text" id="email" name="username" autofocus><br>
          <span class="required"><?php echo $errors['email'];?></span>
        </div>
        <div class="fields">
          <label for="user_password">PASSWORD</label><span class="required">*</span><br>
          <input type="password" id="user_password" name="password"><br>
          <span class="required"><?php echo $errors['password'];?></span>
      </div>
      <div class="button-submit">
        <input type="submit" name="sign_in" value="Sign in" />
        <input type="submit" name="new_admin" value="Create Admin" />
      </div>
    </form> <!--end form-->
  </div> <!-- end form-container -->
<?php include(SHARED_PATH.'/footer.php');?>
  </body>
</html>
