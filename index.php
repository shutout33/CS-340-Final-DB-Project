<?php 
	/*Templating -- */
	$page_title = 'Index and Registry Page';
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	include 'header.php';

	$game_sql = "SELECT * FROM game";
	$genre_sql = "SELECT * FROM genre";
	$platform_sql = "SELECT * FROM platform";
	$review_sql = "SELECT * FROM review";
	$rating_sql = "SELECT * FROM rating";

	$game_result = $connection->query($game_sql);
	$genre_result = $connection->query($genre_sql);
	$platform_result = $connection->query($platform_sql);
	$rating_result = $connection->query($rating_sql);
	$review_result = $connection->query($review_sql); ?>


	<p>Please select a link to look up stuff.</p>
	<p> If you are seeing this page, then everything is working properly.</p>
	</ul>


	<?php if(mysqli_num_rows($game_result) > 0)
	{
		while($row = $game_result->fetch_assoc())
		{
			echo "id:" . $row["game_id"] . " - Name: " . $row["title"] . "- Publisher: " . $row["publisher"] . "<br />";
		}
	}
	else
		{
			echo "Nope. Empty query.";
		}

	echo "<br/><br/>";
	echo "<h1>Genre:</h1>";

	if(mysqli_num_rows($genre_result) > 0)
	{
		while($row = mysqli_fetch_assoc($genre_result))
		{
			echo "id:" . $row["game_id"] . " - Name: " . $row["name"] . "- Characteristics: " . $row["characteristics"] . "<br /><br />";
		}
	}
	else
	{
			echo "Nope. Empty query.";
	}

	echo "<h1>Platforms:</h1>";
	
	if(mysqli_num_rows($platform_result) > 0)
	{
		while($row = mysqli_fetch_assoc($platform_result))
		{
			echo "id:" . $row["game_id"] . " - Name: " . $row["name"] . "- Manufacturer: " . $row["manufacturer"] . " - Generation: " . $row["generation"] . "<br /><br />";
		}
	}
	else
	{
		echo "Nope. Empty query.";
	}


	if(mysqli_num_rows($review_result) > 0)
	{
		while($row = mysqli_fetch_assoc($review_result))
		{
			echo "id:" . $row["game_id"] . " - Title: " . $row["title"] . "- Description: " . $row["description"] . "<br /><br />";
		}
	}
	else
		{
			echo "Nope. Empty query. Would you like to <a href="addgame.php" target="_blank">add a game</a> to your collection? ";
		}

?>

<br /><br />

<?php include 'footer.php'; ?>

</body>
</html>
