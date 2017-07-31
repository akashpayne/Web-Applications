<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller {
	protected $data = [];
  public function __construct() {
    parent::__construct();
    $this->data = $this->authData;
  }
  /**
   * Displays the search view
   */
  public function index(){
    $this->load->view('header',$this->data);
    $this->load->view('search',$this->data);  
    $this->load->view('footer',$this->data);
  }
  
  /**
   * Loads Messages_model, retrieves the search string from
   * GET parameters, runs searchMessages() and displays the 
   * output in the ViewMessages view
   */
  public function dosearch() {
    $terms = $_GET['searchTerms'];
    $this->load->model('messages_model');
    $this->data['messages'] = $this->messages_model->searchMessages($terms);
    $this->data['viewType'] = 'searchResults';
    $this->load->view('header',$this->data);
    $this->load->view('viewMessages',$this->data);
    $this->load->view('footer',$this->data);
  }
}