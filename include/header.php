<?php
// include database configuration file
ob_start();
session_start();
include('dbConfig.php');
include('functions/flash.php');
$flash = new FlashMessage;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
    <style>
    .container{padding: 50px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
</head>
</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Shopping Cart</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li><a href="login.php">Logout <span class="sr-only">(current)</span></a></li> -->
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <?php if(isset($_SESSION['logged_in'])){?> 
        <li><a href="profile.php"><?php echo $_SESSION['user_name'];?></a></li>
        <li><a href="profile2.php">Profile 2</a></li>
        <li><a href="functions/logout.php">Logout</a></li>
        <?php } else { ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <?php }?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>