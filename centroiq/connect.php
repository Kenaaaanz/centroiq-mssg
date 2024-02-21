<?php

$dbhost= "localhost";
$dbuser= "root";
$dbpass= "";
$dbname= "centroiq";

if(!$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Connection Failed!");}