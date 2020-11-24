<?php
	function base_url() {
		return "http://localhost:81/webrating-prototype";
	}
	function cekLogin() {
		$username = @$_SESSION['username'];
		$password = @$_SESSION['level'];
		
		if(empty($username) AND empty($level)) {
			header('location:login.php');
		}
	}
	function sudahLogin() {
		$username = @$_SESSION['username'];
		$password = @$_SESSION['level'];
		if(!empty($username) AND !empty($level)) {
			header('location:index.php');
		}
	}
	
	function flash($tipe, $pesan = '') {
		if(empty($pesan)) {
			$pesan = @$_SESSION[$tipe];
			unset($_SESSION[$tipe]);
			return $pesan;
		} else {
			$_SESSION[$tipe] = $pesan;
		}
	}
	
	/*function privileges() {
		$username = @$_SESSION['username'];
		$password = @$_SESSION['level'];
		if($level != 1) {
			session_destroy();
			header('location:login.php');
		}
	}
	*/
?>