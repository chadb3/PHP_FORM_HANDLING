<?php

// I was able to resolve most of the warnings by checking if the values are set before echoing 
//echo phpversion(); 
  function checkWord($userInput,$correctInput)
  {

	if($_SERVER["REQUEST_METHOD"]==="POST" && strtolower($userInput[0]) !=$correctInput)
	{
		return "* This word must start with the letter {$correctInput}!";
	} else{
		return "";
	}
  }
  
  
  
  
?><!DOCTYPE html>

<h1>Time to Practice our ABCs</h1>
<form method="post" action="post">
    Enter a word that starts with the letter "a":
    <br>
    <input type="text" id="a-word" name="a_word" value="<?php  if(isset($_POST["a_word"])){ echo $_POST["a_word"];}?>">
	<p class="error" id="a-error">
	<?php if(isset($_POST["a_word"])){echo checkWord($_POST["a_word"],'a');} ?>
	</p>
    <br>      
      
    <br>     
    Enter a word that starts with the letter "b":
    <br>
    <input type="text" id="b-word" name="b_word" value="<?php  if(isset($_POST["b_word"])){ echo $_POST["b_word"];}?>">
    <p class="error" id="b-error"><?php if(isset($_POST["b_word"])){echo checkWord($_POST["b_word"],'b');} ?></p>
    <br>      
      
    <br>
    Enter a word that starts with the letter "c":
    <br>

    <input type="text" id="c-word" name="c_word" value="<?php  if(isset($_POST["c_word"])){ echo $_POST["c_word"];}?>">
    <p class="error" id="c-error"><?php if(isset($_POST["c_word"])){echo checkWord($_POST["c_word"],'c');} ?></p>

    <br>      
      
    <br>
    <input type="submit" value="Submit Words">
</form>
<div>
    <h3>"a" is for: <?php  if(isset($_POST["b_word"])){ echo $_POST["a_word"];}?><h3>
    <h3>"b" is for: <?php  if(isset($_POST["b_word"])){ echo $_POST["b_word"];}?><h3>
    <h3>"c" is for: <?php  if(isset($_POST["c_word"])){ echo $_POST["c_word"];}?><h3>    
<div>  
<a href="index.php">Reset</a>
