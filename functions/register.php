<?php 
session_start();
include('flash.php');
$flash = new FlashMessage;
include('../dbConfig.php');
	if(isset($_POST['signup'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$phone=$_POST['phone'];
		$address=$_POST['address'];
	$sql="SELECT id FROM customers where email='$email'";
	$query = $db->query($sql);
    $row = $query->fetch_assoc();
    if(count($row)>0){
    	$flash->add("msg","This email already registered. Try New Email");
        ?>
        <script type="text/javascript">
            window.location.href = "../register.php";
        </script>
        <?php
    	header("Location:../register.php");
    	exit;
    }
    $sql2="INSERT INTO customers (name, email,password,phone,address, created, modified) VALUES ('$name','$email','$password','$phone','$address' ,'".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
    $query2 = $db->query($sql2);
    if($query2){
    	$_SESSION['logged_in']=true;
    	$_SESSION['user_id']=$db->insert_id;
    	$_SESSION['user_name']=$name;

    	$flash->add("msg","Registered Successfully.");
        ?>
        <script type="text/javascript">
            window.location.href = "../index.php";
        </script>
        <?php
    	header("Location:../index.php");
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