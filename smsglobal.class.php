<?php

/**
 * SMSGlobal PHP API
 *
 * @author		Levan Velijanashvili <me@stichoza.com>
 * @link		http://stichoza.com/
 * @license		http://www.opensource.org/licenses/mit-license.php MIT
 * @version		1.0.0
 * @access		public
 */
class SMSGlobal {

    private $wsdl = "http://www.smsglobal.com/mobileworks/soapserver.php?wsdl";
    private $options = array(
        'trace' => 1,
        'exceptions' => true,
        'cache_wsdl' => WSDL_CACHE_NONE,
        'features' => SOAP_SINGLE_ELEMENT_ARRAYS);

    protected $ticket;
    protected $soapClient;

    /**
     * SMSGlobal::__construct()
     * 
     * @param string $username E-mail or username (Optional)
     * @param string $password User's password (Optional)
     * @return void
     * @access public
     */
    public function __construct($username, $password) {
        try {
            $this->soapClient = new SoapClient($this->wsdl, $this->options);
        }
        catch (SoapFault $e) {
            print ($e->getMessage());
            echo "\n" . libxml_get_last_error();
        }
        if (!empty($username) && !empty($password)) {
            $this->ticket = $this->validateLogin($username, $password);
        }
    }

    /**
     * Get access token (ticket) if authorised
     */
    public function getTicket() {
        return ($this->ticket) ? $this->ticket : false;
    }

    /**
     * Convert SOAP response to array
     * 
     * @param mixed $result
     * @return
     */
    private function getResponseArray($res) {
    	return $res;
    	//$array = simplexml_load_string($res);
    	//return $array;
    }

    /**
     * Send SOAP request
     * 
     * @param string $method
     * @param array $data
     * @return mixed
     * @access private
     */
    protected function sendRequest($method, $data) {
        $method = 'api' . ucfirst($method);
        try {
            $response = $this->soapClient->__soapCall($method, $data);
        }
        catch (exception $e) {
            print ("Error: " . $e->getMessage());
            return null;
        }
        //return $this->getResponseArray($this->soapClient->__getLastResponse());
        return $this->getResponseArray($response);
        //echo "response: " . $this->soapClient->__getLastResponse();
    }

    /**
     * SMSGlobal::validateLogin()
     * 
     * @param string $u E-mail or username
     * @param string $p User's password
     * @return void
     * @access public
     * @throws Exception when username or password is not passed
     */
    public function validateLogin($u, $p) {
        if (empty($u) || empty($p)) {
            throw new Exception("Username and password not set.");
            return false;
        }
        $response = $this->sendRequest("validateLogin", array("username" => $u, "password" => $p));
        $this->ticket = $response;
        echo "gadamowmeba: *".$this->ticket."*\n";
        echo "gadamowmeba #".$this->getTicket()."#\n";
    }

    public function renewTicket() {

    }
    public function logout() {

    }
    public function getPreference() {

    }
    public function getPreferenceSender() {

    }
    public function setPreferenceSender() {

    }
    public function getInterface() {

    }
    public function interf() {

    }
    public function getUpdate() {

    }
    public function sendSms() {

    }
    public function twoWaySendLongSms() {

    }
    public function twoWaySendSms() {

    }
    public function sendLongSms() {

    }
    public function sendSmsToGroup() {

    }
    public function sendSmsToList() {

    }
    public function balanceSms() {

    }
    public function balanceCheck() {

    }
    public function getBuddyList() {

    }
    public function addBuddy() {

    }
    public function updateBuddy() {

    }
    public function moveBuddy() {

    }
    public function copyBuddy() {

    }
    public function removeBuddy() {

    }
    public function deleteBuddy() {

    }
    public function addBuddyGroup() {

    }
    public function updateBuddyGroup() {

    }
    public function deleteBuddyGroup() {

    }
    public function addBuddyBulkList() {

    }
    public function updateBuddyBulkList() {

    }
    public function deleteBuddyBulkList() {

    }
    public function moveBuddyToList() {

    }
    public function copyBuddyToList() {

    }
    public function removeBuddyFromList() {

    }
    public function moveBuddyGroupToList() {

    }
    public function copyBuddyGroupToList() {

    }
    public function removeBuddyGroupFromList() {

    }
    public function moveListToList() {

    }
    public function copyListToList() {

    }
    public function removeListFromList() {

    }
    public function MTEmail() {

    }
}

?>