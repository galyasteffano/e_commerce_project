<?php require('../../private/initialize.php');?>
<?php 
   $products=find_products("CU");
   $cupcakes=mysqli_fetch_assoc($products);
   $cart=[];
   if(post_request()){
    if(isset($_POST['buy1'])){
       set_purchase_qty();
       set_cart("id1");
       if($result=add_to_cart(select(get_session_id("id1")))){
           redirect_to("cart.php");
       }
   }
   else if(isset($_POST['buy2'])){
       set_purchase_qty();
       set_cart("id2");
       if($result=add_to_cart(select(get_session_id("id2")))){
           redirect_to("cart.php");
       }
   }
   else if(isset($_POST['buy3'])){
       set_purchase_qty();
       set_cart("id3");
       if($result=add_to_cart(select(get_session_id("id3")))){
           redirect_to("cart.php");
       }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
      <title>Cupcakes</title>
      <meta charset="utf-8">
      <meta name="description" content="Free Web tutorials">
      <meta name="keywords" content="cupcakes desserts ">
      <meta name="author" content="Galya Stefanova">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" type="text/css" href="../stylesheets/global-style.css">
      <link rel="stylesheet" type="text/css" href="../stylesheets/items-style.css">
    </head>
    <body>
    <?php include(SHARED_PATH.'/navigation.php'); ?>
		<div class="page-banner">
			<h1>CAKES</h1>
		</div>
        <form action="<?php echo url_for('pages/cupcakes.php')?>" method ="post">
		 <div class="frame-items">
            <div class="box">
                <div class="pic">
                    <img src="../images/cupcake/ccake-1.jpg" alt="Cake" class="product">
                </div>                                      <!-- END OF PIC -->
                 
                <div class="details">
                    <p class="product-details"><?php echo $cupcakes['product_name']; ?> </p>
                    <p class="product-details">$<?php echo $cupcakes['product_price']; ?> </p>
                </div>                                      <!-- END OF DETAILS  -->
                <div class="bag">
                    <select name="quantity" class="qty">
                     <?php echo drop_menu("quantity"); ?>  
                    </select>
                    <?php $_SESSION['id1']=$cupcakes['product_id'];?>
                     <input type="submit" name="buy1" class="order" value="ADD TO BAG"/>
                </div>                                      <!-- END OF BAG -->
            </div>                                          <!--  END OF BOX -->
            <?php $cupcakes=mysqli_fetch_assoc($products); ?>
            <div class="box">
                <div class="pic">
                    <img src="../images/cupcake/ccake-2.jpg" alt="Cake" class="product">
                </div>                                      <!-- END OF PIC -->
                <div class="details">
                    <p class="product-details"> <?php echo $cupcakes['product_name']; ?></p>
                    <p class="product-details">$<?php echo $cupcakes['product_price']; ?></p>
                </div>                                      <!-- END OF DETAILS  -->
                <div class="bag">
                    <select name="quantity" class="qty">
                     <?php echo drop_menu("quantity"); ?>  
                    </select>
                    <?php $_SESSION['id2']=$cupcakes['product_id'];?>
                     <input type="submit" name="buy2" class="order" value="ADD TO BAG"/>
                </div>                                      <!-- END OF BAG -->
            </div>
            <?php $cupcakes=mysqli_fetch_assoc($products); ?>
            <div class="box">
                <div class="pic">
                    <img src="../images/cupcake/ccake-3.jpg" alt="Cake" class="product">
                </div>                                      <!-- END OF PIC -->
                <div class="details">
                    <p class="product-details"><?php echo $cupcakes['product_name']; ?></p>
                    <p class="product-details">$<?php echo $cupcakes['product_price']; ?></p>
                </div>                                      <!-- END OF DETAILS  -->
                <div class="bag">
                    <select name="quantity" class="qty">
                     <?php echo drop_menu("quantity"); ?>  
                    </select>
                    <?php $_SESSION['id3']=$cupcakes['product_id'];?>
                    <input type="submit" name="buy3" class="order" value="ADD TO BAG"/>
                </div>                                      <!-- END OF BAG -->
            </div>
        </div>                                              <!-- END OF FRAME -->  
        </form> 	
		<?php include(SHARED_PATH.'/footer.php'); ?>
    </body>
    </html>