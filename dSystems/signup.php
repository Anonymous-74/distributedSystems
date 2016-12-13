<?php
	require_once 'include/sess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title>Sign Up</title>

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
				<div class="col-md-6 col-md-push-3 col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">
					<section class="content-inner">
						<div class="card">
							<div class="card-main">
								<div class="card-header">
									<div class="card-inner">
										<h1 class="card-heading">Sign Up</h1>
									</div>
								</div>
								<div class="card-inner">
									
									<form class="form" action="#" method="POST" id="login-card">
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="input-fullname">Fullname</label>
													<input class="form-control" id="input-fullname" type="text" required>
												</div>
											</div>
										</div>
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="input-username">Username</label>
													<input class="form-control" id="input-username" type="text" required>
												</div>
											</div>
										</div>
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="input-emailaddress">Email Address</label>
													<input class="form-control" id="input-emailaddress" type="email" required>
												</div>
											</div>
										</div>	
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="input-password">Password</label>
													<input class="form-control" id="input-password" type="password" required>
												</div>
											</div>
										</div>	
										<div class="form-group form-group-label">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<label class="floating-label" for="input-telegram-no">Telephone-No (+233)</label>
													<input class="form-control" id="input-telegram-no" type="tel" required> 
												</div>
											</div>
										</div>		
										<div class="form-group">
											<div class="row">
												<div class="col-md-10 col-md-push-1">
													<button class="btn btn-block btn-brand waves-attach waves-light">Sign Up</button>
												</div>
											</div>
										</div>
										
									</form>
								</div>
							</div>
						</div>
						<div class="clearfix">
							<p class="margin-no-top pull-left"><a class="btn btn-flat btn-brand waves-attach" href="javascript:void(0)">Need help?</a></p>
							<p class="margin-no-top pull-right">Already have an account<a class="btn btn-flat btn-brand waves-attach" href="index.php">Sign In</a>Here</p>
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
         
            var fullname=$('#input-fullname').val();
            var username=$('#input-username').val();
            var email=$('#input-emailaddress').val();
            var password=$('#input-password').val();
            var tel=$('#input-telegram-no').val();

            

            $.ajax({
              url:'include/signup.php',
              data:{fullname:fullname,username:username,email:email,password:password,tel:tel},
              success:function(data){
                if(data=="Query Successful"){
                	window.location.href = "home.php";
                }else{
                	alert(data);
                	$("body").snackbar({
			   			alive: 3000,
	    				content: '<a data-dismiss="snackbar">Dismiss</a><div class="snackbar-text">Could not Create Account!</div>'
			   		});

                }
              }
            });
        
            return false;
        });
	</script>
</body>
</html>