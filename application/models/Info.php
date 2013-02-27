<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InfoUserNameRequiredException extends Exception {}
class InfoUsernameExistsException extends Exception{}
class InfoPasswordRequiredException extends Exception {}

class Info extends ActiveRecord\Model {

	public static $table_name = 'user_info';



	public function set_username($username) {

		$username = trim($username);

		if($this->username_already_exists($username))
		
			{
			throw new InfoUsernameExistsException;
		
			}


	$this->assign_attribute('username',$username);

	}


	private function username_already_exists($username) {

		
	return Info::find(array('username' => $username));

	}



	public function set_password($password){
		$password = trim($password);

		if($password == '')
			{
			throw new InfoPasswordRequiredException;
			}

				$this->assign_attribute('password',$password);
	}

	public static function create($params) {

		$member = new Info;
		
		$member->username = array_key_exists('username', $params) ? $params['username'] : '';
		$member->password = array_key_exists('password', $params) ? $params['password'] : '';
		$member->last_login_at = date('Y-m-d h:i:s');;
	return $member;

	}					
}