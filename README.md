SMSGlobal PHP SDK
==================

SMSGlobal.com PHP SDK for SOAP-API

 - [Usage](#usage)
 - [Contributing](#contributing)

## Usage

**Note:** *Your web server should support SOAP extension, JSON (`json_encode()`, `json_decode()` functions) and SimpleXML (`simplexml_load_string()` function)*

#### Require SMSGlobal SDK

```php
try {
    require_once "smsglobal.php";
} catch (Exception $e) {
	$e->getMessage();
}
```

#### Create SMSGlobal object and authenticate

Way 1. Pass username and password to authenticate.

```php
$sms = new SMSGlobal("username", "password");
```

Way 2. Leave username and password empty and set ticket (if you have one) manually.

```php
$sms = new SMSGlobal();
$sms->setTicket("2ba88aa3b6b550662358eod5eb138a72");
```

Way 3. Leave username and password empty and call `validateLogin()` method.

```php
$sms = new SMSGlobal();
$sms->validateLogin("username", "password");
```

#### Send Message

```php
$smsID = $sms->sendSms("YourCompanyName", "1888123456", "Hello World!");
```

#### Call methods

```php
$myCredit = $sms->getCredit();
$smsBalance = $sms->getSmsBalance("US");
$sms->renewTicket();
```

#### Logout (expire ticket)

```php
$myCredit = $sms->logout();
```

#### Log/Debug (information about all requests and responses)

```php
print_r($sms->getLog());
```

## Contributing

Feel free to fork, modify and pull commits ;) Open issues for any ideas or bug reports