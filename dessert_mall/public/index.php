
<?php require('../private/initialize.php');?>
<!DOCTYPE html>

<html lang="en">
     <head>
         <title>Dessert Mall</title>
         <meta charset="utf-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" type="text/css" media="all" href="stylesheets/global-style.css" >
         <link rel="stylesheet" type="text/css" media="all" href="stylesheets/dessertmall-style.css">
    </head>
    <body>
	<?php include(SHARED_PATH.'/navigation.php');?>
	<?php include(SHARED_PATH.'/header.php');?>
    <div class="layout">
		<div class="row">
			<div class="display" >
                <img src="images/cake1.jpg" alt="Cake"  >
			</div>
			<div class="display">
                <img src="images/cupcake1.jpg" alt="Cupcake" >
			</div>
			<div class="display">
                <img src="images/cookies1.jpg" alt="Cookie" >
			</div>
			</div>	<!-- end row -->               
			<div class="social">
				<h4>Follow us on</h4>
				<a href="#" class="fa fa-facebook"></a>
				<a href="#" class="fa fa-twitter"></a>
				<a href="#" class="fa fa-linkedin-square"></a>
				<a href="#" class="fa fa-instagram"></a>
				<br>
				<a href="<?php echo url_for('pages/contact_us.php') ?>">Contact us </a><br>
				<a href="#about-us">About us </a>
			</div>
		</div> <!-- end layout -->	
     <?php include(SHARED_PATH.'/footer.php');?>
    </body>
</html>