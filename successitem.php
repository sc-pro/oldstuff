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
	header("Refresh:4;url=index.php");
	if(isset($_SERVER['HTTP_REFERER'])){
echo '<div class="success">Item submitted..sit back and relax</div>';}
?>
<center><img src="logo.png"/></center><p class="random"><a href="index.php">Back to Home</a></p>
<?php
if(isset($_SERVER['HTTP_REFERER'])){?>
<p class="random"><a href="sell.php">Upload another item.</a></p>
<?php } ?>