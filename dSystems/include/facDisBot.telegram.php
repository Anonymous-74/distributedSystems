<?php
	$botToken="294190711:AAEIGlNiKaglo-1TuGNu2lSKzysUQRToQQo";
	$website="https://api.telegram.org/bot".$botToken;

	$update=file_get_contents($website."/getupdates");
	$updateArray=json_decode($update, True);
	
		
	
	$chatId=end($updateArray['result'])['message']['chat']['id'];
	$clientName=end($updateArray['result'])['message']['chat']['first_name'];
	$message=end($updateArray['result'])['message']['text'];

	
	

	switch ($message) {
		case '/hi':
			file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=Hey ".$clientName);
			break;
		case '/yo':
			file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=Wassup ".$clientName);
			break;
		case '/test':
			file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=Test ".$clientName);
			break;
		case 'what is your name?':
		case 'What is your name?':
			file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=My name is facDisBot");
			break;
		default:
			file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=I have not been programmed to understand \"".$message."\" yet");
			break;
	}
	
?>	