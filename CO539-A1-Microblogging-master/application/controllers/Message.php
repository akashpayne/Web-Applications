<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends MY_Controller {
  protected $data = [];
  public function __construct() {
    parent::__construct();
    $this->data = $this->authData;
  }
  /**
   * Redirects to /user/login if not logged in.
   * Displays the Post view
   */
  function index(){
    $this->load->helper('url'); 
    if ($this->data['auth'] == false){
      redirect('user/login');  
    }
    else {
      $this->load->view('header',$this->data);
      $this->load->view('post',$this->data);  
      $this->load->view('footer',$this->data);  
    }
    
  }
  
  /** 
   * Redirects to /user/login if not logged in.
   * Loads the Messages_model, runs the insertMessage function
   * passing the currently logged in user from session 
   * variable, along with the posted message.
   * Redirects to /user/view[username] when done, which should
   * show the user's new post
   */
  function doPost($post=null){
    $this->load->helper('url'); 
    if ($this->data['auth'] == false){
      redirect('user/login');  
    }
    else {
      $this->load->model('messages_model');
      $this->messages_model->insertMessage($this->data['username'],$_POST['message']);
      redirect('user/view/'.$this->data['username']);
    }  
  }
}