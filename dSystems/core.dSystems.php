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
		function check_user_categories($userid,$conn){
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
					            	<div class="col-lg-3 col-md-3 col-sm-6">
										<div class="card">
											<div class="card-main">
												<div class="card-inner">
													<p class="">'.$row_name[$i].'</p>
												</div>
												<div class="card-action">
													<div class="card-action-btn pull-left">
														<a class="btn btn-flat waves-attach waves-effect" href="dir.php?type='.$row_name[$i].'">
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
							# code...
							break;
					    }
					}
				}else{

				}
			}else{
				
			}
		}

		//Fuction to add or remove user set categories
		function FunctionName($value=''){
			/*<div class="form-group">
							<div class="checkbox checkbox-adv">
								<label for="ui_checkbox_1">
									<input class="access-hide" id="ui_checkbox_1" name="" type="checkbox">Pictures
									<span class="checkbox-circle"></span>
									<span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
								</label>
							</div>
							<div class="checkbox checkbox-adv">
								<label for="ui_checkbox_2">
									<input class="access-hide" id="ui_checkbox_2" name="" type="checkbox">Music
									<span class="checkbox-circle"></span>
									<span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
								</label>
							</div>
							<div class="checkbox checkbox-adv">
								<label for="ui_checkbox_3">
									<input class="access-hide" id="ui_checkbox_3" name="" type="checkbox">Videos
									<span class="checkbox-circle"></span>
									<span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
								</label>
							</div>
							<div class="checkbox checkbox-adv">
								<label for="ui_checkbox_4">
									<input class="access-hide" id="ui_checkbox_4" name="" type="checkbox">Documents
									<span class="checkbox-circle"></span>
									<span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
								</label>
							</div>
							<div class="checkbox checkbox-adv">
								<label for="ui_checkbox_5">
									<input class="access-hide" id="ui_checkbox_5" name="" type="checkbox">Archives
									<span class="checkbox-circle"></span>
									<span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
								</label>
							</div>
						</div>*/# code...
		}
	}
?>