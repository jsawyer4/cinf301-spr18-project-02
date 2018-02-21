
<?php
require_once "./ParseArgv.php";
 $arguments = new ParseArgv($_SERVER['argv']);
$values = array(
    'name' => 'cont',
    'account' => 'suntrust'
);
$values['v'] = true;
$test = is_bool($values['v']);
$values['v'] = 44;
$test = is_bool($values['v']);
$values['v'] = '44';
$values[4] = '44';
$values[4] = true;
foreach ($values as $k => $v) {
    // print($k . "=>" . $v . "\n");
    print("$k=>$v\n");
}
// var_dump($values);
foreach ($argv as $arg) {
    print("$arg\n");
}