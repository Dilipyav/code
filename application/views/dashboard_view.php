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
           <h4> welcome to admin pannel </h5>
            
              
              </div>
            </div>
          <?php $this->view('include/footer_view'); ?>
        </div>       
      </div>
      <!-- Mainly scripts -->
      <?php $this->view('include/footer_script_view'); ?>
    </div>
  </body>
</html>
