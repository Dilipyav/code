<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('admin_model');
    }

	public function index() {
		if(!empty($_POST)) {
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$admin = $this->admin_model->login_admin($email, $password);
			if($admin) {
				$session_data = (array) $admin;
				$this->session->set_userdata('admin_session', $session_data);
				// $session = $this->session->userdata('admin_session');
				// if($session['admin_type'] === 'admin'){
				// 	redirect('admin_dashboard');exit;
				// }
				// else{
					redirect('dashboard');exit;
				//}
			}
			else {
				$this->session->set_flashdata('login_msg', 'error');
				redirect('login'); exit;
			}
			exit;
		}
		$data['login_msg'] = $this->session->flashdata('login_msg');
		$this->load->view('login_view', $data);
	}

}
