<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bulletin extends CI_Controller {
	
  public function __construct()
  {
    parent::__construct();
    $this->load->model('mem');
  } 
	//show one on javascript
  public function view_js($slug = FALSE)
  {
		if($slug == FALSE )
		{
			return;
    }
    $data['news_item'] = $this->mem->get_news($slug);

	  if (empty($data['news_item']))
	  {
    $this->mem->set_error_time('bulletin.view_js');
			$this->load->view('login'); 
			return;
	  }
		if($slug != FALSE )
		{
    	$data['fee_item'] = $this->mem->get_fees($data['news_item']['unique_name']);
    	$data['activity'] = $this->mem->get_activity($data['news_item']['unique_name']);
    }
		$this->load->view('bulletin_js' , $data);
  }
  //version
	public function version() 
	{  
		echo "21";
	}
	//show all json data
	public function data() 
	{  
    $news = $this->mem->get_bulletin(); 
    $name = $this->mem->get_news();
		$boo=array();
    foreach ($name as $member)
    {
    	$tmp=array();
    	$tmp['name'] = $member['unique_name'].':'.$member['tieba_id'];
    	$tmp['id'] = $member['id'];
    	
    	$tmp_year = 2013;
	  	if($tmp['id'] > 340)$tmp_year = 2014;
	  	if($tmp['id'] > 355)$tmp_year = 2015;
      if($tmp['id'] > 386)$tmp_year = 2016;
	  	
			foreach ($news as $news_item)
    	{
     		if($member['unique_name']  === $news_item['unique_name'])
     		{ 
     			$tmp[$news_item['year_time']]=1;
     			$tmp_year=max($tmp_year,$news_item['year_time']+1);
     		}
    	}
    	
     	$tmp[$tmp_year]= 2;
    	array_push($boo, $tmp);
  	}
  	echo json_encode($boo);
	}
	//show all index number for matrix code
	public function index() 
	{  
		$this->mem->set_bulletin_time();
		$this->load->view('header');  
    //$this->mem->set_news();
    $data['news'] = $this->mem->get_bulletin(); 
    $data['name'] = $this->mem->get_news();
		$this->load->view('bulletin',$data); 
		$this->load->view('footer'); 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */