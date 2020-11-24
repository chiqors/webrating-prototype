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
					<a class="navbar-brand" href="index.php"><img src="<?php echo base_url()?>/media/images/book-logo.png" width="30px" height="30px"></a>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
						<li class="active"><a href="browse.php">Books</a></li>
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
	<div class="container">
		<div class="row">
			<a href="tambahbuku.php" class="btn btn-primary">Tambah Buku</a>
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Novel</th>
						<th>Kategori</th>
						<th>Penulis</th>
						<th>Rating</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($sqlRow = $sqlResult->fetch_object()) { ?>
					
					<!-- Example Data Set -->
					<tr>
						<td><a href="book.php?bookid=<?php echo $sqlRow->id_book ?>"><?php echo $sqlRow->id_book ?></a></td>
						<td><?php echo $sqlRow->title_book ?></td>
						<td><?php echo $sqlRow->category_type ?></td>
						<td><?php echo $sqlRow->username ?></td>
						<td><?php echo $sqlRow->avg_rating ?></td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>