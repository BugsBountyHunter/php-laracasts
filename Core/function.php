<?php

use Core\Response;
use Core\Session;

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

function urls($url)
{
  return $_SERVER["REQUEST_URI"] === $url;
}

function authorize($condition)
{
  if (!$condition) {
    abort(Response::FORBIDDEN);
  }
}

function base_path($path)
{
  return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
  extract($attributes); //["key"=> $value] =(extract)> $key = "value"
  require base_path("views/" . $path);
}

function abort($code = Response::NOT_FOUND)
{
  http_response_code($code);

  view("{$code}.view.php");

  die();
}
function logout()
{
  Session::destroy();
}

function redirect($path)
{
  header("location: {$path}");
  exit();
}

function old($key, $default = '')
{
  return Session::get("old")[$key] ?? $default;
}
