<?php 
	include 'db/koneksi.php';
	cekLogin();
	$id_user = $_SESSION['id_user'];
	
	$bookid = $_GET['bookid'];
	if (!empty($bookid)) {
		$sql 	= "SELECT * FROM t_book WHERE id_book = $bookid";
		$query 	= $mysql->query($sql);
		$result = mysqli_fetch_object($query);
	} else {
		header('Location: browse.php');
	}

	$sql5 = "SELECT t_book.id_book_author FROM t_book";
	$data5 = $mysql->query($sql5) or die($mysql->error);
	$result5 = mysqli_fetch_object($data5);
	$check_author = $result5->id_book_author;
	
	if(empty($check_author)) {
		//isi author buku jika tidak ada
		$sql4 = "INSERT INTO t_book_author(id_book_author,id_book,id_user) VALUES ('','$bookid','$id_user')";
		$data4 = $mysql->query($sql4) or die($mysql->error);
		
		//ambil data author saat ini
		$sql3 = "SELECT t_book_author.id_book_author, t_user.username FROM t_book, t_user, t_book_author WHERE t_book_author.id_user = $id_user AND t_book_author.id_user = t_user.id_user AND t_book_author.id_book_author = t_book.id_book_author";
		$data3 = $mysql->query($sql3) or die($mysql->error);
		$result3 = mysqli_fetch_object($data3);
		$id_book_author = $result3->id_book_author;
		$username = $result3->username;
	} else {
		//ambil data author saat ini
		$sql3 = "SELECT t_book_author.id_book_author, t_user.username FROM t_book, t_user, t_book_author WHERE t_book_author.id_user = $id_user AND t_book_author.id_user = t_user.id_user AND t_book_author.id_book_author = t_book.id_book_author";
		$data3 = $mysql->query($sql3) or die($mysql->error);
		$result3 = mysqli_fetch_object($data3);
		$id_book_author = $result3->id_book_author;
		$username = $result3->username;
	}
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$id_book = $bookid;
		$title_book 	= $_POST['title_book'];
		$category_type  = $_POST['category_type'];
        $features_book 	= $_POST['features_book'];
		$description_book	= $_POST['description_book'];
		$release_date       = $_POST['release_date'];
		
		$sql2 = "UPDATE t_book SET title_book = '$title_book',category_type = '$category_type',features_book = '$features_book',description_book = '$description_book', id_book_author = '$id_book_author' ,release_date = '$release_date'
				WHERE id_book = '$id_book'";

		if ($mysql->query($sql2)) {
			$success = "DATA BERHASIL DIEDIT";
		} else {
			$error = "Error.".$mysql->error;
		}
		header('location:editbuku.php?bookid=' . $bookid);
	}
	
	//config tambah/edit
	$form 	= "editbuku";
	$url 	= "editbuku.php?bookid=$bookid";
	
	include 'views/v_form_book.php';
 ?>