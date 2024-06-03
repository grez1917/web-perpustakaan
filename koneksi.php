<?php

try
{
	$conn=new PDO("mysql:host=localhost; dbname=perpustakaan", "grez", "password");
	echo "Connection Success!";
}
catch (PDOException $ex)
{
	echo "Error: $ex";
}
