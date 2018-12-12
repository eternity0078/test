<?php 

$connection = mysqli_connect(
	$config['db']['server'],
	$config['db']['username'],
	$config['db'][''],
	$config['db']['name']
);

if ($connection == false)
{
	echo "ERROR!<br>";
	echo mysqli_connect_error();
	exit();
}