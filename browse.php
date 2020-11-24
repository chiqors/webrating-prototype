<?php
	include 'db/koneksi.php';
	$id_user = !empty($_SESSION['id_user'])?$_SESSION['id_user']:header('Location:index.php');
	$sql = "SELECT * FROM t_user WHERE t_user.id_user = '$id_user'";
	$data = $mysql->query($sql) or die($mysql->error);
	
	/*$sqlResult = $mysql->query("SELECT t_book.id_book, t_book.title_book, t_book.category_type, t_user.username, (select avg(t_rating.rating)from t_rating where t_rating.id_book = t_book.id_book ) as avg_rating
							   from t_book, t_rating, t_book_author, t_user 
							   where t_book.id_rating = t_rating.id_rating 
							   AND t_book.id_book_author = t_book_author.id_book_author 
							   AND t_book_author.id_user = t_user.id_user");
	*/
	$sqlResult = $mysql->query("SELECT t_book.id_book, t_book.title_book, t_book.category_type, t_user.username,
(select avg(t_rating.rating)from t_rating where t_rating.id_book = t_book.id_book) as avg_rating 
from t_book, t_book_author, t_user where t_book.id_book_author = t_book_author.id_book_author AND t_book_author.id_user = t_user.id_user");
	
	$sqlResult2 = $mysql->query("SELECT (select avg(t_rating.rating)from t_rating where t_rating.id_book = t_book.id_book) as avg_rating 
							   from t_book, t_rating, t_user 
							   where t_book.id_rating = t_rating.id_rating 
							   AND t_rating.id_user = t_user.id_user");
	
	
	
	//Tampilkan v_index
	include 'views/v_browse.php';
?>