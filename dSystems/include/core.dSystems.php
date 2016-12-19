<?php
	/**
	* 
	*/

	class dSystems 
	{
		//Function to sanitize values received from the form. Prevents SQL injection
			function clean($str) {
				$str = @trim($str);
				if(get_magic_quotes_gpc()) {
					$str = stripslashes($str);
				}
				return mysql_real_escape_string($str);
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
						        			$icon = "video_library";
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
						            	<div class="col-lg-2 col-md-3 col-sm-6">
											<a id="uc" href="dir.php?type='.strtolower($row_name[$i]).'">
												<div class="card btn waves-attach">
													<aside class="pull-left">
														<i class="icon icon-5x text-center">'.$icon.'</i>
													</aside>
													<div class="card-main">
														<div class="card-inner">
															<p class="">'.$row_name[$i].'</p>
														</div>
													</div>
												</div>
											</a>
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
					//$dhandle = opendir('./cloud/'.$_SESSION['SESS_USER_ID'].'/');
				// define an array to hold the folders in the user's directory
					$folders = array();
					$files = array();
				
				// open the user's directory
				$path = './cloud/'.$_SESSION['SESS_USER_ID'].'/'; // '.' for current
				foreach (new DirectoryIterator($path) as $file) {
					if (($file != '.') && ($file != '..') &&
					          ($file != basename($_SERVER['PHP_SELF']))) {
					    if ($file->isDir()) {
					        $folders[] = $file->getFilename();
					    }
					}
				}


				// Now loop through the folders, echoing out a new select option for each one
					foreach( $folders as $fname )
					{
					   printf('
			            	<div class="col-lg-3 col-md-3 col-sm-3">
								<a id="uf" href="dir.php?folder='.$fname.'">
									<div class="card btn-sm waves-attach">
										<aside class="pull-left">
											<i class="icon icon-5x text-center">folder_open</i>
										</aside>
										<div class="card-main">
											<div class="card-inner">
												<p class="">'.$fname.'</p>
											</div>
										</div>
									</div>
								</a>
							</div>'
						);
					}
			}



		//Fuction to show user folders
			function user_files($userid,$conn){
				// open the user's directory
					//$dhandle = opendir('./cloud/'.$_SESSION['SESS_USER_ID'].'/');
				// define an array to hold the folders in the user's directory
					$files = array();
				
				// open the user's directory
				$path = './cloud/'.$_SESSION['SESS_USER_ID'].'/'; // '.' for current
				if (is_dir($path)) {
					if ($dh = opendir($path)) {
				    	while (($file = readdir($dh)) !== false) {
				    		if(is_file($path . $file)){
				                $files[]=$file;
				    		}
				        }
				    	closedir($dh);
				  	}
				}


				// Now loop through the folders, echoing out a new select option for each one
					foreach( $files as $fname )
					{
						$extension=$ext = pathinfo($fname, PATHINFO_EXTENSION);
						
						switch ($extension) {
							case 'txt':
							case 'doc':
								$file_icon="description";
								break;

							case 'jpg':
							case 'jpeg':
							case 'png':
								$file_icon="image";
								break;
							
							case 'mp3':
							case 'flac':
							case 'wav':
								$file_icon="audiotrack";
								break;

							case 'mp4':
							case 'avi':
							case 'flv':
							case 'ts':
							case 'mkv':
							case 'mov':
							case 'mpeg':
								$file_icon="videocam";
								break;

							default:
								$file_icon="insert_drive_file";
								break;
						}//dir.php?folder='.$fname.'
					   	printf('
					   		<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
								<a id="ufi" href="#'.$file_icon.'" data-toggle="modal" data-whatever="./cloud/'.$_SESSION['SESS_USER_ID'].'/'.$fname.'" data-name="'.$fname.'">
									<div class="card btn waves-attach">
										<div class="card-main">
											<div class="card-inner text-center">
												<i id="ufic" class="icon icon-3x text-center">'.$file_icon.'</i>
												<p class="">'.$this->truncateFilename($fname, $max = 15).'</p>
											</div>
										</div>
									</div>
								</a>
							</div>'
						);
					}
			}



		//Funtion to send user list of files in directory
			function user_dir_list($user_dir){
				if($resource = @opendir("../cloud/".$_SESSION['SESS_USER_ID']."/".$user_dir)){
					$list=array();
					while (($entry = readdir($resource)) !==FALSE) {
						if($entry != '.' && $entry != '..'){
							$list[]= "".$entry.""."%0A";
						}
					}
				}else{	
					return false;
				}
					
				return $list;
			}

		//Function to send user message on telegram app
			function send_message($chatId, $message){
				$botToken="294190711:AAEIGlNiKaglo-1TuGNu2lSKzysUQRToQQo";
				$website="https://api.telegram.org/bot".$botToken;

				file_get_contents($website."/sendmessage?parse_mode=markdown&chat_id=".$chatId."&text=".$message);
			}

		//Function to truncate the name of a file or folder
			function truncateFilename($filename, $max = 30) {
				if (strlen($filename) <= $max) {
					return $filename;
				}
				if ($max <= 3) {
					return '<b>...</b>';
				}
				if (!preg_match('/^(.+?)(\.[^\.]+)?$/', $filename, $match)) {
					// has newlines or is an empty string
					return $filename;
				}
				list (, $name, $ext) = $match;
				$extLen = strlen($ext);
				$nameMax = $max - ($extLen == 0 ? 3 : $extLen + 2); // 2 for two dots of the elipses
				if ($nameMax <= 1) {
					$truncated = substr($filename, 0, $max - 3) . '<b>...</b>';
				}
				else {
					$truncated = substr($name, 0, $nameMax) . '<b>...</b>' . substr($ext, 1);
				}
				return $truncated;
			}

		//Function to rename user folder
			function renameFolder($oldName,$newName){
				// open the user's directory
					$path = './cloud/'.$_SESSION['SESS_USER_ID'].'/'; // '.' for current


			}

		//Function to delete user folder
			function deleteFolder($user_dir){
				// open the user's directory
					$path = './cloud/'.$_SESSION['SESS_USER_ID'].'/'.$user_dir; // '.' for current

					
			}

		//Function to move user folder
			function moveFolder($user_dir){
				// open the user's directory
					$path = './cloud/'.$_SESSION['SESS_USER_ID'].'/'; // '.' for current

					
			}

		//Function to copy user folder
			function copyFolder($old_dir,$new_dir){
				// open the user's directory
					$path = './cloud/'.$_SESSION['SESS_USER_ID'].'/'; // '.' for current

					
			}
	}
?>