<?php
		include "db/koneksi.php";
		cekLogin();
		if($_SERVER['QUERY_STRING'] == "") {
			$id_user = $_SESSION['id_user'];
			$linkprofile = "profiles.php?userid=$id_user";
			header('Location: ' . $linkprofile);
		} else {
			$userid = $_GET['userid'];
		}
		if (!empty($userid)) {
				$sql = "SELECT * FROM t_user WHERE t_user.id_user = $userid";
				$query 	= $mysql->query($sql);
				$result = mysqli_fetch_object($query);
				$id_user = $result->id_user;
				$nama_user = $result->nama_user;
				$jenis_kelamin = $result->jenis_kelamin;
				$tanggal_lahir = $result->tanggal_lahir;
				$motto = $result->motto;
				$kota = $result->kota;
				$negara = $result->negara;
				$alamat = $result->website;
				$about_you = $result->about_you;
				$username = $result->username;
				$usertype = $result->usertype;
				$email = $result->email;
				$website = $result->website;
				$password = $result->password;
		}
		
		$sql2 = "SELECT * FROM t_rating  r,t_user u,t_book b,t_book_author ba 
				WHERE r.id_user = u.id_user 
				AND b.id_book = r.id_book 
				AND ba.id_book_author = b.id_book_author
				AND u.id_user = $id_user";
		$data2 = $mysql->query($sql2) or die($mysql->error);
		$changed = mysqli_fetch_object($data2);
		$idbuku = $changed->id_book;
		
		$sql6 = "SELECT * FROM t_rating  r,t_user u,t_book b,t_book_author ba 
				WHERE r.id_user = u.id_user 
				AND b.id_book = r.id_book 
				AND ba.id_book_author = b.id_book_author
				AND u.id_user = $id_user";
		$data6 = $mysql->query($sql6) or die($mysql->error);
		
		$sql5 ="SELECT * FROM t_user u,t_book b,t_book_author ba WHERE ba.id_book_author = b.id_book_author AND ba.id_user = u.id_user AND b.id_book = $idbuku";
		$data5 = $mysql->query($sql5) or die($mysql->error);
		$changed = null;
		
		$sql4 = "SELECT id_user FROM t_user WHERE t_user.id_user = $userid";
		$data4 = $mysql->query($sql4) or die($mysql->error);
		$result4 = mysqli_fetch_object($data4);
		$check_id = $result->id_user;
		if(!empty($check_id)) {
			include "views/v_profiles.php";
		} else {
			header('Location: error.php');
		}
?>