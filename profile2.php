<?php include  "include/header.php";
$user_id=$_SESSION['user_id'];
$query = $db->query("SELECT * FROM orders WHERE customer_id = '$user_id' and status='CL'");
//$custRow = $query->fetch_assoc();
?>
<body>
<div class="container">
    <h1>Your Profile </h1>
    <h2>Name : <?php echo $_SESSION['user_name'];?></h2>
    <table width="100%" border="1" style="text-align: center;">
        <tr>
            <th>Order Id</th>
            <th>Total Price</th>
            <th>View Detail</th>
        </tr>
        <?php while($row = $query->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['total_price'];?></td>
            <td>
                <?php 
                $order_id=$row['id'];
                $query2 = $db->query("SELECT *,products.name FROM order_items left join products on products.id=order_items.product_id WHERE order_id = '".$order_id."'");
                while($row2 = $query2->fetch_assoc()){
                    echo "Product ID : ".$row2['product_id'];
                    echo "<br>";
                    echo "Product Name : ".$row2['name'];
                    echo "<br>";
                    echo "Quantity : ".$row2['quantity'];
                    echo "<hr>";
                }
                ?>
               <!--  <a href="order_detail.php?order_id=<?php echo $row['id'];?>">View</a> -->
            </td>

        </tr>
        <?php } ?>
   
</div>
<?php include  "include/footer.php";?>