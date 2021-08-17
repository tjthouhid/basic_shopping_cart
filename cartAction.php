<?php
ob_start();
// session_start();
// include 'include/header.php';
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;
// include database configuration file
include 'dbConfig.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM products WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['user_id'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orders (customer_id, total_price, created, modified) VALUES ('".$_SESSION['user_id']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                ?>
                <script type="text/javascript">
                    window.location.href = "orderSuccess.php?id=<?php echo $orderID;?>";
                </script>
                <?php
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                ?>
                <script type="text/javascript">
                    window.location.href = "checkout.php";
                </script>
                <?php
                header("Location: checkout.php");
            }
        }else{
            ?>
            <script type="text/javascript">
                window.location.href = "checkout.php";
            </script>
            <?php
            header("Location: checkout.php");
        }
    }else{
        ?>
        <script type="text/javascript">
            window.location.href = "index.php";
        </script>
        <?php
        header("Location: index.php");
    }
}else{
    ?>
    <script type="text/javascript">
        window.location.href = "index.php";
    </script>
    <?php
    header("Location: index.php");
}

?>