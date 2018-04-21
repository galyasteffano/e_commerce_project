
<?php $total='' ?>
<ul>
	<li><a href="<?php echo url_for('index.php'); ?>">DESSERT MALL</a></li>
	<li><a href="<?php echo url_for('pages/cakes.php'); ?>">CAKES</a></li>
	<li><a href="<?php echo url_for('pages/cupcakes.php'); ?>">CUPCAKES</a></li>
	<li><a href="<?php echo url_for('pages/cookies.php'); ?>">COOKIES</a></li>
	<li style="float:right"><a class="active" href="<?php echo url_for('pages/cart.php');?>">BAG <?php echo $total;?></a></li>
	
	<li style="float:right"><a class="active" href="<?php echo url_for('pages/account/login.php');?>">SIGN IN</a></li>
	<li style="float:right"><a class="active" href="<?php echo url_for('pages/account/create_account.php');?>">SIGN UP</a></li>
</ul>