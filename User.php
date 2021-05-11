<?php

require_once 'Credentials.php';

class User {

	use Credentials;

	public $id;
	public $name;
	public $surname;
	public $email;
	public $role;
	public $profile_desc;
	public $birth_date;
	public $adult_bool;
	public $subscription_date;
	public $last_login_date;

	function __construct($_name,$_surname,$_email,$_role){
		$this->name 	= $_name;
		$this->surname 	= $_surname;
		$this->email 	= $_email;
		$this->role 	= $_role;
	}
	public function checkAge($birth_date){
		$now = date_create(date('Y-m-d'));
		$age = date_diff($now,$birth_date);
		if ($age->y < 18) {
			$this->adult_bool = false;
			throw new Exception('Utente minorenne!');
		} else {
			$this->adult_bool = true;
		}
	}
}

?>