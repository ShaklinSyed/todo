<?php
// Essential constants and functions

$dbhost = 'localhost';
$dbname = 'todo';
$dbuser = 'root';
$dbpass = 'thisworks';

mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());


// creates a new Table with $name as Parameter
function createTable($name,$query){
	if(tableExists($name)){
		echo "Table $name already exists";
	}
	else{
		queryMySql("CREATE TABLE $name($query)");
		echo "Table $name Created";
	}
}

// Checks for table's existence
function tableExists($name){
	$result = queryMySql("SHOW TABLEs LIKE '$name'");
	return mysql_num_rows($result); 
}

// function to query the table
function queryMySql($query){
	$result = mysql_query($query) or die(mysql_error());
	return $result;
}

// Sanitizing the string
function sanitizeString($var){
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return mysql_real_escape_string($var)
}
?>