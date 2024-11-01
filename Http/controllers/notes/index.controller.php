<?php

use Core\App;
use Core\Database;

$heading = "My Notes";

$db = App::resolve(Database::class);

$user_id = $_GET["user_id"] ?? -1; // -1 : ref user not exists

$user_filter = "";
$params = [];

if ($user_id !== -1) {
  $user_filter = "where user_id = :user_id";
  $params["user_id"] = $_GET["user_id"];
}

$query = "select * from notes $user_filter";
$notes = $db->query($query, $params)->all();

view("notes/index.view.php", [
  "heading" => $heading,
  "notes" => $notes
]);
