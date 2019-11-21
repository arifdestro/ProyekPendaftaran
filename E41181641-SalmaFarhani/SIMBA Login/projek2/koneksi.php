<?php

//format login db
$localhost = "localhost";
$username = "root";
$password = "";
$database = "simba_database";

//variable login db
$mysqli = mysqli_connect($localhost, $username, $password, $database);

if (!$mysqli) {
    die("Connection Failed". mysqli_connect_error());
}
