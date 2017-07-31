<?php 
  $this->load->helper('url');
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta name="viewport" content="width=device-width" />
  <title>MicroBlog</title>
  <!-- Zurb Foundation scripts and CSS. PHP Echoes added to make it work with CodeIgniter -->
  <link rel="stylesheet" href="<?php echo base_url('css/normalize.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('css/foundation.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('css/font-awesome.css')?>" />
  <script src="<?php echo base_url('js/vendor/custom.modernizr.js')?>"></script>
</head>
<body>

<!--
	Foundation navbar 
-->

<?
// Check if the user is logged in before setting up the navbar
if ($auth){
?>
<div class="contain-to-grid fixed">
	<nav class="top-bar">
	  <ul class="title-area">
	    <!-- Title Area -->
	    <li class="name">
      		<h1><a href="#" data-reveal-id='about'>Microblog</a></h1>
	      	<div id='about' class='reveal-modal' ><a class="close-reveal-modal">&#215;</a>
	      		<h2>CO539 Assessment 1: Microblogging app</h2> 
	      		<p><cite> By Edmond Lepedus (el210) </cite></p>
	      		<p> Built using 
	      			<a href='http://ellislab.com/codeigniter' target='_blank'>CodeIgniter</a>,
	      			<a href='http://foundation.zurb.com' target='_blank'> Foundation</a> &amp;
	      			<a href='http://fontawesome.io' target='_blank'> FontAwesome</a>.
	      			</p>
	      		</div>
    	</li>
	    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
	  </ul>
	
	  <section class="top-bar-section">
	    <!-- Left Nav Section -->
	    <ul class="left">
	    <li class="divider"></li> 
	      <li >
	        <a href="<?php echo site_url('/user/view/'.$username)?>"><i class="fa fa-home fa-lg fa-fw"></i><?php echo ucfirst($username)?></a>
	      </li>
	      <li class="divider"></li>
	      <li class="active"><a href="<?php echo site_url('user/feed/'.$username)?>"><i class="fa fa-inbox fa-lg fa-fw"></i>Feed</a></li>
	      <li class="divider"></li>
	      <li><a href="<?php echo site_url('search')?>"><i class="fa fa-search fa-lg fa-fw"></i>Search</a></li>
	      <li class="divider"></li>
	    </ul>
	    <!-- Right Nav Section -->
	    <ul class="right">
	    <li class="divider"></li>
	      <li >
	        <a href="<?php echo site_url('message')?>" data-reveal-id='modalForm'><i class=" fa fa-pencil-square-o fa-lg fa-fw"></i>New message</a>
	      	<div id='modalForm' class='reveal-modal' ><a class="close-reveal-modal">&#215;</a><?php include 'post.php'?> </div>
	      </li>
	      <li class="divider"></li>
	      <li >
	        <a href="<?php echo site_url('user/logout')?>"><i class="fa fa-sign-out fa-lg fa-fw"></i>Sign out</a>
	      </li>
	    </ul>
	  </section>
	</nav>
</div>
<?}
else{?>
	<div class="contain-to-grid fixed">
	<nav class="top-bar">
	  <ul class="title-area">
	    <!-- Title Area -->
	    <li class="name">
      		<h1><a href="#" data-reveal-id='about'>Microblog</a></h1>
	      	<div id='about' class='reveal-modal' ><a class="close-reveal-modal">&#215;</a>
	      		<h2>CO539 Assessment 1: Microblogging app</h2> 
	      		<p><cite> By Edmond Lepedus (el210) </cite></p>
	      		<p> Built using 
	      			<a href='http://ellislab.com/codeigniter' target='_blank'>CodeIgniter</a>,
	      			<a href='http://foundation.zurb.com' target='_blank'> Foundation</a> &amp;
	      			<a href='http://fontawesome.io' target='_blank'> FontAwesome</a>.
	      			</p>
	      		</div>
    	</li>
	    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
	  </ul>
	  <section class="top-bar-section">
	    <!-- Left Nav Section -->
	    <ul class="left">
	    <li class="divider"></li>
	    </ul>
	    <!-- Right Nav Section -->
	    <ul class="right">
	      <li class="divider"></li>
	      <li >
	        <a href="<?php echo site_url('user/login')?>"><i class="fa fa-sign-in fa-lg fa-fw"></i>Sign in</a>
	      </li>
	    </ul>
	  </section>
	</nav>
</div>
<?}?>
<!-- Open the main content div -->
<div class='row'>
	
