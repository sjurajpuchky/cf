<?php
	include_once('../Form.php');
	include_once('../FormField.php');

$sampleForm = new cf\Form("sampleForm");
$sampleForm->setMethod("POST");
$sampleForm->addEmail("username", "Username",true);
$sampleForm->addPassword("password", "Password",true);
$sampleForm->addSubmit("submit", "Login");

if(isset($_POST["submit"])) {
    echo $_POST["username"];
} else {
    echo $sampleForm;
}


?>