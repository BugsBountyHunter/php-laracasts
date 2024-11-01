<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST["email"];
$password =  $_POST["password"];


$errors = [];

if (!Validator::email($_POST["email"])) {
  $errors["email"] = "Please provide a valid email address.";
}



if (!Validator::string($_POST["password"], 7, 255)) {
  $errors["password"] = "Please provide a password of at least seven char.";
}
if (!empty($errors)) {
  return view("registration/create.view.php", [
    "errors" => $errors
  ]);
}

$db = App::resolve(Database::class);

$user = $db->query("select * from users where email = :email", ["email" => $email])->find();

if ($user) {
  header("location: /login");
  exit();
} else {
  $db->query("insert into users(email, password) values (:email, :password)", [
    "email" => $email,
    "password" => password_hash($password, PASSWORD_BCRYPT)
  ]);

  $_SESSION["user"] = [
    "email" => $email
  ];

  header("location: /");
  exit();
}
