<?php

include('class.password.php');

class User extends Password{

    private $db;

	function __construct($db){
		parent::__construct();

		$this->_db = $db;
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

	private function get_user_hash($username){

		try {

			$stmt = $this->_db->prepare('SELECT MemberID, username, password FROM accounts WHERE username = :username');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}


	public function login($username,$password){

		$user = $this->get_user_hash($username);

		if($this->password_verify($password,$user['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['MemberID'] = $user['MemberID'];
		    $_SESSION['username'] = $user['username'];
		    return true;
		}
	}
public function loginchar($charname){

		
		    $_SESSION['loggedinchar'] = true;
		
		    $_SESSION['charname'] = $charname;
		    return true;
		
	}


	public function logout(){
		session_destroy();
	}

}


?>
