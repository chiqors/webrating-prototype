<?php
		include "db/koneksi.php";
		cekLogin();
		if($_SERVER['QUERY_STRING'] == "") {
			$id_user = $_SESSION['id_user'];
			$linkprofile = "profile_editor.php?userid=$id_user";
			header('Location: ' . $linkprofile);
		} else {
			$userid = $_GET['userid'];
			if($_SESSION['id_user'] != $userid) {
				 header("Location: error.php");
			}
		}
		if (!empty($userid)) {
			$sql1 = "SELECT * FROM t_user WHERE t_user.id_user = $userid";
			$query 	= $mysql->query($sql1);
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
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$motto = $_POST['motto'];
			$fullname = $_POST['fullname'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$tanggal_lahir = $_POST['tanggal_lahir'];
			$website = $_POST['website'];
			$kota = $_POST['kota'];
			$alamat = $_POST['alamat'];
			$about_you = $_POST['about_you'];
			
			$username = $_POST['username'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$email = $_POST['email'];
			
			if($password1 == $password2) {
				$sql2 = "UPDATE t_user SET motto = '$motto',nama_user = '$fullname',jenis_kelamin = '$jenis_kelamin',tanggal_lahir = '$tanggal_lahir',website = '$website',kota = '$kota',alamat = '$alamat',about_you = '$about_you',username = '$username',password = SHA1('$password1'),email = '$email' WHERE id_user = $userid";
				print_r($sql2);
				$query2	= $mysql->query($sql2);
				if ($query2) {
					$success = "Data akun anda berhasil diregistrasikan";
				}
				else{
					$error = "Data akun anda dalam masalah. Coba ulang atau kontak support. ".$mysql->error;
				}   
			} else {
				$error = "Password doesn't match with confirmation pasword";
			}
			
			//Password PHP/SQL
			/*  in SQL = SHA1('$password')
				in PHP = SHA1['password'];    
			*/
		}
		
		include "views/v_profile_editor.php";
?>