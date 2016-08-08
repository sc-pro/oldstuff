<?php
date_default_timezone_set("Asia/Calcutta");

if (isset($_GET['search'])&&!empty($_GET['search'])) {
	$search=$_GET['search'];
}
$csearch=strtolower($search);
if ($csearch=='calculator'||$csearch=='drafter'||$csearch=='book'||$csearch=='solved paper'||$csearch=='quantum'||$csearch=='others'||$csearch=='solved paper/quantum') {
	if ($csearch=='quantum'||$csearch=='solved paper') {
		$csearch='solved paper/quantum';
	}
	header('Location:index.php?category='.$csearch);
}


dbconnect();
$sql="select count(id) from items where title like '%".mysql_real_escape_string($search)."%'";
$query=mysql_query($sql);
$row=mysql_fetch_row($query);
$rows=$row[0];
if ($rows<=0) {
	echo '<div class="success">Please use proper and short keyword.</div>';
}
$page_rows=8;
$last=ceil($rows/$page_rows);
if ($last<1) {
	$last=1;
}
$pagenum=1;
if (isset($_GET['pn'])) {
	$pagenum=preg_replace('#[^0-9]#', '', $_GET['pn']);
}
if ($pagenum<1) {
	$pagenum=1;
}elseif ($pagenum>$last) {
	$pagenum=$last;
}
$newSearch = str_replace(" ","% ", $search);
$limit='limit '.($pagenum-1)*$page_rows.','.$page_rows;
$sql="select id,title,price,mobile from items where title like '%".mysql_real_escape_string($newSearch)."%' order by id desc $limit ";
$query =mysql_query($sql);
$textline1="Items found (<b>$rows</b>)";
$textline2="Page <b>$pagenum</b> of <b>$last</b>";
$paginationCtrls='';
if($last!=1){
	if ($pagenum>1) {
		$previous=$pagenum-1;
		$paginationCtrls.='<a href="'.$_SERVER['PHP_SELF'].'?search='.$search.'&pn='.$previous.'"><li class="page arrow"><<</li></a> &nbsp; &nbsp;';
		for($i=$pagenum-4;$i<$pagenum;$i++){
			if ($i>0) {
				$paginationCtrls.='<a href="'.$_SERVER['PHP_SELF'].'?search='.$search.'&pn='.$i.'"><li class="page">'.$i.'</li></a> &nbsp;';
			}
		}
	}
	$paginationCtrls.=''.$pagenum.' &nbsp; ';
	for($i=$pagenum+1;$i<=$last;$i++){
		$paginationCtrls.='<a href="'.$_SERVER['PHP_SELF'].'?search='.$search.'&pn='.$i.'"><li class="page">'.$i.'</li></a> &nbsp;';
		if ($i>=$pagenum+4) {
			break;
		}
	}
	if ($pagenum!=$last) {
		$next=$pagenum+1;
		$paginationCtrls.=' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?search='.$search.'&pn='.$next.'"><li class="page arrow">>></li></a>';
	}
}
$list='';?>
<h3><?php echo $textline1; ?></h3>
<b><?php echo $textline2; ?></b><br>
<?php
while($row=mysql_fetch_array($query)){
	$id=$row["id"];
	$title=$row['title'];
	$price=$row['price'];
	$mobile=$row['mobile'];
?>

<li class="container">
	<p class="contact"><?php echo "$title"; ?></p>
	<img class="item-img" <?php echo "src=\"upload/$id.jpg\" alt=\"$title\""; ?>>
	<p class="contact">Rs. <?php echo $price; ?></p>
	<p class="price">Contact <?php echo "$mobile"; ?></p>
</li>

<?php
}
?>
<div class="pagination">
	<ul>
		
		<br><?php echo $paginationCtrls;?>
	</ul>
</div>	

