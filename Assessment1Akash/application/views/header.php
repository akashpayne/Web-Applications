<?php 
	$this->load->helper('url');
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
	<!-- <meta/> -->
	<title>MicroBlog</title>
</head>
<body>
<!--
	Foundation navbar 
-->
<?
	// Check if the user is logged in before setting up the navbar
	if ($auth)
	{
	?>
		<div>
			<nav>
				<h1><a>Microblog</a></h1>
				<h2>CO539 Assessment 1</h2> 
				<p><cite> ap567 - Akash Payne </cite></p>
				<p> Built using 
					<a href='http://ellislab.com/codeigniter' target='_blank'>CodeIgniter</a>,
				</p>
				<section>
					<!-- Left Nav Section -->
					<ul>
				
					</ul>
					<!-- Right Nav Section -->
					<ul>
						
					</ul>
				</section>
			</nav>
		</div>
	<?}
	else
	{?>
		<div>
			<nav>
				<h1><a>Microblog</a></h1>
				<h2>CO539 Assessment 1</h2> 
				<p><cite> ap567 - Akash Payne </cite></p>
				<p> Built using 
					<a href='http://ellislab.com/codeigniter' target='_blank'>CodeIgniter</a>,
				</p>
				<!-- Right Nav Section -->
				<ul>

				</ul>
			</nav>
		</div>
	<?}
?>
<!-- Open the main content div -->
<div>