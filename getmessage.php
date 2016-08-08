<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['college']) && isset($_POST['message'])){
	$name = htmlentities($_POST['name']);
	$email = htmlentities($_POST['email']);
	$college = htmlentities($_POST['college']);
	$message = htmlentities($_POST['message']);
		
	if(!empty($name) && !empty($email) && !empty($college) && !empty($message)){
		if(strlen($name)>40 || strlen($email)>50 || strlen($college)>50 || strlen($message)>300){
			echo '<div class="success">	Please...make your message sensible.</div>';
		}elseif (filter_var($email,FILTER_VALIDATE_EMAIL)===false) {
			echo "<div class=\"success\">Please enter a valid Email.</div>";
		}
		else{
			mysql_query("insert into message ( name,email,college,message)values ('".mysql_real_escape_string($name)."','$email','".mysql_real_escape_string($college)."','".mysql_real_escape_string($message)."')");
			
			$redirect_page = 'success.php';
			$redirect = true;
			if($redirect == true){
			header('Location:'.$redirect_page);
			}
		}
}	
	}
	else{
	
	}
	
?>
<head>
	<style type="text/css">
		.success{
			font-size:30px;
			color:red;
			opacity:.8;
			text-align:center;
		}
	</style>
</head>