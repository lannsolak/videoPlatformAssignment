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
                <div id="pri-menu" class="col-sm-6">
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					    <ul class="nav navbar-nav">
					    	<li class="active">
								<a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span> </a>
							</li>
					        <li>
								<a href="<?php echo base_url(); ?>">About Us</a>
							</li>
							<li class="dropdown">
								<?php echo anchor("contest",'Contests <span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"'); ?>
								<ul class="dropdown-menu" role="menu">
						            <li><a href="#">Action</a></li>
						            <li><a href="#">Another action</a></li>
						            <li><a href="#">Something else here</a></li>
						            <li class="divider"></li>
						            <li><a href="#">Separated link</a></li>
						            <li class="divider"></li>
						            <li><a href="#">One more separated link</a></li>
					          	</ul>
							</li>
							<li>
								<?php echo anchor("video","Browse Videos"); ?>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>">Contact Us</a>
							</li>
					    </ul>
				    </div>
                </div>
                <div class="col-sm-2" style="padding-top: 15px;">
					<?php 
						if($this->session->userdata('id')){
							echo anchor(
								'#', 
								'Welcome: ' . $this->session->userdata('name') . nbs().'<span class="caret" ></span>',
								'class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #fff;"'
								);
					?>
							<ul class="dropdown-menu" role="menu">
					            <li><a href="#">View Profile</a></li>
					            <li class="divider"></li>
					            <li><?php echo anchor("user/logout", "Logout"); ?></li>
				          	</ul>
				     <?php     	
						}else{
							echo anchor("user/show_register", "Register", 'class="btn btn-primary btn-sm"');
							echo nbs(3);
							echo anchor("user/show_login", "Login", 'class="btn btn-primary btn-sm"'); 
						}
					?>
			  	</div>
                <div class="col-sm-2" style="padding-top: 8px;">
                    <div class="input-group row">
                        <input class="form-control" type="text">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                </div>
            </div><!-- /.navbar-collapse -->
        </div>
	</nav>

