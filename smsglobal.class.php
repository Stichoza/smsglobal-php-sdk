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
			$this->soapClient = new SoapClient($this->wsdl);
		} catch (SoapFault $e) {
			print ($e->getMessage());
			echo "\n".libxml_get_last_error();
		}
		if (!empty($username) && !empty($password)) {
			$this->ticket = $this->validateLogin($username, $password);
		}
	}

	/**
	 * SMSGlobal::sendRequest()
	 * 
	 * @param string $method
	 * @param array $data
	 * @return mixed
	 * @access private
	 */
	protected function sendRequest($method, $data) {
		$method = 'api' . ucfirst($method);
		try {
			$response = $this->soapClient->$method($data);
		} catch (exception $e) {
			print ($e->getMessage());
			return null;
		}
		return $response;
	}
	
	/**
	 * SMSGlobal::getTicket()
	 * 
	 * @return mixed
	 */
	public function getTicket() {
		return $this->ticket;
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
		if (empty($u) || empty($p))
			throw new Exception("Username and password not set");
		try {
			$response = $this->sendRequest(
				"validateLogin",
				array(
					"username" => $u,
					"password" => $p
				)
			);
		} catch (Exeption $e) {
			print ($e->getMessage());
		}
		$this->ticket = $response;
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