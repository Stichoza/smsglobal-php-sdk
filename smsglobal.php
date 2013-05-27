<?php

if (!extension_loaded('soap')) {
    throw new Exception('SMSGlobal needs the SOAP PHP extension.');
}

if (!function_exists('json_decode')) {
    throw new Exception('SMSGlobal needs the JSON PHP extension.');
}

if (!function_exists('simplexml_load_string')) {
    throw new Exception('SMSGlobal needs the SimpleXML PHP extension.');
}

require_once "smsglobal.exception.php";
require_once "smsglobal.class.php";

?>