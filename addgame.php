<?php 

error_reporting(E_ALL);
ini_set('display_error', 'on');
include 'connect_db.php';

if(!($stmt = $connection->prepare("INSERT INTO `game`(`title`, `description`) VALUES (?, ?)" )))
{
	throw new Exception($connection->errno);
}

if(!($stmt->bind_param("siisii", $_POST['gameTitle'], $_POST['gamePublisher'])))
{
	var_dump($stmt);
	throw new Exception($connection->errno);
}

if(!$stmt->execute())
{
	throw new Exception($connection->errno);
}

else 
{
	echo "Added game";
}

$stmt->close();

?>

