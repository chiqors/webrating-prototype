<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="<?php echo base_url() ?>/media/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/media/css/bootstrap-login.css" rel="stylesheet">
    
        <script type="text/javascript" src="<?php echo base_url() ?>/media/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/media/js/bootstrap.min.js"></script>
        <!-- Toastr Plugins -->
        <link href="<?php echo base_url()?>/media/plugins/toastr.min.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo base_url()?>/media/plugins/toastr.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center no-mar"><b>Login</b></h1>
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
                    <form class="form-horizontal col-md-12 text-center well" method="post" action="login.php">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-3">
                                <input type="text" name="username" class="form-control" value="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-3">
                                <input type="password" name="password" class="form-control" value="" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <input type="submit" name="update" class="btn btn-primary" value="Login" required><br>
                                <br>Don't have an account ? <a href="register.php"><i class="glyphicon glyphicon-plus-sign">Register</i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>