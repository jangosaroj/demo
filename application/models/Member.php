<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MemberFirstNameRequiredException extends Exception {}
class MemberLastNameRequiredException extends Exception {}
class MemberEmailRequiredException extends Exception {}
class MemberEmailInvalidException extends Exception {}
class MemberEmailExistsException extends Exception {}
class MemberPasswordRequiredException extends Exception{}

class Member extends ActiveRecord\Model {

	public static $table_name = 'info';
	public static $primary_key = 'id';

	public function set_first_name($first_name) {

		$first_name = trim($first_name);

		if($first_name == '') {
			throw new MemberFirstNameRequiredException;
		}

		$this->assign_attribute('first_name', $first_name);

	}

	public function set_last_name($last_name) {

		$last_name = trim($last_name);

		if($last_name == '') {
			throw new MemberLastNameRequiredException;
		}

		$this->assign_attribute('last_name', $last_name);

	}






	private function email_already_exists($email) {

		if($this->is_new_record())
		return Member::find(array('email' => $email));
	}



	public function set_email($email) {

		$email = trim($email);

		if($email == '') {
			throw new MemberEmailRequiredException;
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new MemberEmailInvalidException;
		}

		if($this->email_already_exists($email)){
			throw new MemberEmailExistsException;
		}

		$this->assign_attribute('email', $email);
	}


	public function set_member_password($member_password){
		$member_password = trim($member_password);

		if($member_password == '')
		{
			throw new MemberPasswordRequiredException;
		}

				$this->assign_attribute('member_password',$member_password);


				}




	public static function create($params) {

		$member = new Member;
		
		$member->first_name = array_key_exists('first_name', $params) ? $params['first_name'] : '';
		$member->last_name = array_key_exists('last_name', $params) ? $params['last_name'] : '';
		$member->email = array_key_exists('email', $params) ? $params['email'] : '';
		$member->member_password = array_key_exists('member_password',$params) ? $params['member_password'] : '';
		$member->last_login_at = date('Y-m-d h:i:s');;



		//$member->save();
		return $member;

	}					

}
