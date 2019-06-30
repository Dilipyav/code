<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student  Detail</title>
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
              <div class="" >
               
                  <h2 style="margin-bottom: 25px; margin-top: 0px;"class="heading" >Student  Detail</h2>
             
             
              <?php foreach ($student_detail as $student_detailes) {?>
                                               
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Profile image:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                   
                    <img class="img-circle" src=" <?=base_url().'public/uploads/profile_image/'.$student_detailes->std_image ?>" alt="Smiley face" width="100" height="100">
                    </div>
                  </div>
                                      
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Name:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $student_detailes->name ?>
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Certificate Number:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $student_detailes->certificate_num ?>
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Email:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $student_detailes->email ?>
                    </div>
                  </div>

                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Mobail Number:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $student_detailes->phone_num ?>
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Father Name:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $student_detailes->father_name ?>
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Data of Birth:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $student_detailes->dob ?>
                    </div>
                  </div>
              
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Course Type:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $student_detailes->course_name ?>
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <div class="form-group col-xs-4">
                      <strong>Institute Name:</strong>                                            
                    </div>
                    <div class="form-group col-xs-8">
                      <?= $student_detailes->institute_name ?>
                    </div>
                  </div>
                  
            
           <?php } ?>
          
         </div>
        </div>

        <?php $this->view('include/footer_view'); ?>
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
        var this_month_salary = 0;
        var sal_per_day = 0;
        var total_day = <?=$total_day?>;
        if (total_day > 0) {
          sal_per_day = monthly_salary / <?=$total_working_days?>;
          this_month_salary = monthly_salary - (sal_per_day * <?=$absent_full + ($absent_half/2)?>);
        }
        $('#this_month_salary').html(Math.round(this_month_salary * 100) / 100);
      }
    </script>

    <script>
      $(document).ready(function(){   
        $("#form_data").on("submit", function(e){     
          e.preventDefault()
          $.ajax({
              type: "POST",
              url: "<?=base_url()?>" + 'student_detail/view/' + "<?=$student_detail->id?>", 
              data: {student_detailtype: $("#student_detailtype").val()},
              cache:false,
              success: function(response){
                alert("Updated successfully");  
              }
          });// you have missed this bracket
          return false;
        });
      })
    </script>
    
  </body>
</html>
