
<?php include  "include/header.php";
//$_SESSION['order_id']=15;
if(!isset($_SESSION['order_id'])){
    header("Location: index.php");
}
$order_id=$_SESSION['order_id'];
$query = $db->query("SELECT * FROM orders WHERE id = ".$order_id);
$custRow = $query->fetch_assoc();
unset($_SESSION['order_id']);
unset($_SESSION['owner_username']);

?>
<body>
<div class="container">
    <h1>Order Status</h1>
    <p>Your order has submitted successfully. Order ID is #<?php echo $order_id; ?></p>
    <table width="100%" border="1" style="text-align: center;">
    	<tr>
    		<th>Order Id</th>
    		<th>Total Price</th>
    		<th>View Detail</th>
    	</tr>
    	<tr>
    		<td><?php echo $custRow['id'];?></td>
    		<td><?php echo $custRow['total_price'];?></td>
    		<td>
                <?php 
                $order_id=$custRow['id'];
                $query2 = $db->query("SELECT *,products.name FROM order_items left join products on products.id=order_items.product_id WHERE order_id = '".$order_id."'");
                while($row = $query2->fetch_assoc()){
                    echo "Product ID : ".$row['product_id'];
                    echo "<br>";
                    echo "Product Name : ".$row['name'];
                    echo "<br>";
                    echo "Quantity : ".$row['quantity'];
                    echo "<hr>";
                }
                ?>
                <!-- <a href="order_detail.php?order_id=<?php echo $custRow['id'];?>">View</a> -->
            </td>

    	</tr>
    </table>
</div>
</body>
</html>