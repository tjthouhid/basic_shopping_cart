
<?php include  "include/header.php";
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
$query = $db->query("SELECT * FROM orders WHERE id = ".$_REQUEST['id']);
$custRow = $query->fetch_assoc();


?>
<body>
<div class="container">
    <h1>Order Status</h1>
    <p>Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
    <table width="100%" border="1" style="text-align: center;">
    	<tr>
    		<th>Order Id</th>
    		<th>Total Price</th>
    		<th>View Detail</th>
    	</tr>
    	<tr>
    		<td><?php echo $custRow['id'];?></td>
    		<td><?php echo $custRow['total_price'];?></td>
    		<td><a href="order_detail.php?order_id=<?php echo $custRow['id'];?>">View</a></td>

    	</tr>
    </table>
</div>
</body>
</html>