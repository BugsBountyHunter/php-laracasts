<?php

$router->get("/", "index.controller.php");
$router->get("/about", "about.controller.php");
$router->get("/contact", "contact.controller.php");

$router->get("/notes", "notes/index.controller.php")->only("auth");
$router->get("/note", "notes/show.controller.php");

$router->get("/note/edit", "notes/edit.controller.php");
$router->patch("/note", "notes/update.controller.php");

$router->delete("/note", "notes/destroy.controller.php");
$router->get("/notes/create", "notes/create.controller.php");
$router->post("/notes", "notes/store.controller.php");


// registration
$router->get("/register", "registration/create.controller.php")->only("guest");
$router->post("/register", "registration/store.controller.php");

// login
$router->get("/login", "session/create.controller.php")->only("guest");
$router->post("/session", "session/store.controller.php")->only("guest");
$router->delete("/session", "session/destroy.controller.php")->only("auth");
