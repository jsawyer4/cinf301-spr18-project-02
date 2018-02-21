<?php
require_once "./ParseArgv.php";
$parsed = new ParseArgv($_SERVER['argv']);
$arguments = $parsed->getParsed();
// To get $arguments, you should use:
//      $arguments = $parsed->argv;
foreach ($arguments as $k => $v) {

}