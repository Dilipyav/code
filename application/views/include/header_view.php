<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
  <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
</div>
  <ul class="nav navbar-top-links navbar-right">
 
  
   
    <li>
      <span class="m-r-sm text-muted welcome-message">Welcome <strong><?= $this->session->userdata('admin_session')['name']; ?></strong> </span>
    </li>
    <li>
      <a href="<?=base_url() ?>logout">
        <i class="fa fa-sign-out"></i> Log out
      </a>
    </li>
  </ul>
</nav>