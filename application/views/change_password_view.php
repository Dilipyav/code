<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <?php $this->view('include/head_view'); ?>
    <link href="<?=base_url().'public/css/plugins/iCheck/custom.css'; ?>" rel="stylesheet">
    <link href="<?=base_url().'public/css/plugins/datapicker/datepicker3.css' ?>" rel="stylesheet">
  </head>

  <body>
    <div id="wrapper">
      <nav class="navbar-default navbar-static-side" role="navigation">
        <?php $this->view('include/left_view'); ?>
      </nav>

      <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
          <?php $this->view('include/header_view'); ?>
        </div>

        <div class="wrapper wrapper-content">
          <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-10 col-lg-offset-3 col-md-offset-2 col-sm-offset-1 text-center">
              <?php 
                $sucess = $this->session->flashdata('success');
                $error = $this->session->flashdata('error');
                if($sucess) { echo "<p class='alert-success' style='text-align: center; padding: 10px;' id='msg_php'>$sucess</p>"; }
                if($error) { echo "<p class='alert-danger' style='text-align: center; padding: 10px;' id='msg_php'>$error</p>"; }
              ?>
              <p class='alert-danger' style='text-align: center; padding: 10px;  display: none;' id='missmatch'></p>
              <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5 class="heading" >Change Password</h5>
                  <div class="ibox-tools">
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    <a class="close-link"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="ibox-content">
                  <form method='post' name='change_password' action="<?=base_url().'change_password/change_password'?>" onSubmit="return onClickChangePassword()">
                    <input type='password' class="form-control m-b" placeholder='Current Password' id='current_password' name='current_password' required>
                    <input type='password' class="form-control m-b" placeholder='New Password' id='new_password' name='new_password' required>
                    <input type='password' class="form-control m-b" placeholder='Confirm Password' id='confirm_password' name='confirm_password' required>
                    <button class="btn btn-w-m btn-info" id='submitButton' type="submit"><i class="fa fa-check"></i> <span class="bold"> Submit</span></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <?php $this->view('include/footer_view'); ?>
      </div>
    </div>      
    <!-- Mainly scripts -->
    <?php $this->view('include/footer_script_view'); ?>
    <script src="<?=base_url().'public/js/plugins/datapicker/bootstrap-datepicker.js' ?>"></script>
    <script src="<?=base_url().'public/js/plugins/iCheck/icheck.min.js'; ?>"></script>
    <script src="<?=base_url().'public/js/jquery.dataTables.min.js'; ?>"></script>
    <script>
      function onClickChangePassword() {
        var currentPassword = $( "#current_password" ).val();
        var newPassword = $( "#new_password" ).val();
        var confirmPassword = $( "#confirm_password" ).val();

        if(!newPassword.match(/^.{6,}$/)) {
          $("#missmatch").html("Password minimum 6 character").show();
          return false;
        } else {
          if (newPassword !== confirmPassword) {
            if($('#msg_php').length) {
              $("#msg_php").hide();
            } 
            $("#missmatch").html("New password and Confirm password are not same!").show();
            return false;
          } else if(newPassword === currentPassword) {
              if($('#msg_php').length) {
                $("#msg_php").hide();
              }
              $("#missmatch").html("Current password and new password are same!").show();
              return false;
          } else {
              $("#missmatch").hide();
              return true;
          }
        }
      }
    </script>
  </body> 
</html>
