<?php
/**
 * Modified controller, handles authetication checking 
 * @author elepedus
 *
 */
class MY_Controller extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('encrypt');
		if (isset($this->session->userdata['username'])){
			$this->authData['auth'] = true;
			$this->authData['username'] = $this->session->userdata['username'];
		}
		else {
			$this->authData['auth'] = false;
			$this->authData['username'] = null;
		}
	}
}