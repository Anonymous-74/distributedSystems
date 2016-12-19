<?php
	require_once 'include/auth.php';
	include 'include/db_conn.php';
	include_once 'include/core.dSystems.php';

	$obj = new dSystems  ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title>Home</title>

	<!-- css -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/base.css" rel="stylesheet">
	<link href="css/project.css" rel="stylesheet">

	<!-- favicon -->
	<!-- ... -->

	<style type="text/css">
		/*****************Home Ui******************/
		#gn > a{
		  text-decoration: none;
		}

		#uc,#uf{
		  text-decoration: none;
		  color: black;
		}

		#ufi{
		  text-decoration: none;
		  color: black;
		}

		#ufic{
		  text-decoration: none;
		  color: grey;
		}
		/*****************End of Home Ui******************/
	</style>
	
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
		<a class="header-logo header-affix-hide margin-left-no margin-right-no" data-offset-top="213" data-spy="affix" href="home.php">FAC Cloud Services</a>
		<span class="header-logo header-affix margin-left-no margin-right-no" data-offset-top="213" data-spy="affix">Home</span>
		<ul class="nav nav-list pull-right">
			<li class="dropdown margin-right">
				<a class="dropdown-toggle padding-left-no padding-right-no" data-toggle="dropdown">
					<p class="text-center">
						<span class="avatar avatar-inline avatar-md">
							<?php echo ucfirst($_SESSION['SESS_FIRST_NAME'][0]);?>
						</span>
					</p>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li>
						<a class="padding-right-lg waves-attach" href="profile.php">
							<span class="icon icon-lg margin-right">account_box</span>Profile Settings
						</a>
					</li>
					<li>
						<a class="padding-right-lg waves-attach" href="include/logout.php">
							<span class="icon icon-lg margin-right">exit_to_app</span>Logout
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</header>

	<nav aria-hidden="true" class="menu" id="ui_menu" tabindex="-1">
		<div class="menu-scroll">
			<div class="menu-top" style="height: 200px;">
				<div class="menu-top-img">
					<img alt="username" src="img/samples/landscape.jpg">
				</div>
			</div>
			<div class="menu-content">
				<ul class="nav">
					<li class="active">
						<a class="waves-attach" href="home.php">Home</a>
					</li>
					<li>
						<a class="waves-attach" href="#">Recent Files</a>
					</li>
					<li>
						<a class="waves-attach" href="#">Trash</a>
					</li>
					<hr>
					<li>
						<a class="waves-attach" href="#">Pictures</a>
						<a class="waves-attach" href="#">Music</a>
						<a class="waves-attach" href="#">Videos</a>
						<a class="waves-attach" href="#">Documents</a>
						<a class="waves-attach" href="#">Archives</a>
					</li>
					<hr>
					<li>
						<a class="waves-attach" href="profile.php">Settings</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	

	<main class="content">
		<div class="content-header ui-content-header hidden">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
						<h1 class="content-heading">Home</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="ui-card-wrap" id="page-content">
				<h3 class="content-heading">Categories</h3>
				<div class="row">
					<?php 
						$obj->user_categories($_SESSION['SESS_USER_ID'],$conn);
					?>
				</div>
			</div>	
		</div>
		<div class="container">
			<h3 class="content-heading">Folders</h3>
			<div class="row">
				<?php
					$obj->user_folders($_SESSION['SESS_USER_ID'],$conn);
				?>
			</div>
		</div>
		<div class="container">
			<h3 class="content-heading">Files</h3>
			<div class="row">
				<?php
					$obj->user_files($_SESSION['SESS_USER_ID'],$conn);
				?>
			</div>
		</div>
	</main>

	<footer class="ui-footer">
		<div class="container">
			<p>FAC Cloud Services</p>
		</div>
	</footer>
	<div class="fbtn-container">
		<div class="fbtn-inner">
			<a class="fbtn fbtn-lg fbtn-brand-accent waves-attach waves-circle waves-light waves-effect" data-toggle="dropdown">
				<span class="fbtn-text fbtn-text-left">Tasks</span><span class="fbtn-ori icon">apps</span>
				<span class="fbtn-sub icon">close</span>
			</a>

			<div class="fbtn-dropup">
				<a class="fbtn waves-attach waves-circle waves-effect" href="#categories" data-toggle="modal">
					<span class="fbtn-text fbtn-text-left">Add or Remove Category</span>
					<span class="icon">add</span>
				</a>
				<a class="fbtn fbtn-brand waves-attach waves-circle waves-light waves-effect" href="#newfolder" data-toggle="modal">
					<span class="fbtn-text fbtn-text-left">Create New Folder</span>
					<span class="icon">create_new_folder</span>
				</a>
				<a class="fbtn fbtn-green waves-attach waves-circle waves-effect" href="#upload" data-toggle="modal">
					<span class="fbtn-text fbtn-text-left">Upload File</span>
					<span class="icon">file_upload</span>
				</a>
			</div>
		</div>
	</div>

	<!--Modals-->
	<div aria-hidden="true" class="modal  fade" id="newfolder" role="dialog" tabindex="-1">
	    <div class="modal-dialog modal-xs">
	        <div class="modal-content">
				<form method="POST" action="include/new_folder.php">
					<div class="modal-heading">
						<p class="modal-title">Folder Name</p>
					</div>
					<div class="modal-inner">
						<div class="form-group form-group-label">
							<label class="floating-label" for="input-password">Name</label>
							<input class="form-control" id="folder-name" type="text" name="name">
						</div>
					</div>
					<div class="modal-footer">
						<p class="text-right">
							<a class="btn btn-flat btn-brand waves-attach waves-effect" data-dismiss="modal">Cancel</a>
							<button class="btn btn-flat btn-brand-accent waves-attach waves-effect" type="submit">Create</button>
						</p>
					</div>
				</form>
			</div>
	    </div>
	</div>
 
	<div aria-hidden="true" class="modal  fade" id="upload" role="dialog" tabindex="-1">
	    <div class="modal-dialog modal-xs">
	        <div class="modal-content">
				<form method="POST" action="#">
					<div class="modal-heading">
						<p class="modal-title">Upload File</p>
					</div>
					<div class="modal-inner">
						<div class="form-group form-group-label">
							<label class="floating-label" for="input-password">Loacation</label>
							<input class="form-control" id="folder-name" type="file" name="filename">
						</div>
					</div>
					<div class="modal-footer">
						<p class="text-right">
							<a class="btn btn-flat btn-brand waves-attach waves-effect" data-dismiss="modal">Cancel</a>
							<button class="btn btn-flat btn-brand-accent waves-attach waves-effect" type="submit">Upload</button>
						</p>
					</div>
				</form>
			</div>
	    </div>
	</div>

	<div aria-hidden="true" class="modal  fade" id="categories" role="dialog" tabindex="-1">
	    <div class="modal-dialog modal-xs">
	        <div class="modal-content">
				<form method="POST" action="include/categories.php">
					<div class="modal-heading">
						<p class="modal-title">Categories</p>
					</div>
					<div class="modal-inner">
						<?php $obj->add_user_categories($_SESSION['SESS_USER_ID'],$conn);?>
					</div>
					<div class="modal-footer">
						<p class="text-right">
							<a class="btn btn-flat btn-brand waves-attach waves-effect" data-dismiss="modal">Cancel</a>
							<button class="btn btn-flat btn-brand-accent waves-attach waves-effect" type="submit">Ok</button>
						</p>
					</div>
				</form>
			</div>
	    </div>
	</div>
	
	<!--Audio Player-->
		<div aria-hidden="true" class="modal modal-va-middle fade" id="audiotrack" role="dialog" tabindex="-1">
		    <div class="modal-dialog modal-xs">
		        <div class="modal-content">
		            <div class="modal-heading">
		            	<h2 class="modal-title"></h2>
		            </div>
		            <div class="modal-inner">
						<audio controls>
							<source src="" type="audio" />
							<a href="">Download</a>
						</audio>
		            </div>
		            <div class="modal-footer"></div>
		        </div>
		    </div>
		</div>

	<!--Image Viewer-->
		<div aria-hidden="true" class="modal fade" id="image" role="dialog" tabindex="-1">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-heading">
						<h2 class="modal-title"></h2>
					</div>
					<div class="modal-inner">
						
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>

	<!--Text Viewer-->
		<div aria-hidden="true" class="modal fade" id="description" role="dialog" tabindex="-1">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-heading">
						<h2 class="modal-title"></h2>
					</div>
					<div class="modal-inner">
						
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>

	<!--Video Player-->
		<div aria-hidden="true" class="modal fade" id="videocam" role="dialog" tabindex="-1">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-heading">
						<h2 class="modal-title"></h2>
					</div>
					<div class="modal-inner">
						
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>

	<!-- js -->
	<script src="js/jquery.min.js"></script>
	<script src="js/base.min.js"></script>
	<script src="js/project.min.js"></script>
	<script type="text/javascript">
		$('#audiotrack').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget);
		  var audio = button.data('whatever'); 
		  var name = button.data('name');
		  alert(audio);

		  var modal = $(this);
		  modal.find('.modal-title').text(name);
		  modal.find('source').attr("src",audio);
		  modal.find('a').attr("href",audio);
		});

		$('#image').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget);
		  var image = button.data('whatever'); 

		  alert(image);

		  //var modal = $(this)
		  //modal.find('.modal-title').text('New message to ' + recipient)
		  //modal.find('.modal-body input').val(recipient)
		});

		$('#videocam').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget);
		  var video = button.data('whatever'); 

		  alert(video);

		  //var modal = $(this)
		  //modal.find('.modal-title').text('New message to ' + recipient)
		  //modal.find('.modal-body input').val(recipient)
		});

		$('#description').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget);
		  var txt = button.data('whatever'); 

		  alert(txt);

		  //var modal = $(this)
		  //modal.find('.modal-title').text('New message to ' + recipient)
		  //modal.find('.modal-body input').val(recipient)
		});
	</script>
</body>
</html>