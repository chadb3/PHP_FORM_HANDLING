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
		// useful commands from this "learning exercise"
		// var_dump($xe->getSQL(true));
		//		- I used var_dump to query the DB directly
		//			- I first found that there was an issue with the saved password (space at the end. I manually added them to the db using a db browser so it was easy to miss..)
		//			- I later found that my "prepare" query wasn't working due to not saving my changes in the Database...(because the query getSQL generated was pulling the correct data when quering the DB directly).
		// ->numColumns(); 
		// ->paramCount();		
		// $var->fetchArray()
		//		- Used to get the ANSWER
		//$xe=$this->db->prepare('select user_name,password from USERS where USER_NAME=:un AND PASSWORD=:pass');
		$xe=$this->db->prepare('select * from USERS where USER_NAME=:un AND PASSWORD=:pass');
		// found the issue. it was a space at the end of the hashed password for the admin in the SQLite database (so in that case it would not match the generated val).
		// This was because I manually added the first entries.
		// in addition I spent an hour or so continuing to troulbeshoot why ->fetchArray() wasn't returining anything at all. Only to find that I didn't save my change in the DB browser...
		// once I saved in the DB it started to work.
		// this is weird, becuase you don't need to save to be able to query the data (that I had just changed...), and the data pulled as expected once I fixed the space at the end of the password in the DB browser...
		$xe->bindValue(':un',$username_in,SQLITE3_TEXT);
		$xe->bindValue(':pass',$password_in,SQLITE3_TEXT);
		$result=$xe->execute();
		//var_dump($result);
		$res_arr=$result->fetchArray();
		//$result->close();
		$xe->close();
		/*if($res_arr)
		{
			//var_dump($result);
			echo "<br><h1>Correct</h1><br>";
		}else{
			echo "<br><h1>WRONG</h1><br>";
		}*/
		return $res_arr;
	}
	public function addUser($username_IN,$password_IN,$permissionLevel_IN,$requestedBy)
	{
		echo "NOT YET IMPLEMENTED";
		$statement=$this->db->prepare("insert into USERS (user_name,permission_level,password) values (:un,:perm,:pass)");
		$statement->bindValue(":un",$username_IN,SQLITE3_TEXT);
		$statement->bindValue(":perm",$permissionLevel_IN,SQLITE3_TEXT);
		$statement->bindValue(":pass",hash("sha256",$password_IN),SQLITE3_TEXT);
		$statement->execute();
	}
}

?>
