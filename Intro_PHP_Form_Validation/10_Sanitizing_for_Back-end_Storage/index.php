<?php
$contacts = ["Susan" => "5551236666", "Alex" => "7779991717", "Lily" => "8181117777"];  
//echo count($contacts);
$message = "";
$validation_error = "* Please enter a 10-digit North American phone number.";
$name = "";
$number = "";
//echo count($contacts);
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST["name"];
   $number  = $_POST["number"];
   // Write your code here:
   if(strlen($number)<30)
   {
	   $num=preg_replace("/[^0-9]/",'',$number);
	   //echo $num;
	   if(strlen($num)==10){
		   $contacts[$name]=$num;
		   $message = "Thanks {$name}, we'll be in touch.";
		   //echo $name." ".$contacts[$name]." ".count($contacts);
		   //echo $contacts["chad"];
	   }else{$message=$validation_error;}
   }else{
	   $message=$validation_error;
   }
   
  
   
   

};
?>
<html>
	<body>
  <h3>Contact Form:</h3>
		<form method="post" action="">
			Name:
			<br>
  		<input type="text" name="name" value="<?= $name;?>">
 			<br><br>
  		Phone Number:
  		<br>
  		<input type="text" name="number" value="<?= $number;?>">
  		<br><br> 
  		<input type="submit" value="Submit">
		</form>
		<div id="form-output">
			<p id="response"><?= $message?></p>
    </div>
	</body>
</html>
    
