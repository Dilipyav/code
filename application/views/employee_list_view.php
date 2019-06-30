<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
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
              <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5 class="heading" >My admins</h5>
                  <div class="ibox-tools">
                    <a class="collapse-link">
                      <i class="fa fa-chevron-up"></i>
                    </a>                                        
                    <a class="close-link">
                      <i class="fa fa-times"></i>
                    </a>
                  </div>
                </div>
                <div class="ibox-content">
                                                                        
                  <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>admin type</th>
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody style="color: #000;">
                      <?php

                        foreach ($admin as $index => $admin) { ?>
                          <tr class="">
                            <td><?=$admin->id?> </td>
                            <td><?=$admin->email?></td>
                            <td><?=$admin->name?></td>
                            <td><?=ucfirst($admin->admin_type)?></td>
                            <td><?=$admin->created?></td>
                            <td><?=$admin->updated?></td>
                            <td>
                              <!-- <span class="input-group-addon"></span> -->
                              <abbr title="View"><a href="<?=base_url().'admin/view/'.$admin->id; ?>" class="btn btn-warning width"><i class="fa fa-eye"></i></a></abbr>
                            </td>
                          </tr>
                      <?php
                        }
                      ?>
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
    <script src="<?=base_url().'public/js/jquery.dataTables.min.js'; ?>"></script>
    <script>
      $(document).ready(function() {
        $('.dataTables-example').DataTable();
      });
    </script>
    <!-- <script>
        $(document).ready(function() {
          $('.dataTables-example').DataTable({
            "aoColumns": [
              null,
              null,
              null,
              { "sType": "date-uk" },
              { "sType": "date-uk" },
              null,
            ]
          });
            
          jQuery.extend( jQuery.fn.dataTableExt.oSort, {
            "date-uk-pre": function ( a ) {
              //var ukDatea = a.split('/');
                console.log(a);
                console.log(Date.parse(a));
              if(a == 'NA'){
                return 0;
              }else{
                return Date.parse(a);
              }
              //return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
            },

            "date-uk-asc": function ( a, b ) {
              return ((a < b) ? -1 : ((a > b) ? 1 : 0));
            },

            "date-uk-desc": function ( a, b ) {
              return ((a < b) ? 1 : ((a > b) ? -1 : 0));
            }
          } );
        });
    </script> -->
  </body>
</html>
