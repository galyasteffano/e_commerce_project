<?php require('../../../../private/initialize.php');?>
<?php require_admin_login(); ?>
<?php
    $data=get_all_cart_items("cart");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Galya Stefanova">
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/admin-main-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/buttons-style.css" />
</head>
<body>
<?php include(SHARED_PATH.'/admin-nav.php');?>
    <header><h2>Welcome></h2></header>
	<div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>ORDER ID</th>
                    <th>ITEM</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>SUBTOTAL</th>
                    <th>DATE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $index){ ?>
                <tr>
                    <td><?php echo h($index['cart_id']);?></td>
                    <td><?php echo h($index['product_id']);?></td>
                    <?php get_product_name();?>
                    <td><?php echo h($index['product_name']);?></th>
                    <td><?php echo h($index['qty']);?></td>
                    <td><?php echo h($index['total']);?></td>
                    <td><?php echo h($index['cart_date']);?></td>
                    <td><a class="btn-edit" href="<?php echo "delete.php?id=".$index['cart_id'];?>"> Delete</a></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <?php include(SHARED_PATH.'/footer.php');?>
</body>
</html>
