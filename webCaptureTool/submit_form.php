<?php

if (empty($_POST['submit'])) {
	echo "Submit a form to make this script useful";
	exit;
}

if (empty($_POST['first_name']) || empty($_POST['comments'])) {
	echo "Please fill in all the fields of the form!";
	exit;
}

$firstName = $_POST['first_name'];
$comments  = $_POST['comments'];

require "upload.php";

echo "Submission successful";

?>
