<?php

class dbConnector extends SQLite3
{
	protected $db;
	public function __construct() 
	{
         $this->db=new SQLITE3("testDB.sqlite3");
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
		$result=$this->db->querySingle("SELECT user_name,password from USERS where user_name='{$username_in}'");
		//if doesn't exist it == NULL
		//echo $result[0][0];
		var_dump($result);
		print_r($result);
	}
}

?>
