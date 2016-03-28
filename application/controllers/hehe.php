<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class hehe extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'mem' );
	}
	//login
	public function index( $user = FALSE , $mm = FALSE ) {
		$this->load->library( 'session' );
		header( "Content-type:text/html;charset=utf-8" );
		if ( $this->session->userdata( 'logged_in' ) === TRUE ) {
			$data['username'] = $this->session->userdata( 'username' );
			$this->load->view( 'header' );
			$data['index'] = true;
			$this->load->view( 'nav' , $data );
			$this->load->view( 'welcome_message' , $data );
			$this->load->view( 'footer' );
		}
		else
		{
			$this->load->view( 'hehe' );
		}
		return;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
