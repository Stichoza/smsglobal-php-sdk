SMSGlobal PHP SDK
==================

SMSGlobal.com PHP SDK for SOAP-API

## Usage

	<?php
	
	// Require SMSGlobal SDK and catch exceptions
	try {
		require_once "smsglobal.php";
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	
	// Create SMSGlobal object and authenticate
	$sms = new SMSGlobal("username", "password");
	
	// Get account credit
	$myCredit = $sms->getCredit();
	
	// Get SMS balance for US
	$smsBalance = $sms->getSmsBalance("US");
	
	// Send SMS
	$smsID = $sms->sendSms("MyCompanyName", "1888123456", "Hello World!");
	
	echo ($smsID) ? "Message sent. Message ID is: " . $smsID : "Message sending failed :(";
	
	?>

## Contributing

Feel free to fork, modify and pull commits ;) Open issues for any ideas or bug reports