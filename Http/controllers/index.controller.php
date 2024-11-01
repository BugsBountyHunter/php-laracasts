<?php

$heading = "Home";

$_SESSION["name"] = "Ahmed";

view("index.view.php", [
  "heading" => $heading
]);
