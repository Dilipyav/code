<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {

	function __construct() {
    parent::__construct();
    if (!$this->session->has_userdata('admin_session')) {
      redirect('login');
    }
    $this->load->model('admin_model');
  }

	public function index() {
    $session = $this->session->userdata('admin_session');
    $this->load->view('change_password_view');
  }
  
  public function change_password() {
    if(!empty($_POST)) {
      $current = md5($_POST['current_password']);
      $new = md5($_POST['new_password']);
      $id = $this->session->userdata('admin_session')['id'];
      $admin = $this->admin_model->check_password($id, $current);
      if($admin) {
        $res = $this->admin_model->change_password($id, $new);
        if($res) {
          $this->session->set_flashdata('success', 'Password changed successfully');
        } else {
          $this->session->set_flashdata('error', 'some error occurred');
        }
      } else {
        $this->session->set_flashdata('error', 'Current password does not match');
      }
      
      redirect($_SERVER['HTTP_REFERER']);
    }
  }
  
}
