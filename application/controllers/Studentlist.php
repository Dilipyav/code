<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studentlist extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata('admin_session')) {
			redirect('login');
		}
		$this->load->model('admin_model');
		 
  	}

	public function index() {
		$result['student_list'] = $this->admin_model->get_all_student();
		$this->load->view('student_list_view',$result);
		
	}

	

}


