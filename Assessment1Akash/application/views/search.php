<!--
Displays a form with a search box, in which the user can enter
the search terms. The form submits to /search/dosearch via 
GET
 -->
<?php
	// Load the CI form helper
	$this->load->helper('form');
	// Set form attributes and open form 
	$attributes = array('method' => 'GET');
	echo form_open('search/doSearch',$attributes);
	echo form_fieldset('Search');
	// Make sure the search field uses the new HTML5 'search' type
	$attributes = array('type' => 'search', 'name' => 'searchTerms', 'autofocus' => 'autofocus');
	echo form_input($attributes);
	echo form_submit('submitSearch', 'Search!');
	echo form_fieldset_close();
	echo form_close();
?>