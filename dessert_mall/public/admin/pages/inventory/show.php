<?php require('../../../../private/initialize.php');?>
<?php require_admin_login(); ?>
<?php
#display the changes
    $item_id=$_GET['id'];
    $data=select_item($item_id);
    $result=mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Item</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Galya Stefanova">
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/buttons-style.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css"/>

</head>
<body>
	<?php include (SHARED_PATH.' /admin_nav_inner.php'); ?>
    <div class="edit">
        <h3>CHANGES MADE FOR ITEM ID: <?php echo $item_id; ?><!-- put order id here --></h3>
        <dd><?php echo $result['product_name']; ?></dd>
        <dd><?php echo $result['product_available'];?> </dd>
        <dd>$<?php echo $result['product_price'];?></dd>
    </div>
    <div class="menu">
    	<a class="btn-link" href="<?php echo url_for("admin/pages/inventory/");?>" >Back</a>
    </div>
    <?php include(SHARED_PATH.' /footer.php');?>
</body>
</html>
