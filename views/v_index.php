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
		</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
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
						<li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
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
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
	      <!-- Indicators -->
	      <ol class="carousel-indicators">
	        <li data-target="#myCarousel0" data-slide-to="0" class="active"></li>
	        <li data-target="#myCarousel1" data-slide-to="1"></li>
	        <li data-target="#myCarousel2" data-slide-to="2"></li>
	      </ol>
	      <div class="carousel-inner" role="listbox">
	        <div class="item active">
	          <img class="first-slide" src="media/images/bg1.jpg" alt="First slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Book headline.</h1>
	              <p>Another BookReviewer is here.</p>
	              <p><a class="btn btn-lg btn-primary" href="register.php" role="button">Sign up today</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="second-slide" src="media/images/bg2.jpg" alt="Second slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Show the newest book.</h1>
	              <p>testing 123456 ok.</p>
	              <p><a class="btn btn-lg btn-primary" href="browse.php" role="button">Learn more</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="third-slide" src="media/images/bg3.jpg" alt="Third slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>More Features ?</h1>
	              <p>Alot of potential still in progress.</p>
	              <p><a class="btn btn-lg btn-primary" href="browse.php" role="button">Browse gallery</a></p>
	            </div>
	          </div>
	        </div>
	      </div>
	      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	      </a>
	      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	      </a>
    </div><!-- /.carousel -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">First feature.</h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">
		<!-- footer -->
	<footer role="contentinfo" class="site-footer navbar-fixed-bottom" id="colophon">
		<div class="container">
			<div class="row">
				<div id="accordion" class="collapse-footer">
					<div class="panel">
						<div class="panel-heading">
							<h4 class="panel-title"> <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="collapsed"><span class="glyphicon glyphicon-chevron-down"></span>FOOTER</a> </h4>
						</div>
						<div class="panel-collapse collapse" id="collapseOne" style="height: 0px;">
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<h5 class="title"><span>Main Navigation</span></h5>
										<div class="menu-main-menu-container">
											<ul class="nav nav-footer" id="menu-main-menu-1">
												<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-14 current_page_item menu-item-16"><a href="http://localhost/wpJoinRedHawk/">Home</a></li>
												<li><a href="#">About Us</a></li>
												<li><a href="#">Contact Us</a></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6">
										<h5 class="title"><span>Site map</span></h5>
										<div class="menu-footer-sitemap-container">
											<ul class="nav nav-footer" id="menu-footer-sitemap">
												<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-89" id="menu-item-89"><a href="#">About Us</a></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-3  col-sm-6">
										<h5 class="title"><span>Don't hesitate to contact us!</span></h5>
										<p> Please give us time to let <strong>Join ReviewerCommunity</strong> know about any problems or suggestions what you have.</p>
										<div class="clear"></div>
										<a class="btn btn-default btn-sm" href="#">Contact with us</a> </div>
									</div>
								<!-- Copyright -->
								<div class="copyright">
									<div class="container">
										<div class="row copyright-img">
											<div class="col-lg-4 col-sm-4"> BookRating </div>
											<div class="col-lg-7 col-sm-7 text-right" id="footertext"> Copyright ©2016 BookRating </div>
										</div>
									</div>
								</div>
								<!-- /Copyright -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		  
			</footer>
			<!-- /footer -->
	
	</body>
</html>