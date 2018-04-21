<?php require('../../private/initialize.php');?>
<?php
  if(post_request()){
    if(isset($_POST['close'])){
      redirect_to('index.php');
      exit;
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thank You</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Galya Stefanova">
        <link rel="stylesheet" type="text/css" href="../../stylesheets/global-style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
  <body>
    <h2>We could not process your request at this time.</h2>
    <form action="<?php h('error.php');?>">
      	<input type="submit" name="close" value="Close" />
    </form>
    <?php include(SHARED_PATH.'/footer.php');?>
</body>


</html>
