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

	
	

	switch ($message) {
		case $message:
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
					switch ($message) {
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
								
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
								break;

						
						//Folder Options
							case '/newfile':
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
								break;
							case '/renamefolder':
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
								break;
							case '/deletefolder':
								file_get_contents($website."/sendmessage?chat_id=".$chatId."&text={$message}");
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