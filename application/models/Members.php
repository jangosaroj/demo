<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MembersFirstNameRequiredException extends Exception {}
class MembersLastNameRequiredException extends Exception {}
class MembersEmailRequiredException extends Exception {}
class MembersEmailInvalidException extends Exception {}
class MembersEmailExistsException extends Exception {}
class MembersPasswordRequiredException extends Exception{}

class Members extends ActiveRecord\Model {

	public static $table_name = 'member';
	public static $primary_key = 'id';
	public function set_first_name($first_name) {


		$first_name = trim($first_name);

		if($first_name == '') {
			throw new MembersFirstNameRequiredException;
		}


		$this->assign_attribute('first_name', $first_name);


	}

	public function set_last_name($last_name) {

		$last_name = trim($last_name);

		if($last_name == '') {
			throw new MembersLastNameRequiredException;
		}

		$this->assign_attribute('last_name', $last_name);

	}

	private function email_already_exists($email) {

		if($this->is_new_record())
		return Members::find(array('email' => $email));

	}


	public function set_email($email) {

		$email = trim($email);

		if($email == '') {
			throw new MembersEmailRequiredException;
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new MembersEmailInvalidException;
		}

		if($this->email_already_exists($email)){
			throw new MembersEmailExistsException;
		}

		$this->assign_attribute('email', $email);
	}



	public static function create($params) {

		$member = new Members;
		
		$member->first_name = array_key_exists('first_name', $params) ? $params['first_name'] : '';
		$member->last_name = array_key_exists('last_name', $params) ? $params['last_name'] : '';
		$member->email = array_key_exists('email', $params) ? $params['email'] : '';




/*		$sember = Info::create(array(
				'username' => 'sveest',
				'password' => 'solive      ',										
						));
		//$member->save();


		*/
		return $member;

	}					


}
