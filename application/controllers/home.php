<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}
	
	
	/*
	 * all_userdata()
	 *  - array -> user_data(id, username, permissions)
	 *  - session_id
	 *  - ip_address
	 *  - user_agent
	 *  - last_activity
	 *  - login_state
	 * 
	 * */
	function index(){
		
		if($this->session->userdata('login_state') == TRUE) {
			
			$data = $this->session->all_userdata();
			$data_header['title'] = 'Home View';
			$data_header['data'] = $data;
						
			$this->load->view('templates/header', $data_header);
			$this->load->view('home_view', $data);
			$this->load->view('templates/footer');
		}else{
		//If no session, redirect to login page
			redirect('users/login', 'refresh');
			
		}
	}
	 
}
 
?>
