<?php
session_start();
include "includes/db.php";
$email = $_SESSION['userLogged'];


if(isset($_POST['text']))
{
	$pwd = md5($_POST['text']);
	$query = mysqli_query($connection, "SELECT password FROM users WHERE email = '$email'");
	$data = mysqli_fetch_array($query);
	$pwdfromdb = $data['password'];
	if($pwdfromdb == $pwd)
	{
		echo "<span class = 'text-success'> Şifre Eşleşiyor. </span>";
	}
	else
	{
		echo "<span class = 'text-success'> Şifre Eşleşmiyor. </span>";
	}
}

?>