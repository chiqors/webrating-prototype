<?php
	include 'db/koneksi.php';
    sudahLogin();
    
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password1'];
        $password2 = $_POST['password2'];
		$email = $_POST['email'];
		
		$motto = $_POST['motto'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$fullname = $firstname . " " . $lastname;
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$website = $_POST['website'];
		$kota = $_POST['kota'];
		$alamat = $_POST['alamat'];
		$about_you = $_POST['about_you'];
        
        //Password PHP/SQL
        /*  in SQL = SHA1('$password')
            in PHP = SHA1['password'];    
        */
        
        if($password == $password2) {
            $sql = "INSERT INTO t_user(id_user, username, password, email, usertype, motto, nama_user, jenis_kelamin, tanggal_lahir, kota, alamat, website, about_you) VALUES ('','$username',SHA1('$password'),'$email','user','$motto','$fullname','$jenis_kelamin','$tanggal_lahir','$kota','$alamat','$website','$about_you')";
            if ($mysql->query($sql)) {
                $success = "Data akun anda berhasil diregistrasikan";
            }
            else{
                $error = "Data akun anda dalam masalah. Coba ulang atau kontak support. ".$mysql->error;
            }   
        } else {
            $error = "Password doesn't match with confirmation pasword";
        }
    }
	include 'views/v_register.php';
?>