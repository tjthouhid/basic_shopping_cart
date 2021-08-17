
<?php include  "include/header.php";
if(!isset($_REQUEST['order_id'])){
    header("Location: index.php");
}
$order_id=$_REQUEST['order_id'];
$query2 = $db->query("SELECT *,products.name FROM order_items left join products on products.id=order_items.product_id WHERE order_id = '".$order_id."'");
?>
<div class="container">
    <a href="profile.php">Go Back</a>
    <h1 style="text-align: center;">Order Detail For Order ID : <?php echo $order_id;?></h1>

    <table width="100%" border="1" style="text-align: center;margin: 0px auto; max-width: 600px;">
    	<tr>
            <th>Product id</th>
    		<th>Product Name</th>
    		<th>Quantity</th>
    	</tr>
        <?php while($row = $query2->fetch_assoc()){ ?>
         
    	<tr>
            <td><?php echo $row['product_id'];?></td>
    		<td><?php echo $row['name'];?></td>
    		<td><?php echo $row['quantity'];?></td>
    	</tr>
        <?php }?>
    </table>
</div>
</body>
</html>