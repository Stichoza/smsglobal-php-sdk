<?php
require_once "smsglobal.class.php";

header("content-type: text/plain");

$sms = new SMSGlobal("stichoza@gmail.com", "1212");

echo "garedan: >> " . $sms->getTicket();

exit();