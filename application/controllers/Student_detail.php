<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_detail extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata('admin_session')) {
            redirect('login');
        }
		$this->load->model('admin_model');
		
    }

	public function view($std_id)  {
		$result['student_detail'] = $this->admin_model->get_current_student($std_id);
		$this->load->view('student_detail_view',$result);	
	}

	public function edit($std_id){
		$result['student_detail'] = $this->admin_model->get_current_student($std_id);
		$this->load->view('student_edit_view',$result);
		if(isset($_POST) && !empty($_POST)){
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
					$furname = @$_POST['father-name'];
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

					$this->admin_model->addStudent($result ,$std_id);
					$this->session->set_flashdata('success', 'Update  successfully');
					redirect( base_url().'/studentlist');  
						
                }
		}

	}
	
	public function genrateCerticateNumber($std_id){
		// print_r('dilip'); exit;
		$certificate_number='nitc'.mt_rand(100000,200000).$std_id;
		$status="Yes";
		// print_r($certificate_number); exit;
		$result=array(
			'status'=>$status,
			'certificate_num'=>$certificate_number,
			
			
		);
        $this->admin_model->genrate_CertifateNum($result, $std_id);
		$this->session->set_flashdata('success', 'Certificate number genrated successfully');
	    redirect( base_url().'/studentlist');  
	
	}



	public function delete($std_id){
        $this->admin_model->delete_student($std_id);
		$this->session->set_flashdata('success', 'Deleted Sucessfully');
	    redirect( base_url().'/studentlist');  
	
	}
}
