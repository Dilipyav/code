<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerificate varification</title>
    <?php $this->view('include/head_view'); ?>
    <link href="<?=base_url().'public/css/plugins/datapicker/datepicker3.css' ?>" rel="stylesheet">
    <style>
      #month_select select {
        text-align: center;
        text-align-last: center;
        /* webkit*/
      }
    </style>
  </head>

  <body style="background-color: #f4f2f2;">
    <div id="wrapper">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
<a href="#"> <img lass="logo" src="<?= base_url() . 'public/img/ logo.png'; ?>" alt="none of logo"  style="height:100px; width:  450px;"> </a>
        </div>
</div>
 
</nav>

      <div id="wrapper wrapper-content" class="gray-bg">
       
        <div class="wrapper wrapper-content">
          <div class="row">
            <div class="col-lg-12">
              <?php 
                $sucess = $this->session->flashdata('success');
                $error = $this->session->flashdata('error');
                if(!empty($certificate_detail)) {
                if($sucess) { echo "<p class='alert-success' style='text-align: center; padding: 10px;'>$sucess</p>"; }
                }else{
                if($error) { echo "<p class='alert-danger' style='text-align: center; padding: 10px;'>$error</p>"; }}
              ?>
               <?php if(empty($certificate_detail)) {?>
              <div class="ibox float-e-margins">
              
                <form class="form-group" method="post" action="<?php echo base_url() ?>certificate_varification/findCerticate" enctype="multipart/form-data">

              <div class="form-group col-lg-12">
                <div class="form-group col-xs-4">
                <h2 style="margin-bottom: 25px; margin-top: 0px;"class="heading" ><strong> Certicate Verification:</strong>  </h2>                                            
                </div>
                <div class="form-group col-xs-4">
                <input type="text" required id="c_name" name="certificate_number" autocomplete="off" class="form-control">
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
               <?php }?>
          </div>
          <div class="wrapper wrapper-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="" >
               
                  
             
             <?php if(!empty($certificate_detail)) {?>
              <?php foreach ($certificate_detail as $certificate_detailes) {?>
                                               
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Profile image:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                   
                    <img class="img-circle" src=" <?=base_url().'public/uploads/profile_image/'.$certificate_detailes->std_image ?>" alt="Smiley face" width="100" height="100">
                    </div>
                  </div>
                                      
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Name:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $certificate_detailes->name ?>
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Certificate Number:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $certificate_detailes->certificate_num ?>
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Email:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $certificate_detailes->email ?>
                    </div>
                  </div>

                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Mobail Number:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $certificate_detailes->phone_num ?>
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Father Name:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $certificate_detailes->father_name ?>
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Data of Birth:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $certificate_detailes->dob ?>
                    </div>
                  </div>
              
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Course Type:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $certificate_detailes->course_name ?>
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Institute Name:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $certificate_detailes->institute_name ?>
                    </div>
                  </div>
              <?php } ?>
           <?php } ?>
          
         </div>
        </div>
          <?php $this->view('include/footer_view'); ?>
        </div>
      </div>
    </div>
    <!-- Mainly scripts -->
    <?php $this->view('include/footer_script_view'); ?>
    <!-- Data picker -->
    <script src="<?=base_url().'public/js/plugins/datapicker/bootstrap-datepicker.js' ?>"></script>
    <script src="<?=base_url().'public/js/jquery.dataTables.min.js'; ?>"></script>
    <script>
      // $('#date_range .input-daterange').datepicker({
      //     format: 'yyyy-mm-dd',
      //     keyboardNavigation: false,
      //     forceParse: false,
      //     autoclose: true,
      // });
      $(document).ready(function() {
        $('.dataTables-example').DataTable();
      });

      function calculateSalary() {
        var monthly_salary = $('#monthly_salary').val();
        var salary = monthly_salary;
        $('#this_month_salary').html(salary);
      }
    </script>
  </body>
</html>
