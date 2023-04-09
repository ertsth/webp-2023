<!DOCTYPE html>
<html>
<head>
	<title>Films</title>
</head>
<body>
	<h2>Search films by genre</h2>
	<form action="get-film-by-genre.php" method="get">
		<label for="genre">Select a genre:</label>
        <select id="genre" name="genre">
            <?php
				include('db_connection.php');

				$sqlSelect = "SELECT title FROM genre";
				foreach($pdo->query($sqlSelect) as $row)
				{
					echo "<option value=$row[0]>$row[0]</option>";
				}
				$pdo = null;
			?>
        </select>
		<input type="submit" value="Search">
	</form>
	<br><br>
	<h2>Search films by actor</h2>
	<form action="get-film-by-actor.php" method="get">
		<label for="actor_name">Select actor name:</label>
        <select id="actor_name" name="actor_name">
            <?php
				include('db_connection.php');

				$sqlSelect = "SELECT name FROM actor";
				foreach($pdo->query($sqlSelect) as $row)
				{
					echo "<option value='$row[0]'>$row[0]</option>";
				}
				$pdo = null;
			?>
        </select>
		<input type="submit" value="Search">
	</form>
	<br><br>
	<h2>Search films in time interval</h2>
	<form action="get-film-by-time.php" method="get">
		<label for="start_date">Start time:</label>
		<input type="date" id="start_date" name="start_date" required>

		<label for="end_date">End time:</label>
		<input type="date" id="end_date" name="end_date" required>

		<input type="submit" value="Search">
	</form>
</body>
</html>
