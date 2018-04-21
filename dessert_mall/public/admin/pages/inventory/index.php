<?php require('../../../../private/initialize.php');?>
<?php require_admin_login(); ?>
<?php $data=find_all_data("products"); ?>
<?php $img=""; /* for future updates. The db is designed to allow images.*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Galya Stefanova">
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/admin-main-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/buttons-style.css" />
</head>
<body>
<?php include(SHARED_PATH.' /admin-nav.php');?>
    <header><h2>Available Items</h2></header>
    <div style="overflow-x:auto;height:800px;">
    <div #id="btn-position">
    <a class="button" href="<?php echo url_for("admin/pages/inventory/add.php")?>" >Add Item</a>
    </div>
        <table>
            <thead>
                <tr>
                    <th>ITEM ID</th>
                    <th>ITEM PIC</th>
                    <th>ITEM DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>AVAILABLE(Y/N)</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php while($item =mysqli_fetch_assoc($data)) {;?>
                <tr>
                    <td><?php echo $item['product_id'];?>           </td>
                    <td><?php echo $img;?>          </td>
                    <td><?php echo $item['product_name'];?>    </th>
                    <td>$<?php echo $item['product_price']; ?>       </td>
                    <td><?php echo $item['product_available'];?>    </td>
                    <td><a class="btn-edit" href="<?php echo 'update.php?id='.$item['product_id'];?>">Update</a></td>
                </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>
    <?php include(SHARED_PATH.' /footer.php');?>
</body>
</html>
