<?php

use Core\App;
use Core\Validator;
use Core\Database;

require base_path("Core/Validator.php");

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST["body"], 1, 1000)) {
  $errors["body"] = "A body of no more than 1,000 characters is required.";
}

if (!empty($errors)) {
  // return to note-create view
  return view("notes/create.view.php", [
    "heading" => "Create Note",
    "errors" => $errors
  ]);
}

$db->query("INSERT INTO notes(body,user_id) VALUES(:body, :user_id)", [
  "body" => $_POST["body"],
  "user_id" => 1 // currently it constant
]);
//clear body
$_POST["body"] = "";


header("location: /notes");
die();
