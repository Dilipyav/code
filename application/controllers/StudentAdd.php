<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentAdd extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata('admin_session')) {
            redirect('login');
        }
		
		$this->load->model('admin_model');
  	}

	public function index() {
		
		$this->load->view('student_form_view');		
	}

	public function add($std_id=0) {

		@$new_name = time().$_FILES["image"]['name'];
		$config['upload_path'] = './public/uploads/profile_image';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['remove_spaces'] = TRUE;
		$config['overwrite'] = FALSE;
		$config['encrypt_name'] = FALSE;
		$config['orig_name'] = TRUE;
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
          if ( ! $this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
			    	$this->load->view('student_form_view', $error);
                }
           else
                {
					$data = array('upload_data' => $this->upload->data());
					$studName = @$_POST['name'];
					$email = @$_POST['email'];
					$phone_num = @$_POST['number'];
					$dob= @$_POST['dob'];
					$furname = @$_POST['institute-name'];
					$courseName = @$_POST['course-name'];
					$institute_name = @$_POST['institute-name'];
					$image_raw=$this->upload->data('raw_name');  
					$image_ext=$this->upload->data('file_ext'); 
					$picture=$image_raw.$image_ext;
					$result=array(
						'name'=>$studName,
						'father_name'=>$furname,
						'email'=>$email,
						'phone_num'=>$phone_num,
						'dob'=>$dob,
						'course_name'=>$courseName,
						'institute_name'=>$institute_name,
						'std_image' => $picture
					);

					$this->admin_model->addStudent( $result ,$std_id);
					$this->session->set_flashdata('success', 'New student record added successfully');
					redirect( base_url().'/studentlist');  
						
                }
	 }

}
