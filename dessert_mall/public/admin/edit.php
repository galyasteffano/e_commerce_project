

<?php require('../../private/initialize.php');?>
<?php 
/*THIS PAGE IS NOT IMPLEMENTED IN THIS PROJECT. IT SHOULD PROCESS SHIPPING  INFO.*/
	$id=$_GET['id'];
	echo $id;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Order</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="../../../public/stylesheets/edit-style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../public/stylesheets/global-style.css"/>
</head>
<body>
	<ul>
	 	<li><a href="../index.php">MAIN</a></li>
		<li style="float:right"><a class="active" href="">SIGN OUT</a></li>
    </ul>
    <form action="#">
    	<div class="edit">
    		<h3>ORDER ID: <!-- put order id here --></h3>
    		<div class="row-left">
    			<label for="name">Customer Name:</label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="name">
    		</div>
    		<div class="row-left">	
    			<label for="customer-contact">Customer Contact Info:</label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="customer-contact">
    		</div>
    		<div class="row-left">	
    			<label for="shipping-adrs">Shipping Address:</label>
    		</div>
    		<div class="row-right">	
    			<textarea id="subject" name="subject" style="height:100px"></textarea>
    		</div>
    		<div class="row-left">
    			<label for="shipping-date">Shipping Date:</label>
    		</div>
    		<div class="row-right">
    			<input type="text"	name="shipping-date">
    		</div>
    		<div class="row-left">
    			<label for="delivery-date">Delivery Date:</label>
    		</div>
    		<div class="row-right">
    			<input type="text" name="delivery-date">
    		</div>
    	</div>
    	<div class="menu">
    		<input class="btn" type="submit" name="Submit" value="Submit"/>
    		<input class="btn" type="submit" name="Cancel" value="Cancel"/>  
    		<input class="btn" type="submit" name="Delete" value="Delete"/> 
    	</div>
	</form>
    <?php require('../../private/shared/footer.php');?>
   </body> 
</html>