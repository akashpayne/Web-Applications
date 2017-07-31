<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller {
	protected $data = [];
  public function __construct() {
    parent::__construct(); 
    $this->data = $this->authData;
    $this->load->helper('url');
  }
  
  /**
   * Default action. 
   * Shows user's profile if logged in or, a login form if not
   */
  public function index() {
  	if ($this->data['auth']){
  		redirect('user/view/'.$this->data['username']);
  	}
  	else {
    	redirect('user/login');
  	}
  }
  
  /**
   * Loads Messages_model, runs getMessagesByPoster()
   * and displays the output in the ViewMessages view
   */
  public function view($name) {
    $this->load->model('messages_model');
    $this->load->model('users_model');
    $this->data['messages'] = $this->messages_model->getMessagesByPoster($name);
    $this->data['currentlyViewing'] = $name;
    $this->data['viewType'] = 'profile';
    $this->data['following'] = $this->users_model->isFollowing($this->session->userdata('username'),$name);
    $this->load->view('header',$this->data);
    $this->load->view('viewMessages',$this->data);  
    $this->load->view('footer',$this->data);
  }
  
  /**
   * Displays the login view
   */
  function login(){
    $this->load->view('header',$this->data);
    $this->load->view('login',$this->data);  
    $this->load->view('footer',$this->data);
    
  }
  
  /** 
   * Loads the Users_model, calls checkLogin() passing POSTed
   * user/pass & either re-displays Login view with error message
   * or redirects to the user/view/[username] controller to view
   * their messages. If login is successful, a session variable 
   * containing the username is set
   */
  function doLogin(){
    $this->load->helper('url'); 
    $this->load->model('users_model');
    if ($this->users_model->checkLogin($_POST['username'],$_POST['password']) == true){
      $this->session->set_userdata('username', $_POST['username']);
      redirect('user/view/' . $_POST['username']);
    }
    else {
      $this->data['error'] = 'Invalid username or password. Please try again.';
      $this->load->view('login',$this->data);
    }
    
  }
  
  /**
   * Logs the user out, clearing their session variable, and
   * redirects to /user/login
   */
  function logout(){
    $this->load->helper('url'); 
    $this->session->unset_userdata('username');
    redirect('user/login');  
    
  }
  
  /**
   * Loads the Users_model, and invokes the follow() function 
   * to add the entry into the database table. Should redirect
   * back to the /user/view/[followed] page when done
   */
  function follow($follower, $followed){
    $this->load->model('users_model');
    $this->users_model->follow($follower,$followed);
    $this->load->helper('url');
    redirect('user/view/'.$followed);
  }
  
  /**
   * Loads the Messages_model, invokes the getFollowedMessages
   * action, and puts the output into the viewMessages view.
   */
  function feed($name){
    $this->load->model('messages_model');
    $this->load->model('users_model');
    $this->data['messages'] = $this->messages_model->getFollowedMessages($name);
    $this->data['viewType'] = 'feed';
    $this->load->view('header',$this->data);
    $this->load->view('viewMessages',$this->data);
    $this->load->view('footer',$this->data);
  }
}
