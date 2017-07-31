<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Message extends CI_Controller 
	{
		protected $data = [];
		
		/*
		public function __construct() 
		{
			parent::__construct();
			$this->load->database();  
		}
	     */
		
		/**
		 * Redirects to '/user/login' if not logged in.
		 * Displays the Post view
		 */
		function index()
		{
			$this->load->helper('url'); 
			if ($this->session->userdata('isLoggedIn'))
			{
				$this->load->view('header',$this->data);
				$this->load->view('post',$this->data);  
				$this->load->view('footer',$this->data);  
			}
			else 
			{
				redirect('user/login');  
			}
		}

		/** 
		 * Redirects to '/user/login' if not logged in.
		 * Loads 'Messages_model' and executes 'insertMessage' 
		 * Passing the currently logged in user from session 
	 	 * variable, along with the submitted message.
		 * Redirects to '/user/view[username] (show the user's 
		 * new post).
		 */
		function doPost($post=null)
		{
			$this->load->helper('url'); 
			if ($this->session->userdata('isLoggedIn'))
			{
				$this->load->model('messages_model');
				$this->messages_model->insertMessage($this->session->userdata['username'],$_POST['message']);
				redirect('user/view/'.$this->session->userdata['username']);  
			}
			else 
			{
				redirect('user/login');
			}  
		}
	}
