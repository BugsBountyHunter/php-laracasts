<?php

use Core\Container;
use Core\Database;
use Core\App;

$container = new Container();

// register in container
$container->bind(Database::class, function () {
  $config = require base_path("config.php");
  return new Database($config["database"], "root", "Ahmed@Saber_1996$");
});

App::setContainer($container);
