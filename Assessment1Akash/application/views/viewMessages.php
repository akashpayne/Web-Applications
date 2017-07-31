<!-- 
	Displays a list of messages: user, content, and time of each message. 
	User's name should be linked to the user/view/[username]
-->

<?php 
	// check if the user is logged in
	if ($this->session->userdata('isLoggedIn'))
	{
		$username = $this->session->userdata('username');
		// Since this view is used in different contexts, we check the view type and tailor to suit
		switch ($viewType)
		{
			/* 
			 * Viewing someone's profile should allow you to follow them, if you aren't doing so already.
			 * Viewing your own profile should allow you to post a new message 
			 */
			case "profile":
			echo '<h1>'.ucfirst($currentlyViewing).'</h1>';
			if (!$following && $username != $currentlyViewing )
			{
				echo "<a href='../follow/"
				.$username.'/'
				.$currentlyViewing."'>Follow "
				.$currentlyViewing."</a>";
			}
			if($username == $currentlyViewing)
			{
				require 'post.php';
			}
			break;
			// If showing search results, put a heading in
			case "searchResults":
			echo '<h1>'."Results".'</h1>';	
			break;
			// If showing a feed, put a heading in
			case 'feed':
			echo '<h1>'.'Feed'.'</h1>';
			break;
		}
	}
	// Iterate through the messages and output them
	foreach ($messages as $row)
	{
		echo '<div class="panel">';
		echo '<h3><a href="../view/'.$row['user_username'].'">'.$row['user_username'].'</a></h3>';
		echo $row['text'];
		echo '<p><time class="subheader">'.$row['posted_at'].'</time></p>';
		echo '</div>';
	}
?>