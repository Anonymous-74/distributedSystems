<?php
	//Start session
	session_start();

	//Include database connection details
	include 'db_conn.php';
	//Include class details
	include 'core.dSystems.php';

	$obj = new dSystems();

	//$obj->user_dir_list(1);


	$botToken="294190711:AAEIGlNiKaglo-1TuGNu2lSKzysUQRToQQo";
	$website="https://api.telegram.org/bot".$botToken;

	$update=file_get_contents($website."/getupdates");
	$updateArray=json_decode($update, True);
	
	
	
	$chatId=end($updateArray['result'])['message']['chat']['id'];
	$clientName=end($updateArray['result'])['message']['chat']['first_name'];
	$message=end($updateArray['result'])['message']['text'];

	
	

	switch ($message){
		case $message:
			//Checks to see if message is a command
			if($message[0] == '/'){
				$_SESSION['command'] = $message;
			}

			//Create query
			$query="SELECT * FROM `bot_sense` WHERE `message` = '$message'";
			$result=mysqli_query($conn, $query);
			
			//Check whether the query was successful or not
			if($result) {
				if(mysqli_num_rows($result) == 1) {
					$row = mysqli_fetch_assoc($result);
					$response = $row['response'];

					file_get_contents($website."/sendmessage?parse_mode=markdown&chat_id=".$chatId."&text=".$response);		
				}else{
					switch ($_SESSION['command']) {
						//File Options
							case '/uploadfile':
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
								break;
							case '/renamefile':
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
								break;
							case '/deletefile':
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
								break;
							case '/movefile':
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
								break;
							case '/copyfile':
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
								break;
							case '/list':
								//$obj->user_dir_list($user_dir);
								if ($message=="root"||$message=="Root") {
									$dir="";
								}else{
									$dir=$message;
								}

								$listArray=$obj->user_dir_list($dir);
								if(!empty($listArray)) {
									$list="";
									foreach ($listArray as $key) {
										$list.=$key;
									}
									$msg="/list";
									$query="SELECT * FROM `bot_sense` WHERE `message` = '$msg'";
									$result=mysqli_query($conn, $query);
									
									//Check whether the query was successful or not
									if($result) {
										if(mysqli_num_rows($result) == 1) {
											$row = mysqli_fetch_assoc($result);
											$botResponse= $row['response'];
										}
									}

									$obj->send_message($chatId,"*Here is a list of your folders in your '{$message}' directory.*%0A%0A".$list);
									//file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$list}");
								}else if($listArray==false){
									$obj->send_message($chatId,"No directory with name '{$message}' was found.");
								}else{
									$obj->send_message($chatId,"Your '{$message}' directory is empty.");
								}
								break;

						
						//Folder Options
							case '/newfolder':
								$folder_name = $obj->clean($message);
								$directoryName = '../cloud/'.$_SESSION['SESS_USER_ID'].'/'.$folder_name;
							 
								//Check if the directory already exists.
								if(!is_dir($directoryName)){
								    mkdir($directoryName, 0755, true);
								   	$obj->send_message($chatId, "Your Folder"." '{$folder_name}' "."was created successfully.");
								}else{
									$obj->send_message($chatId, "Error creating folder!");
								}
								break;
							case '/renamefolder':
								$userDir_newDir = $obj->clean($message);
								$nameArray = explode("-",$userDir_newDir);
									$oldName = $nameArray[0];
									$newName = $nameArray[1];

								//Checks to see if folder has been renamed
								if(!$obj->renameFolder($oldName,$newName)){
									$obj->send_message($chatId, "Your Folder"." '{$oldName}' was renamed to '{$newName}' successfully.");
								}else{
									$obj->send_message($chatId, "Error renaming folder!");
								}
								break;
							case '/deletefolder':
								$userDir = $obj->clean($message);

								if ($obj->deleteFolder($userDir)) {
									echo "1";
								}else{
									echo "0";
								}
								break;
							case '/movefolder':
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
								break;
							case '/copyfolder':
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
								break;

						default:
							file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=I have not been programmed to understand \"".$message."\" yet");
							break;
					}
				}
			}
		break;
		
		default:
			file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=I have not been programmed to understand \"".$message."\" yet");
			break;
	}
	
?>	