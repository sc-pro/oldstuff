
<?php
function dbconnect(){
$conn_error ='Could not connect to Database.';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'contact';

if(!@mysql_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysql_select_db($mysql_db)){
die($conn_error);
}
}

function censor($title){
	$flag=0;
	$flag+=preg_match("/f+ *u* *c+ *k+/", $title);
	$flag+=preg_match("/fcuk/", $title);
	$flag+=preg_match("/asshole/", $title);
	$flag+=preg_match("/c+ *h+ *[o0]* *d+/", $title);
	$flag+=preg_match("/j+ *h* *a* *n+ *t+/", $title);
	$flag+=preg_match("/b+ *h+ *[o0]* *s+ *d+[ ei]*k+/", $title);
	$flag+=preg_match("/v+ *h* *[o0]* *s+ *d+[ ei]*k+/", $title);
	$flag+=preg_match("/l+[ au]*n+ *d+/", $title);
	$flag+=preg_match("/l+ *a* *[ou0]+ *d+/", $title);
	$flag+=preg_match("/g+ *a* *n+ *d+/", $title);
	$flag+=preg_match("/c+ *h+ *[ou0]+ *t+/", $title);
	$flag+=preg_match("/t+ *a+ *t+ *e+/", $title);
	$flag+=preg_match("/r+ *a* *n+ *d+ *[ei]+/", $title);
	$flag+=preg_match("/r+ *a* *n+ *d+ *w+ *a+/", $title);
	$flag+=preg_match("/b+ *h+ *[0o]* *s+ *d+ *a+/", $title);
	$flag+=preg_match("/v+ *h* *[0o]* *s+ *d+ *a+/", $title);
	$flag+=preg_match("/m+ *[ou0]+ *t+/", $title);

	return $flag;
}

function savedata($category,$title,$price,$mobile,$time){
	$con=mysql_connect('localhost','root','');
	mysql_select_db('contact',$con);
	$query="insert into items (category,title,price,mobile,time) values('$category','".mysql_real_escape_string($title)."','$price','$mobile','$time')";
	$result=mysql_query($query,$con);
	if($result)
	{
		return true;
	}
	else{
		return false;
	}
}


function img($image,$id,$extension){

 $image_size=getimagesize($image);
 $image_width  = $image_size[0];

 $image_height = $image_size[1];

 $new_size = 3*($image_width + $image_height)/($image_width*($image_height/45));
  
 $new_width=$image_width*$new_size;
 $new_height=$image_height*$new_size;
 
 $new_image=imagecreatetruecolor($new_width,$new_height);

 
if ($extension=='jpg'||$extension=='jpeg') {
	$old_image=imagecreatefromjpeg($image);
}elseif ($extension='png') {
	$old_image=imagecreatefrompng($image);
}else{
	echo "<b>Image is not supproted</b>";
}
 imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$image_width,$image_height);
 if(imagejpeg($new_image,"upload/$id.png")){return true;}else{return false;}
}
?>	