<?php


//we are going to connect to the database here within this code

//we create variables that are responsible for connecting to the database
$server = 'localhost';   //127.0.0.1
$user = 'root';
$pass = '';
$db_name = 'jaribu';

$conn = mysqli_connect($server, $user, $pass, $db_name);

if ($conn){
    // echo "You are connected successfuly!";
}
else{
    echo "Failed, an error occured";
}
?>