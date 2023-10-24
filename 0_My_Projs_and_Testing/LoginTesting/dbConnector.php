<?php

class dbConnector extends SQLite3
{
	protected $db;
	public function __construct() 
	{
         $this->db=new SQLITE3("./DB/testDB.sqlite3");
    }
    
    /* Test Function
     * 
     * 
     */
    public function printUserInfo()
    {
		$results = $this->db->query('SELECT user_name,password,permission_level FROM USERS');
		while ($row = $results->fetchArray()) 
		{
			//echo "<br><h1>While Called</h1><br>";
			echo "<br>{$row[0]}:{$row[1]}:{$row[2]}<br>";
			//$k=0;
			/*foreach($row as $a)
			{
				echo "<br><h3>{$k}</h3><br>";
				echo "\n{$a}\n";
				$k+=1;
			}*/
			//echo "\n{strval($row})\n";
			//var_dump($row);
		}
	}
	
	public function check_UsernamePassword($username_in,$password_in)
	{
		echo "<h1>{$username_in}</h1><br><h1>{$password_in}</h1><br>";
		//$result=$this->db->querySingle("SELECT user_name,password from USERS where PASSWORD='{$password_in}' and user_name='{$username_in}'",true);
		$xe=$this->db->prepare("SELeCT USER_NAME,PASSWORD from USERS WHERE USER_NAME=:un AND PASSWORD=:pass");
		echo "{$xe->paramCount()}<br>";
		// found the issue. it was a space at the end of the hashed password for the admin
		// This was because I manually added the first entries.
		$xe->bindValue(':un',$username_in,SQLITE3_TEXT);
		$xe->bindValue(':pass',$password_in,SQLITE3_TEXT);
		$result=$xe->execute();
		//if doesn't exist it == NULL
		//echo $result[0];
		//var_dump($result->fetchArray());
		//var_dump($xe->getSQL(true));
		print_r(gettype($result));
		
		// Rather than like a normal array, the indexes are the following
		// USER_NAME
		// PASSWORD
		// CASE APPEARS TO MATTER
		//print_r(array_keys($result));
		foreach($result as $a)
		{
			echo $a;
		}
		if($result)
		{
			//var_dump($result);
			echo "<br><h1>Correct</h1><br>";
		}else{
			echo "<br><h1>WRONG</h1><br>";
		}
		//echo count($result);
		return $result->fetchArray();
	}
}

?>
