<?php
	require('functions.php');
	dbconnect();
	require('getmessage.php');
	

?>
<html>
<head>
	<link rel="icon" type="image/png" href="logo.png" />
	<link rel="stylesheet" type="text/css" href="signupcss.css"></link>
</head>
<body>
	<p class="message">Leave a message...</p>
	<div class="login">
			<form action="contact.php" method="POST" class="form" >
				<input class="search-box" name="name" placeholder="Name" maxlength="25"  required></input><br>
				<input class="search-box" name="email" placeholder="Email" maxlength="50" required></input><br>
				<input class="search-box" name="college" placeholder="Your college name" maxlength="50" required></input><br>
				<textarea class="search-box" name="message" placeholder="Message here..." maxlength="300" required></textarea><br><br>
				<button class="btn">SUBMIT</button><br>
			</form>
	</div>
<div class="social">
	<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//www.oldstuff.in"><img class="icon" src="facebook.png"></img></a>
	<a href="https://twitter.com/home?status=http%3A//www.oldstuff.in"><img class="icon" src="twitter.png"></img></a>
	<a href="https://plus.google.com/share?url=http%3A//www.oldstuff.in"><img class="icon" src="g+.png"></img></a>
	<a href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A//www.oldstuff.in&title=oldstuff.in(Buy%20and%20sell%20used%20items)&summary=Buy%20and%20sell%20used%20items.&source="><img class="icon" src="linkedin.png"> </img></a>
</div>	
<p class="random"><a href="index.php">Back to Home</a></p>	
</body>
</html>