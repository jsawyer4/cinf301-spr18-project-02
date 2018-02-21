<?php
require_once "./ParseArgv.php";
$parsed = new ParseArgv($_SERVER['argv']);
$arguments = $parsed->getParsed();
// To get $arguments, you should use:
//      $arguments = $parsed->argv;
foreach ($arguments as $k => $v) {
    print( "$K\n");
    //print('Category: $category\n');
    //print_r($results);
    foreach ($v as $t=> $f)
    {
        print("$t=>$f\n");
    }
}