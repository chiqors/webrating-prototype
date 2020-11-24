<?php
	include 'db/koneksi.php';
	cekLogin();
	$id_user = $_SESSION['id_user'];

	if(!empty($id_user)) {
		$sql 	= "SELECT t_user.username FROM t_user WHERE id_user = $id_user";
		$query 	= $mysql->query($sql);
	} else {
		header('Location: browse.php');
	}
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$title_book 	= $_POST['title_book'];
		$category_type  = $_POST['category_type'];
        $features_books = $_POST['features_book'];
		$description_book	= $_POST['description_book'];
		$release_date       = $_POST['release_date'];
		
		//input buku
		$sql1 = "INSERT INTO t_book(id_book,title_book,category_type,features_book,description_book,release_date) 
				VALUES ('','$title_book','$category_type','$features_books','$description_book','$release_date')";
		$sql2 = "SELECT t_book.id_book FROM t_book WHERE t_book.title_book = '$title_book'";
		
		$query1 = $mysql->query($sql1) or die($mysql->error);
		$query2 = $mysql->query($sql2) or die($mysql->error);
		$result2 = mysqli_fetch_object($query2);
		$id_book = $result2->id_book;
		print_r($id_book);
		
		$sql3 = "INSERT INTO t_book_author(id_book_author,id_book,id_user) VALUES ('','$id_book','$id_user')";
		$sql4 = "SELECT t_book_author.id_book_author FROM t_book_author WHERE t_book_author.id_book = $id_book";
		
		$query3 = $mysql->query($sql3) or die($mysql->error);
		$query4 = $mysql->query($sql4) or die($mysql->error);
		$result4 = mysqli_fetch_object($query4);
		$id_book_author = $result4->id_book_author;
		
		$sql5 = "UPDATE t_book SET id_book_author = '$id_book_author' WHERE id_book = '$id_book'";
		
		$query5 = $mysql->query($sql5) or die($mysql->error);
		
		if ($mysql->query($sql)) {
			$success = "DATA BERHASIL DITAMBAHKAN";
			if($mysql->query($sql2)) {
				$success = "DATA BERHASIL DITAMBAHKAN";
				if($mysql->query($sql3)) {
					$success = "DATA BERHASIL DITAMBAHKAN";
					if($mysql->query($sql4)) {
						$success = "DATA BERHASIL DITAMBAHKAN";
						if($mysql->query($sql5)) {
							$success = "DATA BERHASIL DITAMBAHKAN";
						} else {
							$error = " Data Error.".$mysql->error;
						}
					} else {
						$error = " Data Error.".$mysql->error;
					}
				} else {
					$error = " Data Error.".$mysql->error;
				}
			} else {
				$error = " Data Error.".$mysql->error;
			}
		} else {
			$error = " Data Error.".$mysql->error;
		}
	}
	
	//config tambah/edit
	$form 	= "tambahbuku";
	$url 	= "tambahbuku.php";
	
	include 'views/v_form_book.php';
?>