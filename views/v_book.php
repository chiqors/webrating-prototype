<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Data Siswa</title>
		<link href="<?php echo base_url()?>/media/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>/media/css/bootstrap-login.css" rel="stylesheet">
	
		<script type="text/javascript" src="<?php echo base_url() ?>/media/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>/media/js/bootstrap.min.js"></script>
		<!-- Toastr Plugins -->
		<link href="<?php echo base_url()?>/media/plugins/toastr.min.css" rel="stylesheet"/>
		<script type="text/javascript" src="<?php echo base_url()?>/media/plugins/toastr.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">BookReviewing</a>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
						<li><a href="browse.php">Books</a></li>
						<li><a href="about.php">About</a></li>
					</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo $_SESSION['username']?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="profiles.php?userid=<?php echo $id_user?>">Profile</a></li>
							<li><a href="profile_editor.php?userid=<?php echo $id_user?>">Settings</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
					<?php } else { ?>
					<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign in <span class="caret"></span></a>
								<ul id="login-dp" class="dropdown-menu">
									<li>
										 <div class="row">
												<div class="col-md-12">
													 <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
														<?php if(!empty($error)) { ?>
															<label><?php echo $error; ?></label>
														<?php } ?>
															<div class="form-group">
																 <input type="text" class="form-control" placeholder="Username" name="username" required />
															</div>
															<div class="form-group">
																 <input type="password" class="form-control" placeholder="Password" name="password" required />
															</div>
															<div class="form-group">
																 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
															</div>
													 </form>
												</div>
												<div class="bottom text-center">
													New here ? <a href="register.php"><b>Join Us</b></a>
												</div>
										 </div>
									</li>
								</ul>
							</li>
					<?php } ?>
				  </ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
			<!-- Page Content -->
			<div class="container">
			<!-- Portfolio Item Heading -->
			<div class="row">
				<div class="col-lg-12">
					<?php $result = mysqli_fetch_object($query); ?>
					<h1 class="page-header"><?php echo $result->title_book ?>
                    <small><?php echo $result->category_type ?></small>
					</h1>
				</div>
			</div>
			<!-- /.row -->
			<!-- Portfolio Item Row -->
			<div class="row">
			    <div class="col-md-8">
			        <img class="img-responsive" src="http://placehold.it/750x500" alt="">
			    </div>
			    <div class="col-md-4">
					<!--!empty($_SESSION['id_user'])?$_SESSION['id_user']:"";-->
					<?php $total_rate = $result->avg_rating ?>
					<p><?php echo $total_rate ?></p>
					<h3>Book Description</h3>
					<p><?php echo $result->description_book ?></p>
					<h3>Book Features</h3>
					<p><?php echo $result->features_book ?></p>
					<h3>Book Release</h3>
					<?php $date = $result->release_date; $newdate = date("d F Y", strtotime($date)) ?>
					<p><?php echo $newdate ?></p>
					<p>Release by : <?php echo $result->username ?></p>
					<?php $author = $result->username ?>
					<?php if($author == $username) { ?>
					<a href="editbuku.php?bookid=<?php echo $bookid ?>" class="btn btn-primary">Edit Buku</a>
					<?php } ?>
				</div>
			</div>
			<hr>
			<?php
				$rate = $data3->num_rows!=0?$result4->rating:"";
				$komen = $data3->num_rows!=0?$result4->isi_comment:"";
			?>
			<form method="post" action="book.php?bookid=<?php echo $bookid?>">
				<table class="table table-striped">
					<tr>
						<td>Vote</td>
						<td><input type="text" name="rating" class="form-control" value="<?php echo $rate ?>" /></td>
					</tr>
					<tr>
						<td>Comment</td>
						<td><textarea class="form-control" name="comment"><?php echo $komen ?></textarea></td>
					</tr>
					<tr>
						<td><button type="submit" class="btn btn-primary" name="submit" value="Vote">Komentar</button></td>
					</tr>
				</table>
			</form>
			<?php while($result3 = mysqli_fetch_object($data2)) { ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong><a href="profiles.php?userid=<?php echo $result3->id_user?>"><?php echo $result3->username ?> - (<?php echo $result3->nama_user ?>)</a></strong><span class="pull-right"><?php echo $result3->rating ?></span>
						</div>
						<div class="panel-body">
							<p><?php echo $result3->isi_comment ?></p>
						</div><!-- /panel-body -->
					</div><!-- /panel panel-default -->
				</div><!-- /col-sm-5 -->
			</div>
			<?php } ?>
			<!-- Footer -->
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<p>Copyright &copy; BookRating 2014</p>
					</div>
				</div>
				<!-- /.row -->
			</footer>
		</div>
		<!-- /.container -->
	</body>
</html>