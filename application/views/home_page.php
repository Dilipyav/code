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
          <h2> hi dilip</h2>
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
