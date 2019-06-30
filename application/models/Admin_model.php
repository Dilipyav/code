<?php 
class Admin_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function login_admin($email, $password) {
    $this->db->select('id, email, name, admin_type, profile_image');
    $this->db->from('admins');
    $this->db->where('email', $email);
    $this->db->where('password', $password);
    $query = $this->db->get();
    // print_r($query); exit;
    return $query->row();
  }

  function add($data) {
    $this->db->insert('admins', $data);
    return $this->db->insert_id();
  }

  function get_all() {
    $this->db->select('U.*, UMM.manager_id');
    $this->db->from('admins AS U');
    $this->db->join('admin_manager_mapping AS UMM', 'U.id = UMM.admin_id', 'left');
    $this->db->order_by('id', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }

  function get_all_admin($id) {
    $this->db->select('U.*, UMM.manager_id');
    $this->db->from('admins AS U');
    $this->db->join('admin_manager_mapping AS UMM', 'U.id = UMM.admin_id', 'left');
    $this->db->where('UMM.manager_id',$id);
    $this->db->order_by('id', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }

  function get_all_manager() {
    $this->db->select("id, name");
    $this->db->where('admin_type','admin');
    $this->db->or_where('admin_type','manager');
   
    $query = $this->db->get('admins');
    return $query->result();
  }
  
  function insert_manager($data, $result, $admin_id) {

     $this->db->where('admin_id',$admin_id);
     $update_data = $this->db->get('admin_manager_mapping');
  
     if ( $update_data->num_rows() > 0 ) {
      $this->db->where('admin_id', $admin_id);
      $this->db->set($result);
      $this->db->update('admin_manager_mapping');
      return ($this->db->affected_rows() != 1) ? false : true;
     } 
    else {
      $this->db->set($data);
      $this->db->insert('admin_manager_mapping');
    }
  }
    

  function get_all_ids() {
    $this->db->select('id');
    $query = $this->db->get('admins');
    $ids = [];
    foreach ($query->result() as $value) {
      $ids[] = $value->id;
    }
    return $ids;
  }

  function get_by_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('admins');
    return $query->row();
  }

  function get_by_admin_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('admins');
    return $query->result();
  }

  function update_leave_count($id, $leave_count) {
    $this->db->set('leave_count', $leave_count);
    $this->db->where('id', $id);
    $this->db->where('status', 'active');
    $this->db->update('admins');
  }

  function increment_leave_count() {
    $this->db->set('leave_count', 'leave_count+1', FALSE);
    $this->db->where('status', 'active');
    $this->db->update('admins');
    return ($this->db->affected_rows());
  }

  function reset_leave_count() {
    $this->db->set('leave_count', 0);
    $this->db->where('status', 'active');
    $this->db->update('admins');
    return ($this->db->affected_rows());
  }

  function check_password($id, $current) {
    $this->db->select('email');
    $this->db->where('id', $id);
    $this->db->where('password', $current);
    $query = $this->db->get('admins');
    return $query->row();
  }

  function change_password($id, $new) {
    $this->db->set('password', $new);
    $this->db->where('id', $id);
    $this->db->update('admins');
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 
  }

  function get_leaves_count( $admin_id) {
		$this->db->where('id', $admin_id);
		$query = $this->db->get('admins');
		return $query->result();
  }
  
  function update_profile($data, $admin_id){
    $this->db->set($data);
    $this->db->where('id', $admin_id);
    if ($this->db->update('admins') ===true) {
        return true;
    }else{
        return false;
    }
  }
  function update_admintype($admin_id, $data){
    $this->db->where('id', $admin_id);
    $this->db->set($data);
		$this->db->update('admins');
    return ($this->db->affected_rows() != 1) ? false : true;

  }
  function addStudent( $result ,$std_id) {
   
    $this->db->where('std_id', $std_id);
    $update_data = $this->db->get('student-detail');
    if ($update_data->num_rows() > 0 ) 
    {
    $this->db->where('std_id', $std_id)->update('student-detail', $result);
    } else {
      $this->db->set($result);
      $this->db->insert('student-detail', $result);
    }
    return ($this->db->affected_rows() != 1) ? false : true;
  }
  
  function updateStudent( $result, $std_id) {
    $this->db->where('std_id', $std_id);
    $this->db->set($result);
		$this->db->update('student-detail');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

  function get_all_student() {
    $this->db->select("*");
    $query = $this->db->get('student-detail');
    return $query->result();
  }

  function get_all_studentdetail($student_id) {
    $this->db->select("*");
    $this->db->where('std_id', $student_id);
    $query = $this->db->get('student-detail');
    return $query->result();
  }

  function get_current_student($std_id) {
    $this->db->select("*");
    $this->db->where('std_id', $std_id);
    $query = $this->db->get('student-detail');
    return $query->result();
  }

  function genrate_CertifateNum($result ,$std_id){

    $this->db->where('std_id', $std_id);
    $this->db->set($result);
		$this->db->update('student-detail');
		return ($this->db->affected_rows() != 1) ? false : true;
  }
 function delete_student($std_id)
    {
        $this->db->where('std_id', $std_id);
        $std_data=$this->db->delete('student-detail');
      
    }

  function findCerticateDetail($certificate_number) {
    $this->db->select("*");
    $this->db->where('certificate_num',$certificate_number);
    $query = $this->db->get('student-detail');
    // print_r($query);exit;
    return $query->result();
  }
  
}
