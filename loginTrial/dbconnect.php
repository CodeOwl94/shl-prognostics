<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
$con = mysqli_connect("localhost","root","GIM2016");
if(!$con)
{
	die('oops connection problem ! --> '.mysqli_error($con));
}
if(!mysqli_select_db($con,"loginTrial"))
{
	die('oops database selection problem ! --> '.mysqli_error($con));
}

?>