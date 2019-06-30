<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php $this->view('include/head_view'); ?>
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
          <div class="col-lg-12">
            <?php 
              $sucess = $this->session->flashdata('success');
              $error = $this->session->flashdata('error');
              if($sucess) { echo "<p class='alert-success' style='text-align: center; padding: 10px;'>$sucess</p>"; }
              if($error) { echo "<p class='alert-danger' style='text-align: center; padding: 10px;'>$error</p>"; }
            ?>
            <div class="ibox float-e-margins">
              <div class="ibox-title">
                <h5 class="heading" >Update Profile Image</h5> 
                <div class="ibox-tools">
                  <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  <a class="close-link"><i class="fa fa-times"></i></a>
                </div>
              </div>
                
              <div class="ibox-content">                                                                        
                <form class="form-group" method="post" action="<?php echo base_url() ?>update_profile" enctype="multipart/form-data">
                  <div class="row">                                
                    <div class="form-group col-lg-12">
                      <div class="form-group col-xs-4">
                        <strong>Upload image :</strong>                                            
                      </div>
                      <div class="form-group col-xs-8">
                        <div class="filename">
                          <input type="file" name="userfile" accept=".jpg" required />
                        </div>
                      </div>
                    </div>
                      
                    <div class="form-group col-lg-12">
                      <div class="form-group col-xs-4"><strong>&nbsp;</strong></div>
                      <div class="form-group col-xs-8">
                        <input type="submit" name="update" class="btn btn-success add-btn" value="Upload">
                      </div>
                    </div> 
                  </div>                            
                </form> 
              </div>
            </div>
          </div>
        </div>

        <?php $this->view('include/footer_view'); ?>
      </div>       
    </div>
    <!-- Mainly scripts -->
    <?php $this->view('include/footer_script_view'); ?>
  </body>
</html>
