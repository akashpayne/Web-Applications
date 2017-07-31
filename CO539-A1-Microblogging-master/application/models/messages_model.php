<?php
class Messages_model extends CI_Model {
  
  public function __construct(){
    $this->load->database();    
  }
 
  /**
   * Returns all messages posted by the user with the specified
   * username, most recent first
   * @param $name The username whose posts should be retrieved
   * @return The results as an array
   */
  function getMessagesByPoster($name){
  	// Prepare database query
    $this->db->select('user_username, text, posted_at')
      ->from('Messages')->where('user_username', $name)
      ->order_by('posted_at', 'desc');
    // Run database query
    $query = $this->db->get();
    // Return results as array
    return $query->result_array();  
  }
  
  /**
   * Returns all messages containing the specified 
   * search string, most recent first
   * @param $string The terms to be found
   * @return The results as an array
   */
  function searchMessages($string) {
    $this->db->select('user_username, text, posted_at')
      ->from('Messages')->like('text',$string)->or_like('user_username',$string)
      ->order_by('posted_at', 'desc');
    $query = $this->db->get();
    return $query->result_array(); 
  }
  
  /**
   * Adds the supplied message to the messages table in the 
   * database
   * @param $poster The name of the user submitting the post
   * @param $string The message to be posted
   */
  function insertMessage($poster, $string){
    $this->load->helper('date');
    $now = date("Y-m-d H:i:s");
    $data = array(
      'user_username' => $poster,
      'text' => $string,      
      'posted_at' => $now  
    );
    $this->db->insert('Messages',$data);
  }
  
  /**
   * Returns all of the messages from all of those followed
   * by the specified user, most recent first.
   * @param $name The name of the user 
   */
  function getFollowedMessages($name) {
    $this->db->select('*')->from('Messages')
	  ->join('User_Follows', 'Messages.user_username = User_Follows.followed_username')
      ->where('User_Follows.follower_username', $name);
    $query = $this->db->get();
    return $query->result_array();
  }
}

