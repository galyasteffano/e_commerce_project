<?php require('../../private/initialize.php');?>
<?php require(PRIVATE_PATH.'/valid_input_helpers.php'); ?>
<?php
	if(post_request()){
		if(isset($_POST['send_email'])){
				$email='';
				if(is_blank($_POST['email'])){
					$errors['email']="Please enter your email address.";
				}
				else if(size_is_exeeded($_POST['email'],80)||!is_valid_email($_POST['email'])){
					$errors['email']="Please enter a valid email address.";
				}
				else{
					$email=$_POST['email'];
				}
		}
		if(isset($_POST['ans_question'])){
			//redirect to different page where user selects question to answer
			// the answer is checked against what's in the database and if no match
			//is found a message shoud be displayed.
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Forgot Password</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" type="text/css" href="../stylesheets/forgot-password-style.css">
		<link rel="stylesheet" type="text/css" href="../stylesheets/global-style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<body>
    <?php include(SHARED_PATH.'/navigation.php'); ?>
	    <div class="layout">
			<div class="page-banner">
				<h1>FORGOT PASSWORD</h1>
			</div>
        <div class="form-container">
            <div class="form-layout">
                <form action="<?php echo h('forgot_password.php'); ?>" method="post" novalidate>
                    <h4>Please provide your email address to reset your password. Once entered,
										<br> you can choose either: receive an email or answer your security<br> question.
					</h4>
					<div class="fields">
            			<label for="email">EMAIL ADDRESS</label><span class="required">*</span><br>
              			<input type="text" id="email" name="email" autofocus><br>
						<span class="required"><?php echo $errors['email'];?></span>
            		</div>
					<div class="button-submit">
						<input type="submit" name="send_email" value="SEND ME AN EMAIL" />
					</div>
					<div class="button-submit">
						<input type="submit" name="ans_question" value="RESET BY SECURITY QUESTION" />
					</div>
				</form> <!--end form-->
            </div>  <!-- end form layout -->
        </div> <!-- end form-container -->
    </div> <!-- end layout -->
 <?php include(SHARED_PATH.'/footer.php'); ?>
	</body>
</html>
