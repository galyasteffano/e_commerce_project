<?php require('../../private/initialize.php');?>
<?php require(PRIVATE_PATH.'/valid_input_helpers.php'); ?>
<?php
	if(post_request()){
		/*only used to display bad input back to the user.
		That way the user won't have to enter good input again. */
			$comment['f_name']=$_POST['first_name'];
			$comment['l_name']=$_POST['last_name'];
			$comment['email']=$_POST['email'];
			$comment['comment']=$_POST['comment']??'';
		if(isset($_POST['submit'])){
			if(is_blank($_POST['first_name'])){
				$errors['first_name']="Please enter you first name.";
			}
			else if(size_is_exeeded($_POST['first_name'],50) ||(!is_valid_name($_POST['first_name']))){
				$errors['first_name']="Please enter a valid first name.";
			}
			if(is_blank($_POST['last_name'])){
				$errors['last_name']="Please enter your last name.";
			}
			else if(size_is_exeeded($_POST['last_name'],60)||!is_valid_name($_POST['last_name'])){
				$errors['last_name']="Please enter a valid last name.";
			}
			if(is_blank($_POST['email'])){
				$errors['email']="Please enter your email.";
			}
			else if(size_is_exeeded($_POST['email'],60)||!is_valid_email($_POST['email'])){
				$errors['email']="Please enter a valid email address.";
			}
			else{
				$comment['f_name']=$_POST['first_name'];
				$comment['l_name']=$_POST['last_name'];
				$comment['comment']=clean_input($_POST['comment']);
				$comment['comment']=is_maxed($_POST['comment']);
				if(insert_comment()){
						redirect_to("index.php");	#redirect user to the main page
						exit;
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Contact Us</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="contact us dessert mall ">
      	<meta name="author" content="Galya Stefanova">
    	<link rel="stylesheet" type="text/css" href="../stylesheets/global-style.css">
		<link rel="stylesheet" type="text/css" href="../stylesheets/contact-us-style.css">
 	</head>
	<body>
    <?php include(SHARED_PATH.'/navigation.php'); ?>
    <div class="layout">
			<div class="page-banner">
				<h1>CONTACT US</h1>
			</div>
        <div class="form-container">
            <div class="form-layout">
                <form action="<?php echo h("contact_us.php");?>" method="post" novalidate>
					<div class="fields">
                      <label id="label" for="first_name">FIRST NAME</label><span class="required">*</span><br>
						<input type="text" name="first_name" id="first_name" value="<?php echo $comment['f_name'];?>" autofocus><br>
						<span class="required"><?php echo $errors['first_name'];?></span>
                   	</div>
					<div class="fields">
						<label for="last_name">LAST NAME</label><span class="required">*</span><br>
						<input type="text" name="last_name" id="last_name" value="<?php echo $comment['l_name'];?>"><br>
						<span class="required"><?php echo $errors['last_name'];?>
					</div>
					<div class="fields">
						<label for="email">EMAIL ADDRESS</label><span class="required">*</span><br>
						<input type="text" name="email" id="email" ><br>
						<span class="required"><?php echo $errors['email'];?></span>
					</div>
					<div class="fields">
						Your Comment<br>
						<textarea name="comment" ></textarea>
					</div>
					<div class="button-submit">
						<input type="submit" name="submit" value="SUBMIT" />
					</div>
                </form> <!--end form-->
            </div>  <!-- end form layout -->
        </div> <!-- end form-container -->
    </div> <!-- end layout -->
    <?php include(SHARED_PATH.'/footer.php'); ?>
	</body>
</html>
