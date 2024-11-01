<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUser = 1;

$query = "select * from notes where id = :id";
$note = $db->query($query, ["id" => $_GET["id"]])->findOrFail();

authorize($note["user_id"] === $currentUser);

$heading = htmlspecialchars($note["body"]);


view("notes/show.view.php", [
  "heading" => $heading,
  "note" => $note
]);
