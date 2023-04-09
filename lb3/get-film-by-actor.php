<?php
require_once 'db_connection.php';

$actor_name = $_GET['actor_name'];

$query = "SELECT film.name
          FROM film
          INNER JOIN film_actor ON film.ID_FILM = film_actor.FID_Film
          INNER JOIN actor ON film_actor.FID_Actor = actor.ID_Actor
          WHERE actor.name = :actor_name";

$stmt = $pdo->prepare($query);

$stmt->bindParam(":actor_name", $actor_name, PDO::PARAM_STR);

$stmt->execute();

$result = $stmt->fetchAll();

echo '<ul>';
foreach($result as $row)
{
  echo "<li>$row[0]</li>";
}
echo '</ul>';

$pdo = null;
?>
