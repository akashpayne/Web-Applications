<?php
	class Users_model extends CI_Model
	{
		/**
		 * Returns: TRUE if a users exists in the database with the
		 * given username and password and FALSE if not.
		 */
		function checkLogin($username, $pass)
		{
			// Build a query to retreieve the user's details
			// based on the received username and password
			$this->db->from('Users');
			$this->db->where('username',$username);
			$this->db->where('password', sha1($pass) );
			$login = $this->db->get()->result(); //count_all_results(); 
				   //$this->db->get()->result(); - get error, glitch in update 2.4 https://support.ellislab.com/bugs/detail/17380
			/**
			// The results of the query are stored in $login.
			// If a value exists, then the user account exists and is validated
			if ( is_array($login) && count($login) == 1 )
			{
				// Set the users details into the $details property of this class
				$this->details = $login[0];
				// Call set_session to set the user's session vars via CodeIgniter
				$this->set_session();
				return true;
			}
			*/ 
			if ($login > 0) 
			{
				$this->set_session();
				return true;
			}
			else 
			{
				return false;
			}
		}
		
		
		/**
		 * session->set_userdata is a CodeIgniter function that stores data in 
		 * CodeIgniter's session storage.
		 */
		function set_session() 
		{
			$this->session->set_userdata( array(
					'username'=>$this->Users->username,
					'password'=>$this->Users->password,
					'email'=>$this->Users->email,
					'avatar'=>$this->Users->avatar,
					'follower_username'=>$this->User_Follows->follower_username,
					'followed_username'=>$this->User_Follows->followed_username,
					'isLoggedIn'=>true
				)
			);
		}
		
		/** 
		 * Returns TRUE if $follower is following $followed, FALSE
		 * otherwise
		 */
		function isFollowing($follower,$followed)
		{
			$this->db->from('User_Follows');
			$this->db->where('follower_username', $follower);
			$this->db->where('followed_username', $followed); 
			$count = $this->db->count_all_results();
			if ($count > 0)
			{
				return true;
			}
			else 
			{
				return false;  
			}
		}
		
		/**
		* Inserts a row into the following table indicating that 
		* $follower follows $followed
		*/
		function follow($follower, $followed)
		{
		$data = array(
			'follower_username' => $follower,
			'followed_username' => $followed,      
			);
		$this->db->insert('User_Follows',$data);
		}
	}
