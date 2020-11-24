<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        <link href="<?php echo base_url() ?>/media/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>/media/css/bootstrap-login.css" rel="stylesheet">
    
        <script type="text/javascript" src="<?php echo base_url() ?>/media/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/media/js/bootstrap.min.js"></script>
        <!-- Toastr Plugins -->
        <link href="<?php echo base_url()?>/media/plugins/toastr.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo base_url()?>/media/plugins/toastr.min.js"></script>
		<!-- Include Bootstrap Datepicker -->
		<link rel="stylesheet" href="<?php echo base_url() ?>/media/datepicker/css/bootstrap-datepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>/media/datepicker/css/bootstrap-datepicker3.min.css" />
		<script src="<?php echo base_url() ?>/media/datepicker/js/bootstrap-datepicker.min.js"></script>
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
            <h1 class="text-center no-mar"><b>Register Account</b></h1>
            <div class="row">
                <div class="col-lg-13">
                    <?php if (!empty($success)) { ?>
                            <div class="col-lg-12">
                                <div class="alert alert-success"><?php echo $success; ?></div>
                            </div>
                    <?php } ?>
                    <?php if(!empty($error)) { ?>
                            <div class="col-lg-12">
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            </div>
                    <?php } ?>
                    <form class="form-horizontal col-md-12 text-center well" method="post" action="register.php">
                        <fieldset>
                            <legend>Login Information</legend>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="user_login">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">@</span>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="user_password">Password</label>
                                    <input class="form-control" id="user_password" name="password1" size="30" type="password" />
                                </div>
                                <div class="col-sm-6">
                                    <label for="user_password_confirmation">Password confirmation</label>
                                    <input class="form-control" id="user_password_confirmation" name="password2" size="30" type="password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="user_email">Email</label>
                                    <input class="form-control required email" id="user_email" name="email" required="true" size="30" type="text" />
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Personal Information</legend>
                            <div class="form-group">
                                <div class="col-sm-4">    
                                    <label for="user_title">Motto</label>
                                    <input class="form-control" id="user_title" name="motto" size="30" type="text" />
                                </div>
                                <div class="col-sm-4">
                                    <label for="user_firstname">Nama Awal</label>
                                    <input class="form-control" id="user_firstname" name="firstname" size="30" type="text" />
                                </div>
                                <div class="col-sm-4">
                                    <label for="user_lastname">Nama Akhir</label>
                                    <input class="form-control" id="user_lastname" name="lastname" size="30" type="text" />
                                </div>
                            </div>
							<div class="form-group">
								<div class="col-sm-6 ">
									<label for="user_firstname">Jenis Kelamin</label>
									<select name="jenis_kelamin" id="single_select" class="form-control" required>
										<option value="laki-laki">Laki-Laki</option>
										<option value="perempuan">Perempuan</option>
									</select>
								</div>
								<div class="col-sm-6">
									<label>Tanggal Lahir</label>
									<input class="form-control" name="tanggal_lahir" value="" type="date"/>
								</div>
							</div>
                            <div class="form-group">
                                <div class="col-sm-3">    
                                    <label for="user_title">Website</label>
                                    <input class="form-control"name="website" size="30" type="text" />
                                </div>
								<div class="col-sm-3">
                                    <label for="user_firstname">Kota</label>
                                    <input class="form-control" name="kota" size="30" type="text" />
                                </div>
                                <div class="col-sm-6">
                                    <label for="user_firstname">Alamat</label>
                                    <input class="form-control" name="alamat" size="30" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">    
                                    <label for="user_title">Tentang Anda</label>
                                    <textarea class="form-control" name="about_you" size="30" type="text"></textarea>
                                </div>
                            </div>
                        </fieldset>
						<div class="form-group">
							<div class="col-sm-0">
								<input type="submit" name="submit" class="btn btn-primary" value="Join Now" required> 
							</div>
						</div>
						<!--
                        <fieldset>
                            <legend>Options</legend>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="user_locale">Language</label>
                                    <select class="form-control" id="user_locale" name="user[locale]"><option value="de" selected="selected">Deutsch</option>
                                        <option value="en">English</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
						-->
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>