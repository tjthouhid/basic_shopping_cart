<?php include  "include/header.php";?>
<body>
<div class="container">
    <h1 class="text-center">Register</h1>
    <form class="form-horizontal" action="functions/register.php" method="post">
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" placeholder="Name" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" placeholder="Email" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="phone" placeholder="Phone" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="address" placeholder="Address" required=""></textarea>
        </div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success" name="signup">Register</button>
          <br>If have not register, Please <a href="login.php">Login Here</a>
        </div>
      </div>
    </form>
    
</div>
 <?php include  "include/footer.php";?>