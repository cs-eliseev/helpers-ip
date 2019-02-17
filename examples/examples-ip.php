<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\IP;

// Example: get real IP address
// 10.10.10.162
$_SERVER = [
    'HTTP_X_REAL_IP' => '',
    'HTTP_CLIENT_IP' => '',
    'HTTP_X_FORWARDED_FOR' => '10.10.10.160, 10.10.10.161, 10.10.10.162',
];
var_dump(IP::getRealIP());
echo PHP_EOL;

// Example: remove subnet mask IPv6
// 2a0a:2b40::4:60
var_dump(IP::removeSubnetMaskIPv6('2a0a:2b40::4:60'));
var_dump(IP::removeSubnetMaskIPv6('2a0a:2b40::4:60/124'));
echo PHP_EOL;

// Example: check is IPv4 address
// true
var_dump(IP::isIPv4('127.0.0.1'));
// false
var_dump(IP::isIPv4('256.256.256'));
// false
var_dump(IP::isIPv4('2a0a:2b40::4:60'));
echo PHP_EOL;