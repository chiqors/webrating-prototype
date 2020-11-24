<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Data Siswa</title>
		<link href="<?php echo base_url()?>/media/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>/media/css/bootstrap-login.css" rel="stylesheet">
		<link href="<?php echo base_url()?>/media/css/bootstrap-profile.css" rel="stylesheet">
		<link href="<?php echo base_url()?>/media/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
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
			<div class="row well">
				<div class="col-md-2">
					<?php if(($_SESSION['id_user']) == "$id_user") { ?>
					<ul class="nav nav-pills nav-stacked well">
						<li class="active"><a href="profiles.php?userid=<?php echo $id_user ?>"><i class="fa fa-user"></i> Profile</a></li>
						<li><a href="profile_editor.php?userid=<?php echo $id_user ?>"><i class="fa fa-key"></i> Settings</a></li>
					</ul>
					<?php } else { ?>
					<ul class="nav nav-pills nav-stacked well">
						<li><a href="profiles.php?userid=<?php echo $id_user ?>"><i class="fa fa-user"></i> Profile</a></li>
					</ul>
					<?php } ?>
				</div>
				<div class="col-md-10">
					<div class="panel">
						<img class="pic img-circle" src="<?php echo base_url()?>/media/images/guest.png" alt="...">
						<div class="name"><small><?php echo $nama_user ?></small></div>
					</div>
					<br><br><br>
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> About</a></li>
						<li><a href="#review" data-toggle="tab"><i class="fa fa-reply-all"></i>Review</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active in" id="about">
							<h4>Profile Information</h4>
							<p><strong>Name: </strong> <?php echo $nama_user ?> </p>
							<p><strong>Username: </strong> <?php echo $username ?> </p>
							<p><strong>Gender: </strong> <?php echo $jenis_kelamin ?> </p>
							<p><strong>Level: </strong> <?php echo $usertype ?> </p>
							<p><strong>Birthday: </strong> <?php echo $tanggal_lahir ?> </p>
							<p><strong>Kota: </strong> <?php echo $kota ?> </p>
							<p><strong>Alamat: </strong> <?php echo $alamat ?> </p>
							<p><strong>About Me: </strong> <?php echo $about_you ?> </p>
						</div>
						<div class="tab-pane fade" id="review">
							<form class="form-horizontal col-md-12 text-center well" id="tab">
								<fieldset>
									<table class="table table-hover table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Books</th>
												<th>Category</th>
												<th>Author</th>
												<th>Reviewing</th>
											</tr>
										</thead>
									<?php
										$isi = mysqli_fetch_object($data5);	
									?>
									<?php while ($row = mysqli_fetch_object($data6)) { ?>
										<tbody>
											<tr>
												<th><?php echo $row->id_book?></th>
												<th><a href="book.php?bookid=<?php echo $row->id_book ?>"><?php echo $row->title_book?></a></th>
												<th><?php echo $row->category_type ?></th>
												<th><?php
												echo $isi->username
												?></th>
												<th><?php echo $row->rating?></th>
											</tr>
										</tbody>
									<?php } ?>
									</table>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</body>
</html>