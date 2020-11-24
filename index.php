<?php
	include 'db/koneksi.php';
	$id_user = !empty($_SESSION['id_user'])?$_SESSION['id_user']:"";
	$sql = "SELECT * FROM t_user WHERE t_user.id_user = '$id_user'";
	$data = $mysql->query($sql) or die($mysql->error);
	//Tampilkan v_index

	include 'views/v_index.php';
?>