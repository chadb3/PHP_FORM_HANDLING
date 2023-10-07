<?php
$a_word = $b_word = $c_word = "";
// Note: I am seeing additional issues/warnings that are not present in the codecademy lessons
// for example:
// my inputs have something similar to "<br /><b>Warning</b>:  Undefined array key " in each.
// and: Warning: Undefined array key "a-word" in ../03_Simple_Validation/index.php on line 29
echo phpversion(); 
  function checkWord($userInput,$correctInput)
  {

	// my code was having issues and throwing errors.
	// codecademy may be using an older version of php. 
	// I will upload the working solution (this one)
	// then attempt to fix it so it can run on my version.
	if($_SERVER["REQUEST_METHOD"]==="POST" && strtolower($userInput[0] ?? "") !=$correctInput)
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
    <input type="text" id="a-word" name="a_word" value="<?= $_POST["a_word"];?>">
	<p class="error" id="a-error"><?=checkWord($_POST["a_word"],'a'); ?></p>
    <br>      
      
    <br>     
    Enter a word that starts with the letter "b":
    <br>
    <input type="text" id="b-word" name="b_word" value="<?= $_POST["b_word"];?>">
    <p class="error" id="b-error"><?=checkWord($_POST["b_word"],'b'); ?></p>
    <br>      
      
    <br>
    Enter a word that starts with the letter "c":
    <br>
    <input type="text" id="c-word" name="c_word" value="<?= $_POST["c_word"];?>">
    <p class="error" id="c-error"><?=checkWord($_POST["c_word"],'c'); ?></p>
    <br>      
      
    <br>
    <input type="submit" value="Submit Words">
</form>
<div>
    <h3>"a" is for: <?= $_POST["a_word"];?><h3>
    <h3>"b" is for: <?= $_POST["b_word"];?><h3>
    <h3>"c" is for: <?= $_POST["c_word"];?><h3>    
<div>  
