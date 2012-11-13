<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', '', TRUE);
	}
	
	public function index(){
		echo "index users";
	}
	
	public function test($data = FALSE){
		
		//antes de mostrar la pagina checamos si la sessión inició
		
		
		if ($this->session->userdata('login_state') == FALSE){
			echo "no hay session iniciada";
		} else {
			$data_header['title'] = 'Test page';
			$this->load->view('templates/header', $data_header);	
			$this->load->view('test', $data);
			$this->load->view('templates/footer');
		}
		
	}
	
	public function login(){
			
		
			//cargamos las librerías para la forma
			$this->load->helper(array('form','url'));
			//$this->load->library('form_validation');
			
			
			$data = $this->session->all_userdata();
			$data_header['title'] = 'Login View';
			$data_header['data'] = $data;
			
			$this->load->view('templates/header', $data_header);	
			$this->load->view('pages/login_page');
			$this->load->view('templates/footer');

	}

	public function verifylogin(){
		$this->load->library('form_validation');
		$this->load->helper(array('form','url'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
		
		if($this->form_validation->run() === FALSE){
			$data_header['title'] = 'Login Page'; 
			$data_header['data'] = $this->session->userdata('login_state');
			$this->load->view('templates/header', $data_header);
			$this->load->view('pages/login_page');
			$this->load->view('templates/footer');
		}else {
			/*$data_header['title'] = 'Test';
			$this->load->view('templates/header', $data_header);	
			$this->load->view('test');
			$this->load->view('templates/footer');
			*/
			//$this->load->library('session');
			$this->session->set_userdata('login_state', TRUE);
			//$this->session->set_userdata('user_info', $user_info);
			
			//$data['all'] = $all_session_data;
			redirect('home', 'refresh');
//			$this->test($data);
			
		}
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
	function check_database($password){
	   //Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		 
		//query the database
		$result = $this->users_model->get_user($username, $password);
		 
		if($result){
			$sess_array = array();
			foreach($result as $row) {
				$sess_array = array('id' => $row->iduser, 
									'username' => $row->uname, 
									'permissions' => $row->permissions);
			}
			$this->session->set_userdata('user_data',$sess_array);
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}
	
	function logout(){
		//$this->session->userdata('login_state') = FALSE;
		$this->session->set_userdata('login_state', FALSE);
		$this->session->unset_userdata('user_data');
		session_destroy();
		redirect('home', 'refresh');
	}

} //end class



?>