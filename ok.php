<?php 
include  "include/header.php";
// insert order details into database
$username=$_SESSION['owner_username'];
$updateOrder = $db->query("UPDATE `orders` SET `request` = 'OP', `status` = 'CL',`username` = '$username' WHERE `id` ='".$_SESSION['order_id']."' ");


if($updateOrder){
        ?>
        <script type="text/javascript">
            window.location.href = "ok2.php";
        </script>
        <?php
        header("Location: ok2.php");
        exit;
    
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
