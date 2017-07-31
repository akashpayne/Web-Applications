<!-- 
Displays a form in which the user can write a new post. This
for should submit via POST to the /messages/doPost action
 -->
<?php
  // Load the form helper
  $this->load->helper('form');

  // Create the form and fieldset
  echo form_open('message/doPost/ ');
  echo form_fieldset('New Message');
	  // Prepare attributes for input field	
	  $attributes = array(
	    'name' => 'message',
	    'placeholder' => 'Enter your message here.',
	  	'autofocus' => 'autofocus'		
	  );
	  echo form_input($attributes);
	  echo form_submit('submitMessage', 'Send');
  // Close fieldset and form
  echo form_fieldset_close();
  echo form_close();
?>