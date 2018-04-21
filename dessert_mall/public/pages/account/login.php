
<?php require('../../../private/initialize.php');?>
<?php require(PRIVATE_PATH.'/valid_input_helpers.php'); ?>
<?php
#1.loggout user after certain time
#2. use regenerate_id correctly
    $username='';
    $password='';
    if(post_request()){
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
          $user=find_user($username);
          if($user){
              if(password_verify($password,$user['hashed_pass'])){
                  login($user);
                  redirect_to(url_for('pages/account/my_account.php'));
              }
          }
          else{
             redirect_to('login.php');
          }
        }
      }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sign in</title>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Galya Stefanova">
		<link rel="stylesheet" type="text/css" href="../../stylesheets/sign-in-style.css">
		<link rel="stylesheet" type="text/css" href="../../stylesheets/global-style.css">
	</head>
	<body>
    <?php include(SHARED_PATH.'/navigation.php'); ?>
	    <div class="layout">
			<div class="page-banner">
				<h1>SIGN IN</h1>
			</div>
        <div class="form-container">
            <div class="form-layout">
                <form action="<?php echo h('login.php'); ?>" method="post">
                    <h3>Sign in with your email and password</h3>
                        <div class="fields">
                            <label for="email">EMAIL ADDRESS</label><span class="required" >*</span><br>
                            <input type="text" id="email"name="username" autofocus><br>
                            <span class="required"><?php echo $errors['email'];?></span>
                        </div>
						            <div class="fields">
                            <label for="user_password">PASSWORD</label><span class="required">*</span><br>
                            <input type="password"  id="user_password" name="password"><br>
                            <span class="required"><?php echo $errors['password'];?></span>
							             <br><a style="margin-left:10px;" href="<?php echo url_for('pages/forgot_password.php') ?>">Forgot password?</a><br>
                        </div>
						            <div class="button-submit">
							             <input type="submit" name="register" value="SIGN IN" />
						            </div>
                </form> <!--end form-->
            </div>  <!-- end form layout -->
        </div> <!-- end form-container -->
    </div> <!-- end layout -->
<?php include(SHARED_PATH.'/footer.php'); ?>
</body>
</html>
