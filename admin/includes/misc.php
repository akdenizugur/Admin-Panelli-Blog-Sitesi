<?php


function getNumPosts(){
	global $connection;
	$query = mysqli_query($connection,"SELECT * FROM posts");
	if(mysqli_num_rows($query) > 0)
	{
		return mysqli_num_rows($query);
	}
	return "0";
}
function getNumComments(){
	global $connection;
	$query = mysqli_query($connection,"SELECT * FROM comments");
	if(mysqli_num_rows($query) > 0)
	{
		return mysqli_num_rows($query);
	}
	return "0";
}
function getNumUsers(){
	global $connection;
	$query = mysqli_query($connection,"SELECT * FROM users");
	if(mysqli_num_rows($query) > 0)
	{
		return mysqli_num_rows($query);
	}
	return "0";
}
function getNumCategories(){
	global $connection;
	$query = mysqli_query($connection,"SELECT * FROM categories");
	if(mysqli_num_rows($query) > 0)
	{
		return mysqli_num_rows($query);
	}
	return "0";
}
function getNumContacts(){
	global $connection;
	$query = mysqli_query($connection,"SELECT * FROM contact");
	if(mysqli_num_rows($query) > 0)
	{
		return mysqli_num_rows($query);
	}
	return "0";
}
