<?php

class MemberNotExistsException extends Exception {}
class MemberPasswordNotMatchesException extends Exception {}

class User extends ActiveRecord\Model {
	
	public static $table_name = 'users';

	public static $primary_key = 'id';

	static $has_one = array(
		array(
			'member',
			'class_name' => 'Member',
			'foreign_key' => 'user_id',
		));

	public function set_password($password) {
	
		$pass = $this->hash_password($password);

		$this->assign_attribute('password', $pass);
	}

	public function hash_password($password) {
	
		$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
		$hash = hash('sha256', $salt.$password);
		return $salt.$hash;
	}

	public static function by_username($username) {

		$user = self::find_by_username($username);

		if(!$user) {
			throw new MemberNotExistsException();
		}

		return $user;
	}

	public function login($password) {

		$this->validate_password($password);
		$this->last_login_at = date('Y-m-d H:i:s');
		$this->save();
	}

	private function validate_password($password) {

		$salt = substr($this->password,0,64);
		$hash = substr($this->password,64,64);
		$password_hash = hash('sha256', $salt.$password);

		if($password_hash !== $hash) {
			throw new MemberPasswordNotMatchesException();
		}
	}

	public static function create($params) {

		$user = new User;
		$user->username = array_key_exists('username', $params) ? $params['username'] : '';
		if(array_key_exists('password',$params))
			$user->set_password($params['password']);
		$user->save();
		return $user;
	}
}