<?php
	session_start();
	include 'include/core.dSystems.php';
	$obj = new dSystems();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title>Project Name</title>

	<!-- css -->
	<link href="css/base.min.css" rel="stylesheet">
	<link href="css/project.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<!-- favicon -->
	<!-- ... -->
</head>
<body class="page-brand">
	<header class="header header-transparent header-waterfall ui-header">
		<ul class="nav nav-list pull-left">
			<li>
				<a data-toggle="menu" href="#ui_menu">
					<span class="icon icon-lg">menu</span>
				</a>
			</li>
		</ul>
		<a class="header-logo header-affix-hide margin-left-no margin-right-no" data-offset-top="213" data-spy="affix" href="index.php">Group Name</a>
		<?php
			if (!empty($_SESSION['name'])) {
				?>
				<span class="header-logo header-affix margin-left-no margin-right-no" data-offset-top="213" data-spy="affix">Snackbars</span>
				<ul class="nav nav-list pull-right">
					<li class="dropdown margin-right">
						<a class="dropdown-toggle padding-left-no padding-right-no" data-toggle="dropdown">
							<span class="access-hide"><?php echo $_SESSION['name'];?></span>
							<span class="avatar avatar-inline avatar-md"><?php echo ucfirst($_SESSION['name'][0]);?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li>
								<a class="padding-right-lg waves-attach" href="include/logout.php">
									<span class="icon icon-lg margin-right">exit_to_app</span>Leave
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<?php
			}
		?>
	</header>
	<nav aria-hidden="true" class="menu" id="ui_menu" tabindex="-1">
		<div class="menu-scroll">
			<div class="menu-content">
				<a class="menu-logo" href="index.html">Group Name</a>
				<ul class="nav">
					<li>
						<a class="waves-attach" data-toggle="collapse" href="#appMenu">Tasks</a>
						<ul class="menu-collapse collapse in" id="appMenu">
							<li>
								<a class="waves-attach" href="index.php">Home</a>
							</li>
							<li class="active">
								<a class="waves-attach" href="chat.php">Chat with Bot</a>
							</li>
							<li>
								<a class="waves-attach" href="#">Voice chat with Bot</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<main class="content">
		<div class="content-header ui-content-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
						<h1 class="content-heading">Project Name</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
					<?php 
						//Check if  session is set and not empty
						if(isset($_GET) && !empty($_GET['name']) || isset($_SESSION['name'])){
								if (empty($_SESSION['name'])) {
									$_SESSION['name']=$_GET['name'];//assign username to session variable
								}
					?>
						<section class="content-inner margin-top-no">
							<div class="card">
								<div class="card-main">
									<div class="card-inner">
										<p><?php echo "Hello ".ucwords($_SESSION['name'])."!";?></p>

										<div class="panel-body" style="height: 200px;max-height: 200px;overflow-y: scroll;" id="msg_area">
						                    <ul class="chat" id="messages">
						                       
						                    </ul>
						                </div>
										<form>
											<div class="form-group form-group-label">
											    <label class="floating-label" for="input-msg">Message</label>
											    <input class="form-control" id="input-msg" type="text" autocomplete="off">
											</div>
										</form>
									</div>
								</div>
							</div>
						</section>
					<?php
						}else{
					?>
					<!--Display this if user has not entered name-->
						<section class="content-inner margin-top-no">
							<div class="card">
								<div class="card-main">
									<div class="card-inner">
										<p>Text Goes Here</p>
									</div>
								</div>
							</div>
						</section>
						<div class="card">
							<div class="card-main">
								<div class="card-inner">
									<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="form-group form-group-label">
											<label class="floating-label" for="name">What's your name?</label>
											<input class="form-control" id="name" type="text" name="name" autocomplete="off"><br>
											<button class="btn btn-block btn-brand waves-attach waves-light waves-effect" type="submit" id="submit">Next</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</main>
	<footer class="ui-footer">
		<div class="container">
			<p id="#gn"><a data-toggle="modal" href="#groupModal">Group Name</a></p>
		</div>
	</footer>
	<div class="fbtn-container">
		<div class="fbtn-inner">
			<a class="fbtn fbtn-lg fbtn-brand-accent waves-attach waves-circle waves-light" data-toggle="dropdown">
				<span class="fbtn-text fbtn-text-left">Tasks</span>
				<span class="fbtn-ori icon">apps</span>
				<span class="fbtn-sub icon">close</span></a>
			<div class="fbtn-dropup">
				<a class="fbtn waves-attach waves-circle" href="chat.php">
					<span class="fbtn-text fbtn-text-left">Chat with Bot</span>
					<span class="icon">chat</span>
				</a>
				<a class="fbtn fbtn-brand waves-attach waves-circle waves-light" href="#">
					<span class="fbtn-text fbtn-text-left">Voice chat with Bot</span>
					<span class="icon">face</span>
				</a>
				<a class="fbtn fbtn-green waves-attach waves-circle" href="index.php">
					<span class="fbtn-text fbtn-text-left">Home</span>
					<span class="icon">home</span>
				</a>
			</div>
		</div>
	</div>

	<!--About Group Modal-->
	<div aria-hidden="true" class="modal fade" id="groupModal" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-xs">
			<div class="modal-content">
				<div class="modal-heading">
					<a class="modal-close" data-dismiss="modal">×</a>
					<h2 class="modal-title">Group Name</h2>
				</div>
				<div class="modal-inner">
					<div class="text-center">
						<p>Asare Nana Nyarko 214CS01001261</p>
						<p>Kalley Clement 215EI0100</p>
						<p>Adam Farid 214IT01001738</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	
	

	<!-- js -->
	<script src="js/jquery.min.js"></script>
	<script src="js/base.min.js"></script>
	<script type="text/javascript">
		
		$('#submit').click(function(){
		   if($.trim($('#name').val()) == ''){
		   		$("body").snackbar({
		   			alive: 3000,
    				content: '<a data-dismiss="snackbar">Dismiss</a><div class="snackbar-text">Please enter your name!</div>'
		   		});
		      	return false;
		   }
		});

		
	</script>
</body>
</html>