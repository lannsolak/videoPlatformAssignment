<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CORV - <?php echo ucfirst($this->uri->segment(1)); ?></title>

        <!-- Bootstrap Core CSS -->
	    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom CSS -->
	    <link href="<?php echo base_url(); ?>/assets/css/homepage.css" rel="stylesheet">

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>
<body>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header col-sm-2">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">CORP <?php // echo img("assets/img/covp-logo.png"); ?></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
                <div class="col-sm-7">
                    <center>
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span> </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>">About Us</a>
                            </li>
                            <li>
                                <?php echo anchor("contest","Contests"); ?>
                            </li>
                            <li>
                                <?php echo anchor("video","Browse Videos"); ?>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>">Contact Us</a>
                            </li>
                        </ul>
                    </center>
                </div>
                <div class="col-sm-3">
                    <div class="input-group row">
                        <input class="form-control" type="text">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
</nav>

