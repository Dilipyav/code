<div class="sidebar-collapse">
  <ul class="nav" id="side-menu">
    <li class="nav-header">
      <div class="dropdown profile-element"> 
        <span>
          <?php
             $admin_img = base_url() . '../public/img/admin.png';
             if (isset($this->session->userdata('admin_session')['profile_image'])) {
               $admin_img = base_url() . 'public/uploads/profile_image/' . $this->session->userdata('admin_session')['profile_image'];
             }
          ?>
           <a href="<?= base_url(); ?>update_profile"><img  height="44" width="44" alt="image" class="img-circle" src="<?= $admin_img ?>" /> </a>
        </span>
        <?php 
        $session = $this->session->userdata('admin_session');?>
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><!-- <?= $this->session->userdata('admin_session')['name']; ?>--></strong>
          </span> <span class="text-muted text-xs block"><?=ucfirst($session['admin_type'])?> <b class="caret"></b></span> </span> 
        </a>
        <ul class="dropdown-menu animated fadeInRight m-t-xs">
          <li><a href="<?= base_url(); ?>update_profile">Profile Settings</a></li>
          <li><a href="<?= base_url(); ?>change_password">change password</a></li>
          <li class="divider"></li>
          <li><a href="<?= base_url(); ?>logout">Logout</a></li>
        </ul>
      </div>
      <div class="logo-element">
        NITC+
      </div>
    </li>

    <li <?php if ($this->router->fetch_class() == 'dashboard') { echo 'class="active"';} ?>>
      <a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
    </li>
   
      
      <li <?php if ($this->router->fetch_class() == 'studentAdd') { echo 'class="active"';} ?>>
      <a href="<?= base_url() ?>studentAdd"><i class="fa fa-calendar"></i> <span class="nav-label">Add Student</span></a>
    </li>

    <li <?php if ($this->router->fetch_class() == 'studentlist') { echo 'class="active"';} ?>>
      <a href="<?= base_url() ?>studentlist"><i class="fa fa-thumbs-o-up"></i> <span class="nav-label">List of student</span></a>
    </li>
    
   
    
  </ul>
</div>