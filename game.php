<?php 
	/*Templating -- */
	$page_title = "Games";
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	include 'header.php';

?>

<form>
</form>


<?php 


/***************************
   GENERATE TABLE FOR GAMES
***************************/ 
	
	$choice = "SELECT * FROM game";
	$result = $connection->query($choice);
	$num_rows = mysqli_num_rows($result);

/*	while($row = $result->fetch_array())			// For when we do individual picks.
	{
		$game_id = $row['id'];
		$game_title = $row['title'];
		$game_publisher = $row['publisher'];
		$game_rDate = $row['release_date'];
	}
*/

	echo ' <h2> Game Info </h2> '; 
	if($num_rows > 0)
	{
		echo '<table>
				<tr>
					<th>Game Name</th>
					<th>Publisher</th>
					<th>Release Date</th>
				</tr>';


		while($row = $result->fetch_assoc())
		{
		echo '  <tr> 
				<td> ' . $row['title'] . ' </td>
				<td> ' . $row['publisher'] . ' </td>
				<td> ' . $row['release_date'] . '</td> </tr>';
		}
		echo '</table>';
	}
	else {

		echo "Sorry, this is an empty query.";
	}

?>


<form action ="addgame.php" method="post"> 
	<fieldset>
		<legend>Add a game:</legend>
	Title: <input type="text" name="gameTitle" id="game_title" required />
	Publisher: <input type="text" name="gamePublisher" id="game_pub" required />
	<input type="submit" value="submit" />
</fieldset>
</form>
		


	<?php $connection->close(); ?>
