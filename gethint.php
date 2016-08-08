<?php require 'functions.php';
	if (isset($_GET['search'])) {
		$search=$_GET['search'];}
	if (!empty($search)) {
		dbconnect();
		$newSearch = str_replace(" ","% ", $search);
		$query="select title from items where title like '%".mysql_real_escape_string($newSearch)."%' order by id desc LIMIT 0,6";
		$query_run=mysql_query($query);
	while ($query_row=mysql_fetch_assoc($query_run)) {
		$name=$query_row['title'];
		$link=urlencode($name);
		echo "<a style=\"color:blue;\" href=index.php?search=$link>$name</a><br />";		
	}
	}
	
 ?>