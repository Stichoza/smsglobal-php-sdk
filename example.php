<?php

require "smsglobal.class.php";

$sms = new SMSGlobal("smsglobal@stichoza.com", "123456");

var_dump($sms->getTicket());