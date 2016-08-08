<?php
require('upload.php');
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="signupcss.css"></link>
</head>
<body>
	<p class="message">Sell your items</p>
	<div class="login">
			<form action="sell.php" method="POST" enctype="multipart/form-data" >
				<select class="search-box" name="category" required>	
					<optgroup label="select category">
						<option >Calculator</option>
						<option >Drafter</option>
						<option >Book</option>
						<option selected="selected">Solved paper/Quantum</option>
						<option >Others</option>
					</optgroup>
				</select>
				<input class="search-box" name="title"  placeholder="Add title to the item" maxlength="45" type="text" required></input><br>
				<input class="search-box" name="price"  placeholder="Demanded Price"  type="number" required></input><br>
				<input class="search-box" name="mobile" placeholder=" 10 digit mobile no"  type="number" required></input><br><br>
				<h5>Upload an image of item ( less than 5 MB )</h5><br>
				<input class="custom-file-input" type="file" accept=".png,.jpg,.jpeg" name="image" required>
				<button class="btn" name="submit">SUBMIT</button><br>
			</form>
	</div>
	<p class="random"><a href="index.php">Back to Home</a></p>
</body>
</html>	