<?php
class Users_model extends CI_Model {
  
  public function __construct(){
    $this->load->database();    
  }
  /**
   * Returns TRUE if a users exists in the database with the
   * specified username and password and FALSE if not.
   */
  function checkLogin($username, $pass){
    $password = $this->encrypt->sha1($pass);
    $this->db->from('Users');
    $this->db->where('username',$username);
    $this->db->where('password', $password);
    $count = $this->db->count_all_results();
    
    if ($count > 0){
      return true;
    }
    else {
      return false;  
    }
    
  }  
  
  /** 
   * Returns TRUE if $follower is following $followed, FALSE
   * otherwise
   */
  function isFollowing($follower,$followed){
    $this->db->from('User_Follows');
    $this->db->where('follower_username', $follower);
    $this->db->where('followed_username', $followed); 
    $count = $this->db->count_all_results();
    
    if ($count > 0){
      return true;
    }
    else {
      return false;  
    }
  }
  
  /**
   * Inserts a row into the following table indicating that 
   * $follower follows $followed
   */
  function follow($follower, $followed){
    $data = array(
      'follower_username' => $follower,
      'followed_username' => $followed,      
    );
    $this->db->insert('User_Follows',$data);
  }
}