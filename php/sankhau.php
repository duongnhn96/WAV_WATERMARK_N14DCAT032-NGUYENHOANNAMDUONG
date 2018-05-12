<?php
	$act = $_GET['act'];
	if($act=="dn") include('login.php');
	else if($act=="dk") include('register.php');
	else if($act=="thoat") include('logout.php');
	else if($act=="checkWatermask") include('checkwatermask.php');
	else if($act=="upload") include('uploadfile.php');
	else if($act=="nct") include('nhacdamua.php');
	else include('danhsach.php');

?>