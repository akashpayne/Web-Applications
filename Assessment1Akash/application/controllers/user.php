<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class User extends CI_Controller 
	{
		protected $data = [];
		public function __construct() 
		{
			parent::__construct(); 
			$this->load->database();
			$this->load->helper('url');
		}
	  
		/**
		 * Normal/default action that shows the user's profile if correct else redirects to login.
		 */
		public function index() 
		{
			if ($this->session->userdata('isLoggedIn'))
			{
				redirect('user/view/'.$this->data['username']);
			}
			else 
			{
				redirect('user/login');
			}
		}
		
		/**
		 * Logs the user in 
		 */  
		function login_user() 
		{
			// Create an instance of the user model
			$this->load->model('users_model');

			// Grab the email and password from the form POST
			$username = $this->input->post('username');
			$pass  = $this->input->post('password');

			//Ensure values exist for email and pass, and validate the user's credentials
			if( $user && $pass && $this->users_model->checkLogin($username,$pass)) 
			{
				// If the user is valid, redirect to the main view
				redirect('user/view/'.$this->data['username']);
			} 
			else 
			{
				// Otherwise show the login screen with an error message.
				$this->show_login(true);
			}
		}
		
		/**
		 * shows login error and then displays login view
		 */		
		function show_login( $show_error = false ) 
		{
			$data['error'] = $show_error;
			$this->load->helper('form');
			$this->load->view('login',$this->$data);
		}
	  
		/**
		 * logs the user out
		 */
		function logout_user() 
		{
		  $this->session->sess_destroy();
		  $this->index();
		}	
		
		/**
		 * Outputs the login view with the user's details
		 */
		function login()
		{
			$this->load->view('login',$this->data);  
		}
	  
		/**
		 * Loads 'Messages_model', executes getMessagesByPoster(), 
		 * and outputs the output in the 'ViewMessages' (view).
		 */
		public function view($name) 
		{
			// load the model and the user
			$this->load->model('messages_model');
			$this->load->model('users_model');
			
			// assign messages from the user's posts
			$this->data['messages'] = $this->messages_model->getMessagesByPoster($name);
			$this->data['currentlyViewing'] = $name;
			$this->data['viewType'] = 'profile';
			$this->data['following'] = $this->users_model->isFollowing($this->session->userdata('username'),$name);
			
			// load the views
			$this->load->view('header',$this->data);
			$this->load->view('viewMessages',$this->data);  
			$this->load->view('footer',$this->data);
		}
	  
		/** 
		 * Loads the 'Users_model' and then executes 'checkLogin()': passes POSTed user/pass. 
		 * Re-outputs Login view with the error message/redirects to the 'user/view/[username]' controller. Enables user to view their messages. 
		 * If login, set a session variable containing the username.
		 */
		function doLogin()
		{
			$this->load->helper('url'); 
			$this->load->model('users_model');
			if ($this->users_model->checkLogin($_POST['username'],$_POST['password']) == true)
			{
			  $this->session->set_userdata('username', $_POST['username']);
			  redirect('user/view/' . $_POST['username']);
			}
			else 
			{
			  $this->data['error'] = 'Invalid username/password. Please try again.';
			  $this->load->view('login',$this->data);
			}
		}
	  
		/**
		 * Log out the user and clear their session. Then redirects to '/user/login'.
		 */
		function logout()
		{
			$this->load->helper('url'); 
			$this->session->unset_userdata('username');
			redirect('user/login');  
		}
	  
		/**
		 * Load the 'Users_model', and run 'follow()' function that adds entry into the database table. 
		 * Redirects to the '/user/view/[followed]'.
		 */
		function follow($follower, $followed)
		{
			$this->load->model('users_model');
			$this->users_model->follow($follower,$followed);
			$this->load->helper('url');
			redirect('user/view/'.$followed);
		}
	  
		/**
		 * Load 'Messages_model', and run 'getFollowedMessages' action.
		 * Output -> 'viewMessages' (view).
		 */
		function feed($name)
		{
			$this->load->model('messages_model');
			$this->load->model('users_model');
			$this->data['messages'] = $this->messages_model->getFollowedMessages($name);
			$this->data['viewType'] = 'feed';
			$this->load->view('header',$this->data);
			$this->load->view('viewMessages',$this->data);
			$this->load->view('footer',$this->data);
		}
	}
