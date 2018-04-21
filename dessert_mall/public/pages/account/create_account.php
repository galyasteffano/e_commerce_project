<?php require('../../../private/initialize.php');?>
<?php require(PRIVATE_PATH.'/valid_input_helpers.php'); ?>
<?php
    clear_session();
    if(post_request()){
      $user['first_name']=$_POST['fname'];
      $user['last_name']=$_POST['lname'];
      $user['username']=$_POST['email'];
      $user['confirm_email']=$_POST['confirm_email'];
      $user['password']=$_POST['create_pass'];
      $user['confirm_pass']=$_POST['confirm_pass'];
      $user['sec_question']=$_POST['question'];
      $user['sec_answer']=$_POST['answer'];
 
      valid_first_name();
      valid_last_name();
      valid_email();
      validate_password();

      if(!errors()){
        $_SESSION['first_name']=$_POST['fname'];
        if(insert_user($user)){
           redirect_to(url_for('pages/account/thankyou.php'));
        }
      }
    }
?>

<!DOCTYPE html>
<html>
 <head>
    <title>Create Account</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Galya Stefanova">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../stylesheets/global-style.css">
    <link rel="stylesheet" type="text/css" href="../../stylesheets/create-account-style.css">
   

</head>
<body>
    <?php include(SHARED_PATH.'/navigation.php'); ?>
    <div class="layout">
        <div class="page-banner">
            <h1>CREATE YOUR ACCOUNT</h1>
        </div>
        <div class="form-container">
            <div class="form-layout">
                <form action="<?php echo url_for('pages/account/create_account.php'); ?>" method="post" novalidate>
                    <p>* Required fields</p>
                        <div class="fields">
                            <label for="first_name">FIRST NAME</label> <span class="required">*</span><br>
                            <input type="text" id="first_name" name="fname" value="<?php echo $user['first_name'];?>" autofocus><br>
                            <span class="required"><?php echo $errors['first_name'];?></span>
                        </div>
                        <div class="fields">
                            <label for="last_name">LAST NAME</label><span class="required">*</span><br>
                            <input type="text" id="last_name" name="lname" value="<?php echo $user['last_name'];?>"><br>
                            <span class="required"><?php echo $errors['last_name'];?></span>
                        </div>
                        <div class="fields">
                            <label for="email">EMAIL ADDRESS</label><span class="required">*</span><br>
                            <input type="text" id="email" name="email" value="<?php echo $user['username'];?>"><br>
                            <span class="required"><?php echo $errors['email'];?></span>
                       </div>
                        <div class="fields">
                            <label for="confirm_email">CONFIRM EMAIL</label><span class="required">*</span><br>
                            <input type="text" id="confirm_email" name="confirm_email" value="<?php echo $user['confirm_email'];?>"><br>
                            <span class="required"><?php echo $errors['e_repeat'];?></span>
                        </div>
                        <div class="fields">
                            <label>PASSWORD</label><span class="required">*</span><br>
                            <input type="password"  name="create_pass" maxlength="20"><br>
                            <p><small>7-20 Case sensitive characters, at least one number and one letter</small></p>
                            <span class="required"><?php echo $errors['password'];?></span>
                        </div>
                        <div class="fields">
                            <label>CONFIRM PASSWORD</label><span class="required">*</span><br>
                            <input type="password"  name="confirm_pass" maxlength="20"><br>
                            <span class="required"><?php echo $errors['confirm_pass'];?></span>
                        </div>
                        <div class="fields">
                         <select name="question" style="width:520px;">
                        <?php
                            $num_questions=count($questions);
                            for($index=0;$index<$num_questions;$index++){
                                echo "<option>"; #value=$question[] cuts the string after the first white space.
                                echo $questions[$index];
                                echo "</option>";
                            }
                        ?>
                         </select>
                         </div>
						             <div class="fields">
                            <label for="s_answer">SECURITY QUESTION ANSWER</label><br>
                            <input type="text" id="s_answer" name="answer">
						           </div>
						<div class="button-submit">
							<input type="submit" name="register" value="CREATE ACCOUNT" />
						</div>
                </form> <!--end form-->
            </div>  <!-- end form layout -->
        </div> <!-- end form-container -->
    </div> <!-- end layout -->
	  <?php include(SHARED_PATH.'/footer.php'); ?>
  </body>
</html>
