<?php 
session_start();
include('flash.php');
$flash = new FlashMessage;
$_SESSION['logged_in']=false;
$_SESSION['user_id']="";
$_SESSION['user_name']="";
unset($_SESSION['logged_in']);
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
$flash->add("msg","Logout Successfully.");
?>
<script type="text/javascript">
    window.location.href = "../index.php";
</script>
<?php
header("Location:../index.php");
?>