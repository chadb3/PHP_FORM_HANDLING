<?php

class dbConnector extends SQLite3
{
	protected $db;
	//public $count;
	public function __construct() 
	{
         $this->db=new SQLITE3("./DB/testDB.sqlite3");
         //$this->count=0;
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
			echo "<br>{$row[0]}:{$row[1]}:{$row[2]}<br>";
		}
	}
	
	public function check_UsernamePassword($username_in,$password_in)
	{

		$xe=$this->db->prepare('select * from USERS where USER_NAME=:un AND PASSWORD=:pass');
		$xe->bindValue(':un',$username_in,SQLITE3_TEXT);
		$xe->bindValue(':pass',$password_in,SQLITE3_TEXT);
		$result=$xe->execute();
		$res_arr=$result->fetchArray();
		$xe->close();
		// returns the user if it exists
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
		$statement->close();
	}
	
	public function getUsers()
	{
		// Try PHP pagination
		//$this->count+=1;
		//echo "<br>{$this->count}<br>";
		$result=$this->db->query("SELECT user_name,permission_level FROM USERS LIMIT 10");
		$result_count=$this->db->query("SELECT count(user_name) FROM USERS LIMIT 10");
		//$result=$statement->execute();
		//$result->close();
		// note this doesn't work as it calls it
		//$xs=$result->fetchArray();
		//$y=count($xs);
		//echo "\n<h1>{$y}</h1>\n";
		echo "{$result->numColumns()}";
		$user_count_num = $result_count->fetchArray();
		$loopNum=0;
		$user_count_num>10?$loopNum=10:$loopNum=$user_count_num;
		$numPages=ceil($user_count_num[0]/10);
		echo "<br>Number of Users: ".$user_count_num[0]."<br>";
		echo "<br>Number of Pages needed: ".$numPages."<br>";
		//echo count($result);
		echo"<style>
table, th, td {
  border:1px solid black;
}
</style>";
		echo "
		<table>
		<th>#</th>
		<th>User</th>
		<th>User Permission</th>
		<tr>";
		//for($i=0;$i<$user_count_num[0];$i++)
		for($i=0;$i<$loopNum;$i++)
		{
			//while ($row = $result->fetchArray()) 
			//{
				$row = $result->fetchArray();
				echo "<tr>";
				echo "<td>{$i}</td>";
				echo "<td>{$row[0]}</td>";
				echo "<td>{$row[1]}</td>";
				echo "</tr>";
			//}
	}
		echo "</tr> </table>";
	}
	
}

?>
