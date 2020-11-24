<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" href="<?php echo base_url()?>/media/css/bootstrap.min.css">
		<link href="<?php echo base_url()?>/media/css/bootstrap-login.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url()?>/media/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>/media/css/bootstrap-footer.css">
		<link rel="stylesheet" href="<?php echo base_url()?>/media/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/media/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/media/css/style.css">
		
		<script type="text/javascript" src="<?php echo base_url()?>/media/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>/media/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>/media/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url()?>/media/js/respond.min.js"></script>
	<script type="text/javascript">
	$(function(){

		var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

		  $('a[data-modal-id]').click(function(e) {
		    e.preventDefault();
		    $("body").append(appendthis);
		    $(".modal-overlay").fadeTo(500, 0.7);
		    //$(".js-modalbox").fadeIn(500);
		    var modalBox = $(this).attr('data-modal-id');
		    $('#'+modalBox).fadeIn($(this).data());
		  });  
		  
		  
		$(".js-modal-close, .modal-overlay").click(function() {
		  $(".modal-box, .modal-overlay").fadeOut(500, function() {
		    $(".modal-overlay").remove();
		  });
		});
		 
		$(window).resize(function() {
		  $(".modal-box").css({
		    top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
		    left: ($(window).width() - $(".modal-box").outerWidth()) / 2
		  });
		});
		 
		$(window).resize();
		 
		});
	</script>
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
					<li><a href="browse.php">Books</a></li>
					<li class="active"><a href="about.php">About</a></li>
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
			  </ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<form>
		<div class="item">
		<a class="js-open-modal" href="#" data-modal-id="popup"><img src="images/ketiga.jpg" class="gamar1"><p>1. lorem ipsum dolor si jamet lorem ipsum dolor si jamet
			<br>lorem ipsum dolor si jamet lorem ipsum dolor si jamet</p></a>
		</div>
		<div id="popup" class="modal-box"> 
		<header>
		<a href="#" class="js-modal-close close">×</a>
		<h3>Motor Pertama</h3>
		</header>
		<div class="modal-body">
		<img src="images/ketiga.jpg" class="gamar" id="gambar1">
		<p>1. lorem ipsum dolor si jamet lorem ipsum dolor si jamet lorem ipsum dolor si jamet lorem ipsum dolor si jamet <br> lorem ipsum dolor si jamet lorem ipsum dolor si jamet lorem ipsum dolor si jamet<a href="#"> Lihat Selengkapnya ....</a></p>
		</div>
		<footer>
		</footer>
		</div>

		<div class="item2">
		<a class="js-open-modal" href="#" data-modal-id="popup"><img src="images/keempat.jpg" class="gamar1"><p>2. lorem ipsum dolor si jamet lorem ipsum dolor si jamet
			<br>lorem ipsum dolor si jamet lorem ipsum dolor si jamet</p></a>
		</div>
		<div id="popup" class="modal-box"> 
		<header>
		<a href="#" class="js-modal-close close">×</a>
		<h3>Motor Kedua</h3>
		</header>
		<div class="modal-body">
		<img src="images/keempat.jpg" class="gamar" id="gambar2">
		<p>2. lorem ipsum dolor si jamet lorem ipsum dolor si jamet lorem ipsum dolor si jamet lorem ipsum dolor si jamet 
			<br> lorem ipsum dolor si jamet lorem ipsum dolor si jamet lorem ipsum dolor si jamet<a href="#"> Lihat Selengkapnya ....</a></p>
		</div>
		<hr>
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; BookRating 2014</p>
				</div>
			</div>
			<!-- /.row -->
		</footer>
		</div>
		<div class="item1">
			<img src="images/kelima.jpg" class="gamar4"><p class="facc"><a href="">Facebook</a></p>
			<img src="images/kelima.jpg" class="gamar3"><p class="twii"><a href="">Twitter</a></p>
		</div>
	</form>
</body>
</html>