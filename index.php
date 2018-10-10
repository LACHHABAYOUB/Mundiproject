<?php
$page=htmlentities($_GET['page']);
$pages=scandir('pages');

if (!empty($page)&& in_array($_GET['page'].".php",$pages)) {
	# code...
	$content='pages/'.$_GET['page'].".php";
}
else{

	header("location:index.php?page=home");
}
?>


<?php
	include($content);
	?>