<?php
	/**
	* 
	*/

	class dSystems 
	{
		//Function to sanitize values received from the form. Prevents SQL injection
			function clean($conn,$str) {
				$str = @trim($str);
				if(get_magic_quotes_gpc()) {
					$str = stripslashes($str);
				}
				return mysqli_real_escape_string($conn,$str);
			}

		//Function to check for user set categories
			function user_categories($userid,$conn){
				$query="SELECT * FROM `categories` WHERE `idu`='$userid'";
				$result=mysqli_query($conn, $query);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);
						$row_value = array_values($row);
						$row_name = array_keys($row);
						
						for ($i=2; $i < sizeof($row); $i++) { 
							switch ($row_value[$i]) {
						        case 1:
						        	switch ($row_name[$i]) {
						        		case 'Pictures':
						        			$icon = "camera_alt";
						        			break;
						        		case 'Music':
						        			$icon = "library_music";
						        			break;
						        		case 'Videos':
						        			$icon = "videocam";
						        			break;
						        		case 'Documents':
						        			$icon = "description";
						        			break;
						        		case 'Archives':
						        			$icon = "archive";
						        			break;
						        		default:
						        			$icon = "";
						        			break;
						        	}
						            printf('
						            	<div class="col-lg-3 col-md-3 col-sm-6">
											<div class="card">
												<aside class="card-side pull-left">
													<i class="icon icon-3x text-center">'.$icon.'</i>
												</aside>
												<div class="card-main">
													<div class="card-inner">
														<p class="">'.$row_name[$i].'</p>
													</div>
													<div class="card-action">
														<div class="card-action-btn pull-left">
															<a class="btn btn-flat waves-attach waves-effect" href="dir.php?type='.strtolower($row_name[$i]).'">
																View
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>'
									);
						        break ;
						        default:
									
								break;
						    }
						}
					}else{

					}
				}else{
					
				}
			}

		//Fuction to add or remove user set categories
			function add_user_categories($userid,$conn){
				$query="SELECT * FROM `categories` WHERE `idu`='$userid'";
				$result=mysqli_query($conn, $query);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);
						$row_value = array_values($row);
						$row_name = array_keys($row);
						
						for ($i=2; $i < sizeof($row); $i++) { 
							switch ($row_value[$i]) {
						        case 1:
						            printf('
						            	<div class="form-group">
											<div class="checkbox checkbox-adv">
												<label for="ui_checkbox_'.$i.'">
													<input checked class="access-hide" id="ui_checkbox_'.$i.'" name="'.$row_name[$i].'" type="checkbox" value="1">'.$row_name[$i].'
													<span class="checkbox-circle"></span>
													<span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
												</label>
											</div>
										</div>
									');
						        break ;
						        default:
									printf('
						            	<div class="form-group">
											<div class="checkbox checkbox-adv">
												<label for="ui_checkbox_'.$i.'">
													<input class="access-hide" id="ui_checkbox_'.$i.'" name="'.$row_name[$i].'" type="checkbox" value="1">'.$row_name[$i].'
													<span class="checkbox-circle"></span>
													<span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
												</label>
											</div>
										</div>
									');
								break;
						    }
						}
					}else{

					}
				}else{
					
				}
				/**/# code...
			}

		//Fuction to show user folders
			function user_folders($userid,$conn){
				// open the user's directory
				$dhandle = opendir('./cloud/'.$_SESSION['SESS_USER_ID'].'/');
				// define an array to hold the folders in the user's directory
				$folders = array();

				if ($dhandle) {
				   // loop through all of the files
				   while (false !== ($fname = readdir($dhandle))) {
				      // if the folder is not this folder, and does not start with a '.' or '..',
				      // then store it for later display
				      if (($fname != '.') && ($fname != '..') &&
				          ($fname != basename($_SERVER['PHP_SELF']))) {
				          // store the folder
				          $folders[] = (is_dir( "./$fname" )) ? "(Dir) {$fname}" : $fname;
				      }
				   }
				   // close the directory
				   closedir($dhandle);
				}

				
				// Now loop through the folders, echoing out a new select option for each one
				foreach( $folders as $fname )
				{
				   printf('
		            	<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="card">
								<aside class="card-side pull-left">
									<i class="icon icon-3x text-center">folder_open</i>
								</aside>
								<div class="card-main">
									<div class="card-inner">
										<p class="">'.$fname.'</p>
									</div>
									<div class="card-action">
										<div class="card-action-btn pull-left">
											<a class="btn btn-flat waves-attach waves-effect" href="dir.php?folder='.$fname.'">
												View
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>'
					);
				}
				
			}

		//Funtion to send user list of files in directory
			function user_dir_list($user_dir){
				$resource = opendir("../cloud/".$user_dir);
					while (($entry = readdir($resource)) !==FALSE) {
						if($entry != '.' && $entry != '..'){
							echo $entry."<br>";
						}
					}
			}

		//Function to send user message on telegram app
			function send_message($chatId, $message){
				$botToken="294190711:AAEIGlNiKaglo-1TuGNu2lSKzysUQRToQQo";
				$website="https://api.telegram.org/bot".$botToken;

				file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
			}
	}
?>