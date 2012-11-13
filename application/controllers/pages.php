<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
		
	public function __construct(){
		parent::__construct();
	}

	public function index($page  = 'home'){
		if ( ! file_exists('application/views/pages/'.$page.'.php')){
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data = $this->session->all_userdata();
		
		$data_header['title'] = ucfirst($page); // Capitalize the first letter
		$data_header['datas'] = $data;
		
		$this->load->view('templates/header', $data_header);
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}
	
	public function view($page){
		if ( ! file_exists('application/views/pages/'.$page.'.php')){
			// Whoops, we don't have a page for that!
			//show_404();
			//echo "no existe";
		}
		//$this->load->helper(array('form','url'));
		$data = $this->session->all_userdata();
		
		$data_header['title'] = $page; // Capitalize the first letter
		$data_header['data'] = $data;
		
		$this->load->view('templates/header', $data_header);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');
	}

}

?>