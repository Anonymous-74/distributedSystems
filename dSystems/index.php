<?php
	require_once 'include/sess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title>Login</title>

	<!-- css -->
	<link href="css/base.min.css" rel="stylesheet">
	<link href="css/project.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<!-- favicon -->
	<!-- ... -->
</head>
<body class="page-brand">
	<header class="header header-brand ui-header">
		<span class="header-logo">FAC Cloud Services</span>
	</header>
	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-push-4 col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">
					<section class="content-inner">
						<div class="card">
							<div class="card-main">
								<div class="card-header">
									<div class="card-inner">
										<h1 class="card-heading">Login</h1>
									</div>
								</div>
								<div class="card-inner">
									
									<form class="form" action="#" method="POST" id="login-card">
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="input-username">Username</label>
													<input class="form-control" id="input-username" type="text">
												</div>
											</div>
										</div>
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="input-password">Password</label>
													<input class="form-control" id="input-password" type="password">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<button class="btn btn-block btn-brand waves-attach waves-light">Sign In</button>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<div class="checkbox checkbox-adv">
														<label for="ui_login_remember">
															<input class="access-hide" id="ui_login_remember" name="ui_login_remember" type="checkbox">Stay signed in
															<span class="checkbox-circle"></span><span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
														</label>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="clearfix">
							<p class="margin-no-top pull-left"><a class="btn btn-flat btn-brand waves-attach" href="javascript:void(0)">Need help?</a></p>
							<p class="margin-no-top pull-right"><a class="btn btn-flat btn-brand waves-attach" href="signup.php">Create an account</a></p>
						</div>
					</section>
				</div>
			</div>
		</div>
	</main>
	<footer class="ui-footer">
		<div class="container">
			<p>FAC Cloud Services</p>
		</div>
	</footer>


	
	<!-- js -->
	<script src="js/jquery.min.js"></script>
	<script src="js/base.min.js"></script>
	<script src="js/project.min.js"></script>
	<script type="text/javascript">
		$('#login-card').submit(function(){
         
            var username=$('#input-username').val();
            var password=$('#input-password').val();


            $.ajax({
              url:'include/login.php',
              data:{username:username,password:password},
              success:function(data){
                if(data=="Query Successful"){
                	window.location.href = "home.php";
                }else{
                	$("body").snackbar({
			   			alive: 3000,
	    				content: '<a data-dismiss="snackbar">Dismiss</a><div class="snackbar-text">Wrong Username or Password!</div>'
			   		});

                }
              }
            });
        
            return false;
        });
	</script>
</body>
</html>