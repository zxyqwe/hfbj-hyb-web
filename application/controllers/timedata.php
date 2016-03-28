<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class timedata extends CI_Controller {
	
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mem');
  } 

	public function errordata() 
	{  
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
		$this->mem->set_error_time('timedata.errordata');
			$this->load->view( 'login' );
			return;
		}
		$data = $this->mem->get_error_data();
		echo json_encode($data);
	}

	public function logindata() 
	{  
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
		$this->mem->set_error_time('timedata.logindata');
			$this->load->view( 'login' );
			return;
		}
		$data = $this->mem->get_login_data();
		echo json_encode($data);
	}

	public function bulletindata() 
	{  
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
		$this->mem->set_error_time('timedata.bulletindata');
			$this->load->view( 'login' );
			return;
		}
		$data = $this->mem->get_bulletin_data();
		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */