<head>
	<link rel="icon" type="image/png" href="logo.png" />
	<link rel="stylesheet" type="text/css" href="signupcss.css"></link>
	<style type="text/css">
		.success{
			font-size:30px;
			color:green;
			opacity:.8;
			text-align:center;
		}
	</style>
		
</head>
<?php
	header("Refresh:3;url=index.php");
	if(isset($_SERVER['HTTP_REFERER'])){
echo '<div class="success">Thanks for contacting us.</div><br><center><b>Redirecting to Home page...</b></center>';}
?>
<center><img src="logo.png"/></center><br><p class="random"><a href="index.php">Back to Home</a></p>