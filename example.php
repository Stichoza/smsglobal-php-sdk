<?php
require_once "smsglobal.class.php";

header("content-type: text/plain");

$sms = new SMSGlobal("stichoza", "smstpajg");

print_r($sms->getTicket());

exit();