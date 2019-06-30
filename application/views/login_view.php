<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Emtc| Login</title>

		<link href="<?= base_url() . 'public/css/bootstrap.min.css'; ?>" rel="stylesheet">
		<link href="<?= base_url() . 'public/font-awesome/css/font-awesome.css'; ?>" rel="stylesheet">
		<link href="<?= base_url() . 'public/css/animate.css'; ?>" rel="stylesheet">
		<link href="<?= base_url() . 'public/css/style.css'; ?>" rel="stylesheet">
	</head>

	<body class="gray-bg">
  <div class="visible-lg visible-md visible-sm hidden-xs col-lg-10 col-md-10 col-sm-12 col-lg-offset-1 col-md-offset-1">
      <div class="text-center" style="margin-top: 200px;" >

       
        <!-- <h2 class="logo-name" ></h2> -->
       <a href="#"> <img lass="logo" src="<?= base_url() . 'public/img/ logo.png'; ?>" alt="none of logo"  style="height:100px; width:  450px;"> </a>
      </div>
  </div>
  <div class=" visible-xs hidden-lg hidden-md hidden-sm col-xs-12 col-xs-offset-0">
      <div class="text-center" >
        <h2 style="color: #d1d1d1;"><strong></strong></h2>
      </div>
  </div>

  
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 ">
      <div class="text-center loginscreen animated fadeInDown">
        <div>
          <h3></h3>

          <?php if ($login_msg != '') { ?>
            <p style="color: red;">Email id and password does not match.</p>
          <?php } ?>

          <form class="m-t" method="post" role="form" action="<?= base_url() . 'login'; ?>">
            <div class="form-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
          </form>
          <!-- <p class="m-t"> <small> </small> </p> -->
        </div>
      </div>
    </div>

		<!-- Mainly scripts -->
		<script src="<?= base_url() . 'public/js/jquery-2.1.1.js'; ?>"></script>
		<script src="<?= base_url() . 'public/js/bootstrap.min.js'; ?>"></script>

	</body>

</html>
