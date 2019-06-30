<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_varification extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ($this->session->has_userdata('admin_session')) {
            //redirect('login');
        }
        $this->load->model('admin_model');
    }

	public function index()
	{
		
		$this->load->view('cerificat_varification_view');
	}

	public function findCerticate()
	{
		// print_r('dilip'); exit;
		$certificate_number=@$_POST['certificate_number'];
		 $result['certificate_detail'] =$this->admin_model->findCerticateDetail($certificate_number);
		 $this->session->set_flashdata('success', 'View your certificate');
		 $this->session->set_flashdata('error', 'Your record not matche');
 		 $this->load->view('cerificat_varification_view',$result);
	}
	
}
