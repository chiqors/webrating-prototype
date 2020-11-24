<?php
	include 'db/koneksi.php';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        //Password PHP/SQL
        /*  in SQL = SHA1('$password')
            in PHP = SHA1['password'];    
        */
		
        $sql = "SELECT * FROM t_user
                WHERE username = '$username'
                AND password = SHA1('$password')";
        $data = $mysql->query($sql) or die($mysql->error);
        if($data->num_rows != 0) {
            $row = mysqli_fetch_object($data);
			$_SESSION['id_user'] = $row->id_user;
            $_SESSION['username'] = $row->username;
            $_SESSION['usertype'] = $row->usertype;
            $_SESSION['loggedin'] = true;
			header('location: index.php');
        } else {
            $error = "Username atau password salah";
        }
    }
	if($_SERVER['REQUEST_URI'] == "/webrating-prototype/login.php") {
		include "views/v_login.php";
	} else {
		header('location: index.php');
	}
?>