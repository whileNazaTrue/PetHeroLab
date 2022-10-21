<?php
use Utils\Session;
require_once VIEWS_PATH . 'header.php';
include_once 'nav-bar.php';
?>
<main class="login-block-real">
    <div class="content">
<form action = "<?php echo FRONT_ROOT. "Auth/login" ?>" method="POST">

    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Pet Hero</h2>
		    <form class="login-form">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Email</label>
    <input type="text" name = "email" class="form-control" placeholder="pethero@gmail.com"required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" name = "password" class="form-control" placeholder="*******" required>
  </div>
  <div>
    <br>
    <button type="submit" class="btn btn-login float-right">Submit</button>
  </div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">

    </div>
</div>
</form>
<?php if (Session::VerifiyMessage()) { ?>
      <div class="alert alert-danger alert-dismissible fade show" style="text-align:center" role="alert">
           <?php echo $_SESSION['message'];
                 unset($_SESSION['message']); 
            ?>
     </div>
 <?php } ?>
</div>
</main>