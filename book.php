<?php
    include "db/koneksi.php";
	if($_SERVER['QUERY_STRING'] == "") {
		header('Location: browse.php');
	} else {
		$id_user = $_SESSION['id_user'];
		$bookid = $_GET['bookid'];
	}
	
	$sql5 = "select t_rating.id_rating, t_rating.rating from t_rating where t_rating.id_book = $bookid";
	$query5 = $mysql->query($sql5);
	$result5 = mysqli_fetch_object($query5);
	$check_rating = $result5->rating;
	
    if($check_rating == null) {
        $sql = "select t_book.title_book, t_book.category_type, t_user.username, t_book.description_book, t_book.features_book, t_book.release_date 
				from t_book, t_user, t_book_author
				where t_book.id_book_author = t_book_author.id_book_author
				and t_book.id_book = $bookid";
        $query 	= $mysql->query($sql);
	} else {
        $sql = "select t_book.title_book, t_book.category_type, (select avg(t_rating.rating) from t_rating where t_rating.id_book = t_book.id_book) as avg_rating, t_user.username, t_book.description_book, t_book.features_book, t_book.release_date 
				from t_book, t_rating, t_user 
				where t_book.id_rating = t_rating.id_rating 
				and t_rating.id_user = t_user.id_user 
				and t_book.id_book = $bookid";
        $query 	= $mysql->query($sql);
	}
	
	// Verifying if the author come to his book, the edit button will show up
	$sql2 = "SELECT * FROM t_user WHERE t_user.id_user = '$id_user'";
	$data = $mysql->query($sql2) or die($mysql->error);
	$result2 = mysqli_fetch_object($data);
	$username = $result2->username;
	
	// Comment Show System
	$sql3 = "SELECT DISTINCT t_comment.id_comment, t_comment.id_book, t_user.username, t_user.nama_user, t_comment.isi_comment, t_rating.rating
			from t_comment, t_user, t_rating
			where t_comment.id_user = t_user.id_user
			and t_rating.id_book = t_comment.id_book
			and t_rating.id_book = $bookid
			and t_rating.rating != 0";
	$data2 = $mysql->query($sql3) or die($mysql->error);
	
	//Show input vote if exist
	$sql4 = "select isi_comment, t_rating.rating, t_user.username
			from t_comment, t_user , t_rating
			where t_comment.id_book = $bookid
			and t_comment.id_user = $id_user
			and t_comment.id_user = t_user.id_user
			and t_rating.id_user = t_user.id_user
			and t_rating.id_book = t_comment.id_book";
			
	$data3 = $mysql->query($sql4) or die($mysql->error);
	$result4 = mysqli_fetch_object($data3);
	
	if(isset($_POST['submit'])) {
		$ratebook = $_POST['rating'];
		$comment = $_POST['comment'];
			
		$sql6 = "INSERT INTO t_rating(id_rating,rating,id_user,id_book) 
				VALUES ('','$ratebook','$id_user','$bookid')";
		$sql7 = "INSERT INTO t_comment(id_comment,isi_comment,id_user,id_book)
				VALUES ('','$comment','$id_user','$bookid')";
		$query6 = $mysql->query($sql6) or die($mysql->error);
		$query7 = $mysql->query($sql7) or die($mysql->error);
		header('Location: book.php?bookid=' . $bookid);
	}
	
	
    include "views/v_book.php";
?>