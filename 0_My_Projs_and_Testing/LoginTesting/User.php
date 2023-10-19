<?php
class User{
	#stores the unique username
	protected $user_name;
	#hashed password
	#not sure if I should even store it?
	#maybe just store a junk val here unless the password is needed for something...
	protected $password;
	#stores the permission level
	protected $permission_level;
	// Test Function
	// using to test calling static function in different file;
	// future tests is tying the user to a session
	// and using a database to set users instead of a list/array;
	
	public function __construct($user_name,$password)
	{
		$this->user_name=$user_name;
		$this->password=$password;
	}
	
	public function print_username()
	{
		echo "<strong>Username: </strong>".$this->user_name;
	}
	
	public static function printx()
	{
		echo "<h1>Static function \"printx()\" called</h1>";
	}
}
?>
