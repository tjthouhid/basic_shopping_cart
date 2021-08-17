<?php 
session_start();
include('flash.php');
$flash = new FlashMessage;
include('../dbConfig.php');
	if(isset($_POST['signin'])){
		$email=$_POST['email'];
		$password=md5($_POST['password']);
	$sql="SELECT * FROM customers where email='$email' && password='$password'";
	$query = $db->query($sql);
    $row = $query->fetch_assoc();
    if(count($row)>0){
        $_SESSION['logged_in']=true;
        $_SESSION['user_id']=$row['id'];
        $_SESSION['user_name']=$row['name'];

        $flash->add("msg","Logged in Successfully.");
        ?>
        <script type="text/javascript">
            window.location.href = "../index.php";
        </script>
        <?php
        header("Location:../index.php");
        exit;
    	
    }else{
        $flash->add("msg","Wrong Email/Password. Try Again.");
        ?>
        <script type="text/javascript">
            window.location.href = "../login.php";
        </script>
        <?php
        header("Location:../login.php");
        exit;
    }
    

	}else{
		
		
		$flash->add("msg","You are Not authorise to view this page");
        ?>
        <script type="text/javascript">
            window.location.href = "../index.php";
        </script>
        <?php
		header("Location:../index.php");
	}
?>