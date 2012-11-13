<?php
class Users_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
		
	public function get_user($uname, $passw)
	{

		$query = $this->db->get_where('users', array('uname' => $uname, 'pass' => md5($passw)));
		if($query->row_array() >= 1){
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
}

?>