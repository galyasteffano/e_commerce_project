<?php require('../../../../private/initialize.php');?>
<?php require_admin_login(); ?>
<?php $users=find_all_data("users_tbl");?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Galya Stefanova">
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/admin-main-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/buttons-style.css" />
</head>
<body>
<?php include(SHARED_PATH.'/admin-nav.php');?>
    <header><h2>Registered Users</h2></header>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>USER ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL ADDRESS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($user=mysqli_fetch_assoc($users)){ ?>
                <tr>
                    <td><?php echo h($user['user_id']); ?>   </td>
                    <td><?php echo h($user['first_name']);?> </td>
                    <td><?php echo h($user['last_name']);?> </td>
                    <td><?php echo h($user['email']);?> </td>
                    <td><a class="btn-edit" href="<?php echo 'edit.php?id='.$user['user_id'];?>">Edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php include(SHARED_PATH.'/footer.php');?>
</body>
</html>
