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
                  <h5 class="heading" >My student list</h5> 
                  <div class="ibox-tools">
                  <span>
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                   
                  </div>
                  
                </div>
              <div class="ibox float-e-margins">
                <div class="ibox-content">
                  <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                      <tr class="text-center">
                        <th class="text-center">S.No.</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Mobail Number</th>
                        <th class="text-center">Genrate Certificate </th>
                        <th class="text-center">Course Type</th>
                        <th class="text-center"> Certificate status</th>
                        <th class="text-center" style="max-width:45%;">Action</th>
                      </tr>
                    </thead>
                    <tbody style="color: #000;">
                      <?php foreach ($student_list as $index => $student) {  ?>
                        <tr>
                          <td class="text-center"><?=$index+1?> </td>
                          <td class="text-center"><?=($student->name)?></td>
                          <td class="text-center"><?=($student->phone_num)?></td>
                          <td class="text-center">
                          <div class="btn-group">
                                  <button class="btn btn-success" <?=$student->status=='Yes'?'disabled':''?>><a href="<?=base_url().'student_detail/genrateCerticateNumber/'.$student->std_id;?>"><span style="color:#ffff;">Genrate Certificate Number</span></a></button>
                                  </div>
                          </td>
                          <td class="text-center"><?=$student->course_name?></td>
                          <td class="text-center"><?=$student->status ?></td>
                          <!-- <td><?=$student->reason?></td> -->
                          <td>
                              <!-- <span class="input-group-addon"></span> -->
                              <abbr title="View"><a href="<?=base_url().'student_detail/view/'.$student->std_id; ?>" class="btn btn-warning width"><i class="fa fa-eye"></i></a></abbr>
                              <abbr title="Edit"><a href="<?=base_url().'student_detail/edit/'.$student->std_id; ?>" class="btn btn-primary width"><i class="fa fa-edit"></i></a></abbr>
                              <abbr title="Delete"><a href="<?=base_url().'student_detail/delete/'.$student->std_id; ?>" class="btn btn-danger width"><i class="fa fa-trash"></i></a></abbr>
                            </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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
        $('.dataTables-example').DataTable( {
        } );
      });  
    </script>
    <script>
      $(document).ready(function() {
        $('.startDate_calender').click(function() {
        $("#startDate").focus();
        });
      });

      $(document).ready(function() {
        $('.endDate_calender').click(function() {
        $("#endDate").focus();
        });
      });
      
    </script>
  </body> 
</html>
