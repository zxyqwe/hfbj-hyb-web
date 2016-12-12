<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class weixin extends CI_Controller {
	
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mem');
  } 

	public function index() 
	{  
		$this->load->library('ciqrcode');

		header("Content-Type: image/png");
		$params['data'] = 'http://app.hanbj.cn/hyb/weixin';
		$params['level'] = 'H';
		$params['size'] = '20';
		$this->ciqrcode->generate($params);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */