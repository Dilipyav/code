<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <section class="dashboard">
		<div class="container-fluid">
			<div class="row">
			
				<div class="col-lg-9">
					<div class="working-panel">
						<div class="class-provider">
							<h4 class="float-left">Add Student</h4>
						</div>
            <div class="col-lg-12">
              <?php 
                $sucess = $this->session->flashdata('success');
                $error = $this->session->flashdata('error');
                if($sucess) { echo "<p class='alert-success' style='text-align: center; padding: 10px;'>$sucess</p>"; }
                if($error) { echo "<p class='alert-danger' style='text-align: center; padding: 10px;'>$error</p>"; }
              ?> </div>
						<div class="class-form for-class">
							<form class="form-group" method="post" action="<?php echo base_url() ?>studentAdd/add" enctype="multipart/form-data">

                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Name:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                    <input type="text" required id="c_name" name="name" autocomplete="off" class="form-control">
                    </div>
                  </div>

                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Profile image:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                    <input type="file" name="image" required id="c_name" autocomplete="off" class="form-control">
                    </div>
                  </div>

                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Email:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                    <input type="email" required id="c_name" name="email" autocomplete="off" class="form-control">
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Mobile Number:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                    <input type="number" required id="c_name" name="number" autocomplete="off" class="form-control">
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Father Name:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                    <input type="text" required id="c_name" name="father-name" autocomplete="off" class="form-control">
                    </div>
                  </div>
                  
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>DOB:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                    <input type="date" required id="c_name" name="dob" autocomplete="off" class="form-control">
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Course Name:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                    <input type="text" required id="c_name" name="course-name" autocomplete="off" class="form-control">
                    </div>
                  </div>

                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Institute Name:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                    <input type="text" required id="c_name" name="institute-name" autocomplete="off" class="form-control">
                    </div>
                  </div>

                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong></strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                    <button class="submit" type="submit">Submit</button>
                    </div>
                  </div>
		
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
      $(document).ready(function () {
        $('.i-checks').iCheck({
          checkboxClass: 'icheckbox_square-green',
          // radioClass: 'iradio_square-blue',
        });            
      });
    </script>
    <script>
      $(document).ready(function(){
        $('#date_range .input-daterange').datepicker({
            format: 'dd-mm-yyyy',
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            minDate: new Date(2019,1-1,1)
            
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        $('.dataTables-example').DataTable();
      });  
    </script>
  </body> 
</html>
