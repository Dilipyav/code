<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
    parent::__construct();
    if (!$this->session->has_userdata('admin_session')) {
      redirect('login');
    }
    $this->load->model('admin_model');
	}

	public function index() {
	  $this->load->view('dashboard_view');
	}
	
}
