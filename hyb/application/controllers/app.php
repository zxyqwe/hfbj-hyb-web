<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app extends CI_Controller {
	
	  public function __construct()
	  {
	    parent::__construct();
	    $this->load->model('mem');
	  } 
	//unfee on android
	public function unfee_js($num = 1, $id = FALSE) 
	{  
		$this->load->library('session');
		if($this->session->userdata('logged_in') != TRUE)
		{
		$this->mem->set_error_time('app.unfee_js');
			echo json_encode(Array("login" => false));
			return;
		}
	   if($id != FALSE)
	    {
	    	for ($x=0; $x<$num; $x++) 
	    	{
	    		$row = $this->mem->max_year($id);
    			$data['username'] = $this->mem->un_fee_js($row['id'],$this->session->userdata('username'));
				} 
    	}
			echo json_encode(Array("num" => $num, "id" => $id, "user" => $this->session->userdata('username')));
			return;
   }
	// fee on android
	public function fee_js($num = 1, $id = FALSE) 
	{  
		$this->load->library('session');
		if($this->session->userdata('logged_in') != TRUE)
		{
		$this->mem->set_error_time('app.fee_js');
			echo json_encode(Array("login" => false));
			return;
		}
		 
	   if($id != FALSE)
	    {
	    	for ($x=0; $x<$num; $x++) 
	    	{
    			$data['username'] = $this->mem->set_fee_js($id,$this->session->userdata('username'));
				} 
    	}
			echo json_encode(Array("num" => $num, "id" => $id, "user" => $this->session->userdata('username')));
			return;
   }
		//login
	public function login()
	{
		$this->load->library('session');
		$user = "".$this->input->post('username');
		$pwd = base64_decode("".$this->input->post('password'));
		$key = "2014-11-21 14"; //date("Y-m-d H",time());
		//$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128,MCRYPT_MODE_CBC),MCRYPT_RAND);  
    $plain = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $pwd, MCRYPT_MODE_CBC, "1234567812345678");  
     
		if ($this->mem->get_user($user,$plain))
		{
			$this->mem->set_login_time($user);
			$newdata = array(
                   'username'  => $user,
                   'logged_in' => TRUE
               );
			$this->session->set_userdata($newdata);
		} 
		
    echo json_encode(Array($user,$key,$pwd,$plain));
	}
		//index
	public function index()
	{
		$cipher_list = mcrypt_list_algorithms();
		$mode_list = mcrypt_list_modes();  
		  
		echo '<xmp>';  
		print_r($cipher_list);  
		print_r($mode_list);  
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */