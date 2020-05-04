<?php 

//Connection info

$servername = 'localhost'; //same for local or cPanel
$username = 'root'; //this will be replaced with your username
$password = ''; //this will be replaced with your password
$dbname = 'assignment7'; //this will be replaced with your database

//Create a database connection
$db = new mysqli($servername, $username, $password, $dbname);

//check for connection errors
//$student.name
if ($db->connect_error){
    die('Connection failed....');
}