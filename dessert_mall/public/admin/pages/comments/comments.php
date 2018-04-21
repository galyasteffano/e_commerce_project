<?php require('../../../../private/initialize.php');?>
<?php require_admin_login(); ?>
<?php
    #get data from table
    $sql="SELECT * FROM user_comments ";
    $sql.=";";
    $comments=mysqli_query($db,$sql);
    confirm_qry($comments);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Comments</title>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Galya Stefanova">
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/admin-main-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/global-style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../../public/stylesheets/buttons-style.css" />
</head>
<body>
 <?php include (SHARED_PATH.' /admin_nav_inner.php'); ?>
    <header><h2>Comments of Website Visitors</h2></header>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL ADDRESS</th>
                    <th>COMMENT</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($comment=mysqli_fetch_assoc($comments)){ ?>
                <tr>
                    <td><?php echo ($comment['uc_first_name']); ?>   </td>
                    <td><?php echo ($comment['uc_last_name']);?> </td>
                    <td><?php echo ($comment['uc_email']);?> </td>
                    <td>
                      <textarea  rows="3" cols="40" class="comments" wrap="hard" disabled>
                        <?php echo ($comment['user_comment']);?>
                      </textarea>
                    </td>
                 </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php include(SHARED_PATH.' /footer.php');?>
</body>
</html>
