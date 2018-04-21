<?php require('../../private/initialize.php');?>

<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Bag</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="cupcakes desserts ">
      	<meta name="author" content="Galya Stefanova">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../stylesheets/cart-style.css">
		<link rel="stylesheet" type="text/css" href="../stylesheets/global-style.css">
	</head>
	<body>
<?php include(SHARED_PATH.'/navigation.php'); ?>
	<div class="form-container">
        <h2> SHOPPING BAG </h2>
    </div>
    <div>
		<table>
			<tr>
				<th>Product Description</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				<th>Date</th>
			</tr>
		<?php cart();?>
	</table>
	<h3>TOTAL $   <?php echo get_sum(); ?></h3>
	</div>
    <?php include(SHARED_PATH.'/footer.php'); ?>
	</body>
</html>