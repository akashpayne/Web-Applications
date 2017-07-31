<!--Displays a login form for the user to supply their username
and password. Submits via POST to /user/dologin
 -->
<?php
   // Load the form helper
  $this->load->helper('form');
  // Open the form
  echo form_open('user/dologin');
  // Wrap everything in a nice fieldset
  echo form_fieldset('Sign In:');
	  // Code for displaying errors
	  if (isset($error)) {
	  	echo '<div class="alert-box alert round">' . $error . '</div>';
	  }
	  // Prepare the attributes for the input fields and create them
	  $attributes = array('name' => 'username', 'placeholder' => 'username');
	  echo form_input($attributes);
	  $attributes = array('name' => 'password', 'placeholder' => 'password');
	  echo form_password($attributes);
	  // Add a button and closing tags
	  echo form_submit('submitLogin', 'Sign in');
  echo form_fieldset_close();
  echo form_close();
?>

