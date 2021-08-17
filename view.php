<?php
   
 include 'include/header.php';
 include "Cart.php";
$cart = new Cart;
$cartItems = $cart->contents();
foreach($cartItems as $items){
$item=$items;
break;
}

//print_r($cartItems);

 ?>


<body>


<div class="container">
	<h3>Pay with Paypal :</h3>
	<!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post"> --> <!-- ACTIVE THIS LINE FOR REAL PAYPAL PAYMENT -->
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

	  <!-- Identify your business so that you can collect the payments. -->
	  <input type="hidden" name="business" value="marchanttj@pay.com">
	  <input type="hidden" name="return" value="http://localhost/shopping_cart/ok.php">
	  <input type="hidden" name="cancel_return" value="http://localhost/shopping_cart/cancel_order.php">

	  <!-- Specify a Buy Now button. -->
	  <input type="hidden" name="cmd" value="_xclick">

	  <!-- Specify details about the item that buyers will purchase. -->
	  <input type="hidden" name="item_name" value="<?php echo $item["name"];?>">
	  <input type="hidden" name="amount" value="<?php echo $cart->total();?>">
	  <input type="hidden" name="currency_code" value="USD">

	  <!-- Display the payment button. -->
	  <input type="image" name="submit" border="0"
	  src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
	  alt="Pay Now">
	  <img alt="" border="0" width="1" height="1"
	  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

	</form>
	<h3>Pay with Free :</h3>
   <a href="ok.php" class="btn btn-success orderBtn">OK<i class="glyphicon glyphicon-menu"></i></a> 

 <?php 
 // insert order details into database
 $insertOrder = $db->query("INSERT INTO orders (customer_id, total_price,request, status, created, modified) VALUES ('".$_SESSION['user_id']."', '".$cart->total()."','' ,'','".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");

 if($insertOrder){
     $orderID = $db->insert_id;
     $_SESSION['order_id']=$orderID;
     

     $sql = '';
     // get cart items
     $cartItems = $cart->contents();
     foreach($cartItems as $item){
        if(!isset($_SESSION['owner_username'])){
          $query_os = $db->query("SELECT `username` FROM `products` WHERE `id`='".$item['id']."'");
          $custRowos = $query_os->fetch_assoc();
          $_SESSION['owner_username']=$custRowos['username'];  
        }
        
         $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
     }
     // insert order items into database
     $insertOrderItems = $db->multi_query($sql);
     
     if($insertOrderItems){
         $cart->destroy();
         //echo "ok";
     }else{
     	?>
     	<script type="text/javascript">
     	    window.location.href = "checkout.php";
     	</script>
     	<?php
         header("Location: checkout.php");
         exit;
     }
 }else{
 	?>
 	<script type="text/javascript">
 	    window.location.href = "checkout.php";
 	</script>
 	<?php
     header("Location: checkout.php");
     exit;
 }
 ?>         

</body>
</html>