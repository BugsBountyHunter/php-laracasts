<?php

use Core\Validator;


$errors = [];

if (!Validator::string($_POST["body"], 1, 1000)) {
  $errors["body"] = "A body of no more than 1,000 characters is required.";
}

if (!empty($errors)) {
  return view("notes/edit.view.php", [
    "heading" => "Edit Note",
    "errors" => $errors
  ]);
}


view("notes/index.view.php", [
  "heading" => $heading,
  "errors" => []
]);
