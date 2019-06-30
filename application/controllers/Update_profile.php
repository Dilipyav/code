<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Update_profile extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata('admin_session')) {
            redirect('login');
        }
		$this->load->model('admin_model');
    }

	public function index() {
		
		@$new_name = time().$_FILES["userfile"]['name'];
		$config['upload_path'] = './public/uploads/profile_image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['remove_spaces'] = TRUE;
		$config['overwrite'] = FALSE;
		$config['encrypt_name'] = FALSE;
		$config['orig_name'] = TRUE;
		$config['file_name'] = $new_name;
		
		$this->load->library('upload', $config);
		$admin_id =$this->session->userdata('admin_session')['id'];
          if ( ! $this->upload->do_upload('userfile'))
                {
                    $error = array('error' => $this->upload->display_errors());
			    	$this->load->view('update_profile_view', $error);
                }
           else
                {
					$data = array('upload_data' => $this->upload->data());
					$image_raw=$this->upload->data('raw_name');  
					$image_ext=$this->upload->data('file_ext'); 
					$picture=$image_raw.$image_ext;
					$result=array(
						'profile_image' => $picture
					);

					$this->admin_model->update_profile($result,$admin_id);
					$user_data = $this->session->userdata('admin_session');
					$user_data['profile_image'] = $picture;
					$this->session->set_userdata('admin_session', $user_data);
					$this->session->set_flashdata('success', 'Profile image update successfully');
                    redirect('update_profile');
						
                }
	 }
	 

}
