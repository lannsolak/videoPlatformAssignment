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
                            <?php $uri = $this->uri->segment(1); ?>
					    	<li class="<?php if($uri == ""){ echo "active"; } ?>">
								<a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span> </a>
							</li>
					        <li class="<?php if($uri == "about"){ echo "active"; } ?>">
                                <?php echo anchor("about", "About Us"); ?>
							</li>
							<li class="<?php if($uri == "contest"){ echo "active"; } ?>">
								<?php echo anchor("contest","Contest"); ?>
							</li>
                            <li class="dropdown <?php if($uri == "video"){ echo "active"; } ?>">
                                <?php echo anchor("video",'Browse Videos <span class="caret"></span>', 'class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"'); ?>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <?php echo anchor("#", "New videos"); ?>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <?php echo anchor("#", "Popular videos"); ?>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <?php echo anchor("#", "Videos in Contest"); ?>
                                    </li>
                                </ul>
                            </li>
							<li class="<?php if($uri == "contact"){ echo "active"; } ?>">
                                <?php echo anchor("contact", "Contact Us"); ?>
							</li>
					    </ul>
				    </div>
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
                <div class="col-sm-2" style="padding-top: 8px;">
                	<!-- Small modal -->
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Create an account</button>
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  	<div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="exampleModalLabel">
								    <div class="my-user">
										<?php echo anchor("user/show_register", "Register") ?>
										|
										<?php echo anchor("user/show_login", "Login") ?>
									</div>
								</h4>
						      </div>
						      	<div class="modal-body">
						        	<form>
						          		<div class="form-group">
								            <label for="recipient-name" class="control-label">Recipient:</label>
								            <input type="text" class="form-control" id="recipient-name">
							          	</div>
							          	<div class="form-group">
								            <label for="message-text" class="control-label">Message:</label>
								            <textarea class="form-control" id="message-text"></textarea>
							          	</div>
						        	</form>
						      	</div>
						      	<div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-primary">Send message</button>
						      	</div>
						    </div>
					  	</div>
					</div>
			  	</div>
            </div><!-- /.navbar-collapse -->
        </div>
	</nav>

	<script type="text/javascript">
		$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-title').text('New message to ' + recipient)
		  modal.find('.modal-body input').val(recipient)
		})
	</script>

