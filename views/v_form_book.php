<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tambah Buku | BookReview</title>
	
		<link href="<?php echo base_url()?>/media/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>/media/css/bootstrap-login.css" rel="stylesheet">
	
		<script type="text/javascript" src="<?php echo base_url() ?>/media/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>/media/js/bootstrap.min.js"></script>
		<!-- Toastr Plugins -->
		<link href="<?php echo base_url()?>/media/plugins/toastr.min.css" rel="stylesheet"/>
		<script type="text/javascript" src="<?php echo base_url()?>/media/plugins/toastr.min.js"></script>
		<!-- Fonts -->
		<link href="./assets/style.css" rel="stylesheet" type="text/css">
	
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body cz-shortcut-listen="true">
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

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
			<?php if (!empty($success)) { ?>
					<div class="col-lg-12">
						<div class="alert alert-success"><?php echo $success; ?></div>
					</div>
			<?php }?>

			<?php if(!empty($error)) { ?>
					<div class="col-lg-12">
						<div class="alert alert-danger"><?php echo $error; ?></div>
					</div>
			<?php }?>
				<?php if ($form == "tambahbuku") { ?>
				<a href="browse.php" class="btn btn-info">Kembali</a><br /><br />
				<?php } else { ?>
				<a href="book.php?bookid=<?php echo $bookid ?>" class="btn btn-info">Kembali</a><br /><br />
				<?php } ?>
				<form class="form-horizontal" action="<?php echo $url?>" method="POST">
					<div class="form-group">
						<label class="control-label col-sm-2">Judul Buku</label>
						<div class="col-sm-6">
							<input type="text" name="title_book" value="<?php echo @$result->title_book?>" class="form-control" />
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-2">Kategori Buku</label>
						<div class="col-sm-3">
							<select name="category_type" value="<?php echo @$result->category_type?>" class="form-control">
								<option value="Romantis">Romantis</option>
								<option value="Horror">Horror</option>
                                <option value="Misteri">Misteri</option>
                                <option value="Komedi">Komedi</option>
                                <option value="Inspiratif">Inspiratif</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-2">Fitur Buku</label>
                        <div class="col-sm-6">
                        <input type="text" name="features_book" value="<?php echo @$result->features_book?>" class="form-control" />
                        </div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-2">Deskripsi Buku</label>
                        <div class="col-sm-6">
						<textarea name="description_book" class="form-control"><?php echo @$result->description_book?></textarea>
                        </div>
					</div>
					
					 <div class="form-group">
						<label class="control-label col-sm-2">Release Buku</label>
                        <div class="col-sm-6">
                        <input class="form-control" name="release_date" value="<?php echo @$result->release_date?>" type="date"/>
                        </div>
					</div>
					<?php if ($form == "editbuku") { ?>
					<div class="form-group">
						<label class="control-label col-sm-2">Author</label>
                        <div class="col-sm-6">
                        <input class="form-control" name="Author" value="<?php echo @$username?>" type="text" readonly />
                        </div>
					</div>
					<?php } ?>
					
					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-2">
							<?php if ($form == "tambahbuku") {?>
							<input type="submit" value="Simpan" class="btn btn-success" />
							<?php } else { ?>
							<input type="submit" value="Change" class="btn btn-warning" />
							<?php } ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>