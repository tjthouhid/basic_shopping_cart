<h1><?php  //$_SESSION['email'];?></h1>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php 
 //print_r($_SESSION);
 $msg = $flash->render("msg");


 ?>
 <script type="text/javascript">
 	jQuery(function($){
 		var msg="<?php echo $msg;?>";
 		if(msg){
 			alert(msg);
 		}
 	});
 </script>
</body>
</html>