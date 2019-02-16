<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\IP;

// Example: get real ip address
// 10.10.10.162
$_SERVER = [
    'HTTP_X_REAL_IP' => '',
    'HTTP_CLIENT_IP' => '',
    'HTTP_X_FORWARDED_FOR' => '10.10.10.160, 10.10.10.161, 10.10.10.162',
];
var_dump(IP::getRealIP());
echo PHP_EOL;