<?php

$query = "INSERT INTO LOGIN (";
$query .= "username, password";
$query .= ") VALUES (";
$query .= "'{$username}', '{$password}')";
		
echo $query;
		
?>