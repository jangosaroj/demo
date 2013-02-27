<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members1FirstNameRequiredException extends Exception {}
class Members1UserNameRequiredException extends Exception {}
class Members1LastNameRequiredException extends Exception {}
class Members1EmailRequiredException extends Exception {}
class Members1EmailInvalidException extends Exception {}
class Members1EmailExistsException extends Exception {}
class Members1PasswordRequiredException extends Exception{}

class Members1 extends ActiveRecord\Model {

	public static $table_name = 'member1';
	public static $primary_key = 'id';


	static $belongs_to = array(

			array(
					'user',
					'class_name' => 'User',
					'foreign_key' => 'id',


				)
		);

	
	public function set_first_name($first_name) {


		$first_name = trim($first_name);

		if($first_name == '') {
			throw new Members1FirstNameRequiredException;	
		}

	$this->assign_attribute('first_name', $first_name);

	}

	public function set_last_name($last_name) {

		$last_name = trim($last_name);

		if($last_name == '') {
			throw new Members1LastNameRequiredException;
		}

		$this->assign_attribute('last_name', $last_name);

	}

	private function email_already_exists($email) {

		if($this->is_new_record())
		return Members1::find(array('email' => $email));

	}


	public function set_email($email) {

		$email = trim($email);

		if($email == '') {
			throw new Members1EmailRequiredException;
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new Members1EmailInvalidException;
		}

		if($this->email_already_exists($email)){
			throw new Members1EmailExistsException;
		}

		$this->assign_attribute('email', $email);
	}



	public static function create($params) {

		$member = new Members1;
		
		$member->first_name = array_key_exists('first_name', $params) ? $params['first_name'] : '';
		$member->last_name = array_key_exists('last_name', $params) ? $params['last_name'] : '';
		$member->email = array_key_exists('email', $params) ? $params['email'] : '';

		$user = User::create(array(

		'username' => array_key_exists('username', $params) ? $params['username'] : '',
		'password' => array_key_exists('password', $params) ? $params['password'] : '',
		));

		return $member;

	}					



}
