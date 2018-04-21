<?php require('../../private/initialize.php');?>
<?php 
   $products=find_products("CA");
    $cakes=mysqli_fetch_assoc($products);
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
         <title>Cakes</title>
         <meta charset="utf-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="keywords" content="cakes desserts ">
         <meta name="author" content="Galya Stefanova">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" type="text/css" href="../stylesheets/global-style.css">
         <link rel="stylesheet" type="text/css" href="../stylesheets/items-style.css">
    </head>
    <body>
    <?php include(SHARED_PATH.'/navigation.php'); ?>
        <div class="page-banner">
			<h1>CAKES</h1>
        </div>
        <form action="<?php echo url_for('pages/cakes.php');?>" method ="post">
		 <div class="frame-items">
            <div class="box">
                <div class="pic">
                    <img src="../images/cake/cake-1.jpg" alt="Cake" class="product">
                </div>                                      <!-- END OF PIC -->
                 <div class="details">
                    <?php $_SESSION['id1']=$cakes['product_id'];?>
                    <p class="product-details"><?php echo $cakes['product_name']; ?> </p>
                    <p class="product-details">$<?php echo $cakes['product_price']; ?> </p>
                </div>                                      <!-- END OF DETAILS  -->
                <?php $cakes=mysqli_fetch_assoc($products); ?>
                <div class="bag">
                    <select name="quantity" class="qty">
                     <?php echo drop_menu("quantity"); ?>  
                    </select>
                     <input type="submit" name="buy1" class="order" value="ADD TO BAG"/>
                </div>                                      <!-- END OF BAG -->
            </div>                                          <!--  END OF BOX -->
            <div class="box">
                <div class="pic">
                    <img src="../images/cake/cake-2.jpg" alt="Cake" class="product">
                </div>                                      <!-- END OF PIC -->
                <div class="details">
                    <?php $_SESSION['id2']=$cakes['product_id'];?>
                    <p class="product-details"> <?php echo $cakes['product_name']; ?></p>
                    <p class="product-details">$<?php echo $cakes['product_price']; ?></p>
                </div>                                      <!-- END OF DETAILS  -->
                <?php $cakes=mysqli_fetch_assoc($products); ?>
                <div class="bag">
                    <select name="quantity" class="qty">
                     <?php echo drop_menu("quantity"); ?>  
                    </select>
                <input type="submit" name="buy2" class="order" value="ADD TO BAG"/>
                </div>                                      <!-- END OF BAG -->
            </div>
            <div class="box">
                <div class="pic">
                    <img src="../images/cake/cake-3.jpg" alt="Cake" class="product">
                </div>                                      <!-- END OF PIC -->
                <div class="details">
                    <?php $_SESSION['id3']=$cakes['product_id'];?>
                    <p class="product-details"><?php echo $cakes['product_name']; ?></p>
                    <p class="product-details">$<?php echo $cakes['product_price']; ?></p>
                </div>                                      <!-- END OF DETAILS  -->
                <div class="bag">
                    <select name="quantity" class="qty">
                     <?php echo drop_menu("quantity"); ?>  
                    </select>
                    <input type="submit" name="buy3" class="order" value="ADD TO BAG"/>
                </div>                                      <!-- END OF BAG -->
            </div>
        </div>                                              <!-- END OF FRAME --> 
     </form>
<?php mysqli_free_result($products); ?>  
<?php include(SHARED_PATH.'/footer.php'); ?>
    </body>
    </html>