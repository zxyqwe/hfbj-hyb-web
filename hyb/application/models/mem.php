<?php
class Mem extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function get_d3_error()
  {	  
	  $query = $this->db->query("select issue,REMOTE_ADDR from errortime where REMOTE_ADDR is not null;");
	  return $query->result_array();
  }

  public function get_d3_bulletin()
  {	  
	  $query = $this->db->query("select REMOTE_ADDR from bulletintime where REMOTE_ADDR is not null;");
	  return $query->result_array();
  }

  public function get_d3()
  {	  
	  $query = $this->db->query("select name,REMOTE_ADDR from logintime where REMOTE_ADDR is not null;");
	  return $query->result_array();
  }
  
  public function get_error_data()
  {	  
	  $query = $this->db->query("select * from errortime order by id desc limit 1000;");
	  return $query->result_array();
  }
  
  public function get_bulletin_data()
  {	  
	  $query = $this->db->query("select * from bulletintime order by id desc limit 1000;");
	  return $query->result_array();
  }
  
  public function get_login_data()
  {	  
	  $query = $this->db->query("select * from logintime order by id desc limit 1000;");
	  return $query->result_array();
  }
  
  public function get_member_js($id)
  {	  
	  $query = $this->db->query("select * from member where id > ".$id." order by id;");
	  return $query->result_array();
  }
  
  public function get_log_act_js($tid,$tid2)
  {	  
	  $query = $this->db->query("select * from activity where act_time < '".$tid."' and act_time > '".$tid2."' order by id desc;");
	  return $query->result_array();
  }
  
  public function get_log_unfee_js($tid,$tid2)
  {	  
	  $query = $this->db->query("select * from fee where unfee_time < '".$tid."' and unfee_time > '".$tid2."' order by id desc;");
	  return $query->result_array();
  }
  
  public function get_log_fee_js($tid,$tid2)
  {	  
	  $query = $this->db->query("select * from fee where fee_time < '".$tid."' and fee_time > '".$tid2."' order by id desc;");
	  return $query->result_array();
  }
  
  public function get_log_act($tid)
  {	  
	  $query = $this->db->query("select * from activity where act_time > '".$tid."' order by id;");
	  return $query->result_array();
  }
  
  public function get_log_unfee($tid)
  {	  
	  $query = $this->db->query("select * from fee where unfee_time > '".$tid."' order by id;");
	  return $query->result_array();
  }
  
  public function get_log_fee($tid)
  {	  
	  $query = $this->db->query("select * from fee where fee_time > '".$tid."' order by id;");
	  return $query->result_array();
  }
  
  public function get_bulletin()
  {	  
	  $query = $this->db->get_where('fee', array('unoper' => NULL));
	  return $query->result_array();
  }
  
  public function get_user($user,$mm)
  {	  
  	$this->load->library('encrypt');
	  $query = $this->db->get_where('user', array('name' => $user , 'mm' => $this->encrypt->sha1($mm)))->result_array();
	  return !empty($query);
	}
  
  public function get_fees($slug = FALSE)
  {
	  if ($slug === FALSE)
	  {
	    return array();
	  }
	  
	  $query = $this->db->order_by('id')->get_where('fee', array('unique_name' => $slug,'unoper' => NULL));
	  return $query->result_array();
	}
  
  public function get_activity($slug = FALSE)
  {
	  if ($slug === FALSE)
	  {
	    return array();
	  }
	  
	  $query = $this->db->order_by('id')->get_where('activity', array('unique_name' => $slug));
	  return $query->result_array();
	}
  
  public function get_news($slug = FALSE)
  {
	  if ($slug === FALSE)
	  {
	    $query = $this->db->order_by('unique_name')->get_where('member', array('code' => 0));
	    return $query->result_array();
	  }
	  
	  $query = $this->db->get_where('member', array('id' => $slug));
	  return $query->row_array();
	}
  
  public function set_news()
	{
	  $this->load->helper('url');
	  
		$s = explode("\n",$this->input->post('text')) ;
		foreach ($s as $ss)
		{
			$str = explode(",",$ss) ;
			$data = array(
	               'tieba_id' => $str[0],
	               'gender' => $str[1],
	               'phone' => $str[2],
	               'QQ' => $str[3],
	               'mail' => $str[4],
	               'pref' => $str[5],
	               'web_name' => $str[6],
	               'unique_name' => $str[7],
	               'master' => $str[8]
	               ); 
		  
		  $this->db->insert('member', $data);
		  $this->db->cache_delete_all();
		}
		return $s;
	}
  
  public function set_act_js($activity , $list ,$user)
	{
		$out = "";
	  
		$this->load->database();
		foreach($list as $str)
		{
			$data = array(
	               'name' => $activity,
	               'unique_name' => $str,
	               'oper' => $user,
	               'act_time' => date("Y-m-d H:i:s",time())
	               ); 
		  $this->db->insert('activity', $data);
		}
		$this->db->query('DELETE FROM activity
USING activity,(
  SELECT DISTINCT MIN(`id`) AS `id`,`name`,`unique_name`
  FROM activity
  GROUP BY `name`,`unique_name`
  HAVING COUNT(1) > 1
) AS t2
WHERE activity.`name` = t2.`name`
  AND activity.`unique_name` = t2.`unique_name`
  AND activity.`id` <> t2.`id`;');
		$this->db->cache_delete_all();
		return $out;
	}
  
  public function un_fee_js($id,$user)
	{
		$out = "";
	  if($id<0)return;
		$this->load->database();
		//$this->db->delete('fee', array('id' => $id)); 
		$this->db->update('fee', array('unoper' => $user, 'unfee_time' => date("Y-m-d H:i:s",time())), array('id' => $id));
	  //	$out=$out."Name: <a href='/hyb/welcome/view/".$query['id']."'>".$str."</a><br />";
		$this->db->cache_delete_all();
		return $out;
	}
	
	public function max_year($id)
	{
			$query = $this->db->get_where('member', array('id' => $id))->row_array();
	  	if(empty($query))
	  	{
	  		return Array("year" => 0, "id" => -1);
	  	}
	  		$str = $query['unique_name'];
		$row = $this->db->query('SELECT max(year_time) as M, max(id) as N FROM fee WHERE unoper IS NULL AND unique_name = ?',array($str))->row();
		
		$this->db->cache_delete_all();
		return Array("year" => $row->M, "id" => $row->N);
	}
  
  public function set_fee_js($id,$user)
	{
		$out = "";
	  
			$query = $this->db->get_where('member', array('id' => $id))->row_array();
	  	if(empty($query))
	  	{
	  		$out=$out."Invalid name: ".$str."<br />";
	  		return $out;
	  	}
	  		$str = $query['unique_name'];
	  	$year = $this->db->query('SELECT max(year_time) as M FROM fee WHERE unoper IS NULL AND unique_name = ?',array($str))->row()->M + 1;
	  	$year = max($year,2013);
	  	if($id > 340)$year = max($year,2014);
	  	if($id > 355)$year = max($year,2015);
	  	if($id > 386)$year = max($year,2016);
			$data = array(
	               'unique_name' => $str,		
	               'fee_time' => date("Y-m-d H:i:s",time()),
	               'year_time' => $year,
	               'oper' => $user
	               ); 
		  
		  $this->db->insert('fee', $data);
	  	$out=$out."Name: <a href='/hyb/welcome/view/".$query['id']."'>".$str."</a> Year: ".$year."<br />";
		$this->db->cache_delete_all();
		return $out;
	}
  
  public function set_fees($user)
	{
		$out = "";
	  $this->load->helper('url');
	  
		$s = explode(",",$this->input->post('text')) ;
		foreach ($s as $str)
		{
			$query = $this->db->get_where('member', array('unique_name' => $str))->row_array();
			$id = $query['id'];
	  	if(empty($query))
	  	{
	  		$out=$out."Invalid name: ".$str."<br />";
	  		continue;
	  	}
	  		
	  	$year = $this->db->query('SELECT max(year_time) as M FROM fee WHERE unoper IS NULL AND unique_name = ?',array($str))->row()->M + 1;
	  	$year = max($year,2013);
	  	if($id > 340)$year = max($year,2014);
	  	if($id > 355)$year = max($year,2015);
	  	if($id > 386)$year = max($year,2016);
			$data = array(
	               'unique_name' => $str,		
	               'fee_time' => date("Y-m-d H:i:s",time()),
	               'year_time' => $year,
	               'oper' => $user
	               ); 
		  
		  $this->db->insert('fee', $data);
	  	$out=$out."Name: <a href='/hyb/welcome/view/".$query['id']."'>".$str."</a> Year: ".$year."<br />";
			$this->db->cache_delete_all();
		}
		return $out;
	}
  
  public function set_error_time($issue)
	{	  
			$data = array(
					'issue' => $issue,	
	               'time' => date("Y-m-d H:i:s",time()),
	               'HTTP_USER_AGENT' => isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'',
	               'HTTP_CLIENT_IP' => isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:'',
	               'HTTP_X_FORWARDED_FOR' => isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:'',
	               'REMOTE_ADDR' => isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'',
	               'REMOTE_HOST' => isset($_SERVER['REMOTE_HOST'])?$_SERVER['REMOTE_HOST']:''
	               ); 
		  
		  $this->db->insert('errortime', $data);
		  $this->db->cache_delete('/timedata', 'errordata');
	}
  
  public function set_login_time($user)
	{	  
			$data = array(
	               'name' => $user,		
	               'time' => date("Y-m-d H:i:s",time()),
	               'HTTP_USER_AGENT' => isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'',
	               'HTTP_CLIENT_IP' => isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:'',
	               'HTTP_X_FORWARDED_FOR' => isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:'',
	               'REMOTE_ADDR' => isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'',
	               'REMOTE_HOST' => isset($_SERVER['REMOTE_HOST'])?$_SERVER['REMOTE_HOST']:''
	               ); 
		  
		  $this->db->insert('logintime', $data);
		  $this->db->cache_delete('/timedata', 'logindata');
		  $this->db->cache_delete('/welcome', 'd3');
	}
  
  public function set_bulletin_time()
	{	  
			$data = array(
	               'time' => date("Y-m-d H:i:s",time()),
	               'HTTP_USER_AGENT' => isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'',
	               'HTTP_CLIENT_IP' => isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:'',
	               'HTTP_X_FORWARDED_FOR' => isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:'',
	               'REMOTE_ADDR' => isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'',
	               'REMOTE_HOST' => isset($_SERVER['REMOTE_HOST'])?$_SERVER['REMOTE_HOST']:''
	               ); 
		  
		  $this->db->insert('bulletintime', $data);
		  $this->db->cache_delete('/timedata', 'bulletindata');
		  $this->db->cache_delete('/welcome', 'd3');
	}
}