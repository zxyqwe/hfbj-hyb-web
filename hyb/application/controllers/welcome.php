<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'mem' );
	}
	//show d3
	public function shenhe($show=FALSE) {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.d3');
			$this->load->view( 'login' );
			return;
		}

		if ( $show != FALSE ) {
			$this->load->view( 'header' );
			$data['shenhe'] = true;
			$this->load->view( 'nav' , $data );
			$this->load->view( 'shenhe' );
			$this->load->view( 'footer' );
			return;
		}

		$this->load->library( 'mytree' );

		$q = $this->mem->get_news();

		$arr = array();

		$linkindex=array();

		foreach ($q as $variable) {
			$arr[] = $variable['tieba_id'];
			$arr[] = $variable['master'];
			$linkindex[$variable['tieba_id'].'201508141603'.$variable['master']]=1;
		}

		$arr=array_slice(array_unique($arr),0);

		$node=array();
		$nodeindex=array();
		$i=-1;

		foreach ($arr as $a) {
			$i+=1;
			$node[]=array('name'=>$a,'group'=>1);
			$nodeindex[$a]=$i;
		}

		$link=array();
		$treedata=array();
		foreach ($linkindex as $a => $av) {
			$aa=split('201508141603', $a);
			$treedata[] = array('id'=>$nodeindex[$aa[0]],
				'pid' => $nodeindex[$aa[1]]);
		}
		$this->mytree->load($treedata);
		$treelist = $this->mytree->DeepTree();
		$sum = $this->mytree->radd($treelist[0]);

		foreach ($linkindex as $a => $av) {
			$aa=split('201508141603', $a);
			$link[]=array('source' => $nodeindex[$aa[0]],
				'target' => $nodeindex[$aa[1]],
				'value' => $av);
		}

		foreach ($node as $key => $v) {
			if (isset($this->mytree->nodeacc[$nodeindex[$v['name']]])) {
				$v['group']=$this->mytree->nodeacc[$nodeindex[$v['name']]];
			}else{
				$v['group']=($sum+1)*2;
			}
			$node[$key]=$v;
		}

		echo json_encode(array('nodes'=>$node,'links'=>$link));
	}
	//show d3
	public function d3($show=FALSE) {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.d3');
			$this->load->view( 'login' );
			return;
		}

		if ( $show != FALSE ) {
			$this->load->view( 'header' );
			$data['d3'] = true;
			$this->load->view( 'nav' , $data );
			$this->load->view( 'd3' );
			$this->load->view( 'footer' );
			return;
		}

		$q = $this->mem->get_d3();
		$q_bulletin = $this->mem->get_d3_bulletin();
		$q_error = $this->mem->get_d3_error();

		$arr = array();
		$arr2 = array();
		$arr3 = array();

		$linkindex=array();

		foreach ($q as $variable) {
			$arr[] = $variable['name'];
			$arr2[] = $variable['REMOTE_ADDR'];
			if(array_key_exists($variable['name'].','.$variable['REMOTE_ADDR'], $linkindex))
				$linkindex[$variable['name'].','.$variable['REMOTE_ADDR']]+=1;
			else
				$linkindex[$variable['name'].','.$variable['REMOTE_ADDR']]=1;
		}

		foreach ($q_bulletin as $variable) {
			$arr2[] = $variable['REMOTE_ADDR'];
			if(array_key_exists('公告栏,'.$variable['REMOTE_ADDR'], $linkindex))
				$linkindex['公告栏,'.$variable['REMOTE_ADDR']]+=1;
			else
				$linkindex['公告栏,'.$variable['REMOTE_ADDR']]=1;
		}

		foreach ($q_error as $variable) {
			$arr3[] = $variable['issue'];
			$arr2[] = $variable['REMOTE_ADDR'];
			if(array_key_exists($variable['issue'].','.$variable['REMOTE_ADDR'], $linkindex))
				$linkindex[$variable['issue'].','.$variable['REMOTE_ADDR']]+=1;
			else
				$linkindex[$variable['issue'].','.$variable['REMOTE_ADDR']]=1;
		}

		$arr=array_slice(array_unique($arr),0);
		$arr2=array_slice(array_unique($arr2),0);
		$arr3=array_slice(array_unique($arr3),0);

		$node=array();
		$nodeindex=array();
		$i=0;

		$node[]=array('name'=>'公告栏','group'=>3);
		$nodeindex['公告栏']=$i;

		foreach ($arr as $a) {
			$i+=1;
			$node[]=array('name'=>$a,'group'=>1);
			$nodeindex[$a]=$i;
		}

		foreach ($arr2 as $a) {
			$i+=1;
			$node[]=array('name'=>$a,'group'=>2);
			$nodeindex[$a]=$i;
		}

		foreach ($arr3 as $a) {
			$i+=1;
			$node[]=array('name'=>'恶意'.$a,'group'=>4);
			$nodeindex[$a]=$i;
		}

		$link=array();
		foreach ($linkindex as $a => $av) {
			$aa=split(',', $a);
			$link[]=array('source' => $nodeindex[$aa[0]],
				'target' => $nodeindex[$aa[1]],
				'value' => $av);
		}

		echo json_encode(array('nodes'=>$node,'links'=>$link));
	}
	//show error time
	public function errortime() {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.errortime');
			$this->load->view( 'login' );
			return;
		}

		$this->load->view( 'header' );
		$data['errordata'] = true;
		$this->load->view( 'nav' , $data );
		$this->load->view( 'errordata');
		$this->load->view( 'footer' );
	}
	//show bulletin time
	public function bulletintime() {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.bulletintime');
			$this->load->view( 'login' );
			return;
		}

		$this->load->view( 'header' );
		$data['bulletindata'] = true;
		$this->load->view( 'nav' , $data );
		$this->load->view( 'bulletindata');
		$this->load->view( 'footer' );
	}
	//show login time
	public function logintime() {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.logintime');
			$this->load->view( 'login' );
			return;
		}

		$this->load->view( 'header' );
		$data['logindata'] = true;
		$this->load->view( 'nav' , $data );
		$this->load->view( 'logindata');
		$this->load->view( 'footer' );
	}
	//show member_js
	public function mem_js( $id = 0 ) {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.mem_js');
			$this->load->view( 'login' );
			return;
		}
		$a = $this->mem->get_member_js( intval( $id ) );
		echo json_encode( array( $a ) );
	}
	//show log_js
	public function log_js( $id = FALSE ) {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.log_js');
			$this->load->view( 'login' );
			return;
		}
		if ( $id === FALSE ) {
			$id=time();
		}
		$tid = date( "Y-m-d H:i:s", intval( $id ) );
		$tid2 = date( "Y-m-d H:i:s", intval( $id-60*60*24*7 ) );
		$a = $this->mem->get_log_fee_js( $tid, $tid2 );
		$b = $this->mem->get_log_unfee_js( $tid, $tid2 );
		$c = $this->mem->get_log_act_js( $tid, $tid2 );
		echo json_encode( array( $a, $b, $c ) );
	}
	//show log
	public function log( $id = FALSE ) {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.log');
			$this->load->view( 'login' );
			return;
		}
		if ( $id === FALSE ) {
			$id=time();
		}
		$tid = date( "Y-m-d H:i:s", intval( $id ) );
		$this->load->view( 'header' );
		$data['log'] = true;
		$this->load->view( 'nav' , $data );
		$data['tid'] = $tid;
		$data['log_fee'] = $this->mem->get_log_fee( $tid );
		$data['log_unfee'] = $this->mem->get_log_unfee( $tid );
		$data['log_act'] = $this->mem->get_log_act( $tid );
		$this->load->view( 'log' , $data );
		$this->load->view( 'footer' );
	}
	//set activity on android
	public function onact() {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.onact');
			$this->load->view( 'login' );
			return;
		}

		$activity = json_decode( $this->input->post( 'activity' ) )->{'activity'};
		$list = json_decode( $this->input->post( 'list' ), true );
		$this->mem->set_act_js( $activity , $list , $this->session->userdata( 'username' ) );
	}
	//unfee on android
	public function unfee_js( $id = FALSE ) {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.unfee_js');
			$this->load->view( 'login' );
			return;
		}

		if ( $id != FALSE ) {
			$data['username'] = $this->mem->un_fee_js( intval($id), $this->session->userdata( 'username' ) );
		}
	}
	// fee on android
	public function fee_js( $id = FALSE ) {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.fee_js');
			$this->load->view( 'login' );
			return;
		}

		if ( $id != FALSE ) {
			$data['username'] = $this->mem->set_fee_js( intval($id), $this->session->userdata( 'username' ) );
		}
	}
	//fee on pc
	public function fee() {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.fee');
			$this->load->view( 'login' );
			return;
		}
		$this->load->helper( 'form' );
		$this->load->library( 'form_validation' );

		$this->form_validation->set_rules( 'text', 'text', 'required' );

		if ( $this->form_validation->run() === FALSE ) {
			$this->load->view( 'header' );
			$data['fee'] = true;
			$this->load->view( 'nav' , $data );
			$this->load->view( 'fee' );
			$this->load->view( 'footer' );
		}
		else {
			$this->load->view( 'header' );
			$data['index'] = true;
			$this->load->view( 'nav' , $data );
			$data['username'] = $this->mem->set_fees( $this->session->userdata( 'username' ) );
			$this->load->view( 'welcome_message' , $data );
			$this->load->view( 'footer' );
		}
	}
	//unused
	public function create() {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.create');
			$this->load->view( 'login' );
			return;
		}
		$this->load->helper( 'form' );
		$this->load->library( 'form_validation' );

		$this->form_validation->set_rules( 'text', 'text', 'required' );

		if ( $this->form_validation->run() === FALSE ) {
			$this->load->view( 'header' );
			$data['create'] = true;
			$this->load->view( 'nav' , $data );
			$this->load->view( 'create' );
			$this->load->view( 'footer' );
		}
		else {
			$this->load->view( 'header' );
			$data['index'] = true;
			$this->load->view( 'nav' , $data );
			$data['username'] = $this->mem->set_news();
			$this->load->view( 'welcome_message' , $data );
			$this->load->view( 'footer' );
		}
	}
	//show one on javascript
	public function view_js( $slug = FALSE ) {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.view_js');
			$this->load->view( 'login' );
			return;
		}
		if ( $slug != FALSE ) {
			$data['news_item'] = $this->mem->get_news( $slug );
		}

		if ( empty( $data['news_item'] ) ) {
			$this->mem->set_error_time('welcome.view_js.empty');
			$this->load->view( 'login' );
			return;
		}
		if ( $slug != FALSE ) {
			$data['fee_item'] = $this->mem->get_fees( $data['news_item']['unique_name'] );
			$data['activity'] = $this->mem->get_activity( $data['news_item']['unique_name'] );
		}
		$this->load->view( 'detail_js' , $data );
	}
	//show one on android
	public function view_an( $slug = FALSE ) {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.view_an');
			$this->load->view( 'login' );
			return;
		}
		if ( $slug != FALSE ) {
			$news_item = $this->mem->get_news( $slug );
		}

		if ( empty( $news_item ) ) {
			$this->mem->set_error_time('welcome.view_an.empty');
			$this->load->view( 'login' );
			return;
		}
		if ( $slug != FALSE ) {
			$fee_item = $this->mem->get_fees( $news_item['unique_name'] );
			$activity = $this->mem->get_activity( $news_item['unique_name'] );
		}
		echo json_encode( array( $news_item, $fee_item, $activity ) );
	}
	//show one on pc
	public function view( $slug = FALSE ) {
	/*	$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.view');
			$this->load->view( 'login' );
			return;
		}
		if ( $slug != FALSE ) {
			$data['news_item'] = $this->mem->get_news( $slug );
		}

		if ( empty( $data['news_item'] ) ) {
			$this->mem->set_error_time('welcome.view.empty');
			$this->load->view( 'login' );
			return;
		}
		if ( $slug != FALSE ) {
			$data['fee_item'] = $this->mem->get_fees( $data['news_item']['unique_name'] );
			$data['activity'] = $this->mem->get_activity( $data['news_item']['unique_name'] );
		}
		$this->load->view( 'header' );
		$data['index'] = true;
		$this->load->view( 'nav' , $data );
		$this->load->view( 'detail' , $data );
		$this->load->view( 'footer' );*/
	}
	//show all member for pc
	public function all( $slug = FALSE ) {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.all');
			$this->load->view( 'login' );
			return;
		}

		if ($slug != FALSE) {
			$data = $this->mem->get_news();
			echo json_encode($data);
			return;
		}

		$this->load->view( 'header' );
		$data['all'] = true;
		$this->load->view( 'nav' , $data );
		$this->load->view( 'news' );
		$this->load->view( 'footer' );
	}
	//show all index number for matrix code
	public function all_js() {
		$this->load->library( 'session' );
		if ( $this->session->userdata( 'logged_in' ) != TRUE ) {
			$this->mem->set_error_time('welcome.all_js');
			$this->load->view( 'login' );
			return;
		}
		$this->load->view( 'header' );
		$news = $this->mem->get_news();
		$data['username'] = '';
		foreach ( $news as $news_item ) {
			$data['username'] =  $data['username'].'"'.$news_item['id'].','.$news_item['unique_name'].'",';
		}
		$this->load->view( 'welcome_message' , $data );
		$this->load->view( 'footer' );
	}
	//login
	public function index() {
		$user = $this->input->post( 'user' );
		$mm = $this->input->post( 'mm' );
		$this->load->library( 'session' );
		header( "Content-type:text/html;charset=utf-8" );
		if ( $user === FALSE || $mm === FALSE ) {
			if ( $this->session->userdata( 'logged_in' ) === TRUE ) {
				$data['username'] = $this->session->userdata( 'username' );
				$this->load->view( 'header' );
				$data['index'] = true;
				$this->load->view( 'nav' , $data );
				$this->load->view( 'welcome_message' , $data );
				$this->load->view( 'footer' );
			}
			else{
				$this->mem->set_error_time('welcome.login.need');
				$this->load->view( 'login' );
			}
			return;
		}

		if ( $this->mem->get_user( $user, $mm ) ) {
			$this->mem->set_login_time( $user );
			$newdata = array(
				'username'  => $user,
				'logged_in' => TRUE
				);

			$this->session->set_userdata( $newdata );
			$data['username'] = $this->session->userdata( 'username' );
			$this->load->view( 'header' );
			$data['index'] = true;
			$this->load->view( 'nav' , $data );
			$this->load->view( 'welcome_message' , $data );
			$this->load->view( 'footer' );
			return;
		}

		$this->mem->set_error_time('welcome.login.wrongpass');
		$this->load->view( 'login' );
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
