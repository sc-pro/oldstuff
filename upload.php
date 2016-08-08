<?php
require('functions.php');
date_default_timezone_set("Asia/Calcutta");
if(isset($_POST['submit'])){
	$max_size=5000000;
	$price=trim($_POST['price']);
	$mobile=trim($_POST['mobile']);
	$size=($_FILES['image']['size']);
	$type=addslashes($_FILES['image']['type']);
	$image=addslashes($_FILES['image']['tmp_name']);
	$category=htmlentities($_POST['category']);
	$title=htmlentities(trim($_POST['title']));
	$price=intval($price);
	if ($size<=$max_size ) {
		$image_size=getimagesize($image);
		$extension=$image_size['mime'];
		$extension = strtolower(substr($extension,strrpos($extension,'/') + 1 ));
	}
	if( $size>$max_size || $extension != 'jpg' && $extension != 'jpeg' && $extension != 'png')
	{	
		echo '<div class="success">Image not supported</div>';
	}else if($category!='Calculator'&&$category!='Drafter'&&$category!='Book'&&$category!='Solved paper/Quantum'&&$category!='Others'){
		echo '<div class="success">Select a proper category.</div>';
	
	}else if($title==""||strlen($title)>45){
		echo '<div class="success">Enter a valid title.</div>';
	}else if(censor($title)>0){
		echo "<div class=\"success\">Try another Title for the item</div>";
	}else if($mobile<7000000000||$mobile>9999999999 || strlen($mobile)!=10){
		echo '<div class="success">Enter valid mobile number.</div>';
	}else if($price<0||$price>200000){
		echo '<div class="success">Enter a valid price.</div>';
	}
	else{
		$time=time();
		$return1=savedata($category,$title,$price,$mobile,$time);
		$id=mysql_query("Select id from items where time=$time and mobile=$mobile order by id desc limit 1");
		$id=mysql_result($id, 0);
		$return2=img($image,$id,$extension);
		if($return1==true && $return2==true){
			$redirect_page = 'successitem.php';
			header('Location:'.$redirect_page);
		}else{
			echo '<div class="success">Something went wrong.</div>';
		}
	}
	
}

?>

<head>
<link rel="icon" type="image/png" href="logo.png" />
<style rel="stylesheet" href="style1.css" type="text/css"></style>
	<style type="text/css">
		.success{
			font-size:30px;
			color:red;
			opacity:.8;
			text-align:center;
		}
	</style>
</head>