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

// Example: check is IPv6 address
// true
var_dump(IP::isIPv6('::'));
// true
var_dump(IP::isIPv6('::1'));
// true
var_dump(IP::isIPv6('2a0a:2b40::4:60'));
// true
var_dump(IP::isIPv6('0:0:0:0:0:0:0:1'));
// false
var_dump(IP::isIPv6(':'));
// false
var_dump(IP::isIPv6('127.0.0.1'));
echo PHP_EOL;

// Example: check is IPv6 address
// 6
var_dump(IP::getVersionIP('::1'));
// 4
var_dump(IP::getVersionIP('127.0.0.1'));
// 6
var_dump(IP::getVersionIP('0:0:0:0:0:0:0:1'));
// null
var_dump(IP::getVersionIP(':'));
// null
var_dump(IP::getVersionIP('256.256.256.256'));
echo PHP_EOL;

// Example: is IP address
// 6
var_dump(IP::isIP('::1'));
// 4
var_dump(IP::isIP('127.0.0.1'));
// 6
var_dump(IP::isIP('0:0:0:0:0:0:0:1'));
// null
var_dump(IP::isIP(':'));
// null
var_dump(IP::isIP('256.256.256.256'));
echo PHP_EOL;

// Example: get range IPv6 address
// ['2a0a:2b40::4:60', '2a0a:2b40::4:6f']
var_dump(IP::getRangeIPv6('2a0a:2b40::4:60/124'));
echo PHP_EOL;

// Example: filter IPs address
// [4 => ['127.0.0.1', '255.255.255.255'], 6 => ['2a0a:2b40::4:60', '2a0a:2b40::4:6f']]
var_dump(IP::filterIPs([
    '127.0.0.1',
    '2a0a:2b40::4:60',
    '255.255.255.255',
    '2a0a:2b40::4:6f',
    '256.256.256.256'
]));
// Example: filter IPv4 address
// [4 => ['127.0.0.1', '255.255.255.255']]
var_dump(IP::filterIPs([
    '127.0.0.1',
    '2a0a:2b40::4:60',
    '255.255.255.255',
    '2a0a:2b40::4:6f',
    '256.256.256.256'
], 4));
// Example: filter IPv6 address
// [6 => ['2a0a:2b40::4:60', '2a0a:2b40::4:6f']]
var_dump(IP::filterIPs([
    '127.0.0.1',
    '2a0a:2b40::4:60',
    '255.255.255.255',
    '2a0a:2b40::4:6f',
    '256.256.256.256'
], 6));
echo PHP_EOL;