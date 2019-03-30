IP CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-ip.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-ip)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-ip.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-ip)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-ip)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-ip.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-ip/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-ip.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-ip/archive/master.zip)

The helpers allows you to manipulating network IP addresses (IPv4 and IPv6).

Project repository: https://github.com/cs-eliseev/helpers-ip

```php
$ip = IP::getRealIP();
if (IP::isIP($ip)) {
    switch (true) {
        case IP::isIPv4($ip):
            break;
        case IP::isIPv6($ip):
            $ip = IP::removeSubnetMaskIPv6($ip);
            $ip = IP::getRangeIPv6($ip);
            $ip = IP::getFirstIPByVersion($ip);
            break;
    }
    $version = IP::getVersionIP($ip);
}
```

***

## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. IP CSE HELPERS for manipulating network IP addresses (IPv4 and IPv6).

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers project:**
* [Array CSE helpers](https://github.com/cs-eliseev/helpers-arrays)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Math Converter CSE helpers](https://github.com/cs-eliseev/helpers-math-converter)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-ip).

### Composer

Execute the following command to get the latest version of the package:
```bash
composer require cse/helpers-ip
```

Or file composer.json should include the following contents:
```json
{
    "require": {
        "cse/helpers-ip": "*"
    }
}
```

### Git

Clone this repository locally:
```bash
git clone https://github.com/cs-eliseev/helpers-ip.git
```

### Download

[Download the latest release here](https://github.com/cs-eliseev/helpers-ip/archive/master.zip).

## Usage

The class consists of static methods that are conveniently used in any project. See example [examples-ip.php](https://github.com/cs-eliseev/helpers-ip/blob/master/examples/examples-ip.php).

**Get real IP address**

Example:
```php
IP::getRealIP();
// xxx.xxx.xxx.xxx
```

**Remove subnet mask IPv6**

Example:
```php
IP::removeSubnetMaskIPv6('2a0a:2b40::4:60/124');
// 2a0a:2b40::4:60
```

**Check is IPv4 address**

Example:
```php
IP::isIPv4('127.0.0.1');
// true
```

Check is IPv6:
```php
IP::isIPv4('2a0a:2b40::4:60');
// false
```

Check is not IP:
```php
IP::isIPv4('256.256.256');
// false
```

**Check is IPv6 address**

Example:
```php
IP::isIPv6('2a0a:2b40::4:60');
// true
```

Check null:
```php
IP::isIPv6('::');
// true
```

Check localhost IPv6:
```php
IP::isIPv6('::1');
// true
IP::isIPv6('0:0:0:0:0:0:0:1');
// true
```

Check is IPv4:
```php
IP::isIPv6('127.0.0.1');
// false
```

Check is not IP:
```php
IP::isIPv6(':');
// false
```

**Get version IP address**

Example:
```php
IP::getVersionIP('::1');
// 6
```

Get versin IPv4:
```php
IP::getVersionIP('127.0.0.1');
// 4
```

Get versin IPv6:
```php
IP::getVersionIP('0:0:0:0:0:0:0:1');
// 6
```

Get versin in not IP:
```php
IP::getVersionIP('256.256.256.256');
// null
```

**Is IP address**

Example:
```php
IP::isIP('::1');
// true
```

Check versin IPv4:
```php
IP::isIP('127.0.0.1');
// true
```

Check versin IPv6:
```php
IP::isIP('0:0:0:0:0:0:0:1');
// true
```

Check versin in not IP:
```php
IP::isIP('256.256.256.256');
// false
```

**Get range IPv6 address**

Example:
```php
IP::getRangeIPv6('2a0a:2b40::4:60/124');
// ['2a0a:2b40::4:60', '2a0a:2b40::4:6f']
```

**Filter IPs address**

Example:
```php
IP::filterIPs([
    '127.0.0.1',
    '2a0a:2b40::4:60',
    '255.255.255.255',
    '2a0a:2b40::4:6f',
    '256.256.256.256'
]);
// [4 => ['127.0.0.1', '255.255.255.255'], 6 => ['2a0a:2b40::4:60', '2a0a:2b40::4:6f']]
```

Not data IP version:
```php
IP::filterIPs([
    '127.0.0.1',
    '255.255.255.255',
    '256.256.256.256'
]);
// [4 => ['127.0.0.1', '255.255.255.255'], 6 => []]
```

Filter IPv4 address:
```php
IP::filterIPs([
    '127.0.0.1',
    '2a0a:2b40::4:60',
    '255.255.255.255',
    '2a0a:2b40::4:6f',
    '256.256.256.256'
], 4);
// ['127.0.0.1', '255.255.255.255']
```

Filter IPv6 address:
```php
IP::filterIPs([
    '127.0.0.1',
    '2a0a:2b40::4:60',
    '255.255.255.255',
    '2a0a:2b40::4:6f',
    '256.256.256.256'
], 6);
// ['2a0a:2b40::4:60', '2a0a:2b40::4:6f']
```

**Get first IP by version**

Example:
```php
IP::getFirstIPByVersion([
    '256.256.256.256',
    '127.0.0.1',
    '2a0a:2b40::4:60',
    '255.255.255.255',
    '2a0a:2b40::4:6f',
    '256.256.256.256'
], 4);
// '127.0.0.1'
```

Get first IP by version 6:
```php
IP::getFirstIPByVersion([
    '256.256.256.256',
    '127.0.0.1',
    '2a0a:2b40::4:60',
    '255.255.255.255',
    '2a0a:2b40::4:6f'
], 6);
// '2a0a:2b40::4:60'
```


## Testing & Code Coverage

PHPUnit is used for unit testing. Unit tests ensure that class and methods does exactly what it is meant to do.

General PHPUnit documentation can be found at https://phpunit.de/documentation.html.

To run the PHPUnit unit tests, execute:
```bash
phpunit PATH/TO/PROJECT/tests/
```

If you want code coverage reports, use the following:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Used PHPUnit default config:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## License

The CSE HELPERS IP is open-source PHP library licensed under the MIT license. Please see [License File](https://github.com/cs-eliseev/helpers-ip/blob/master/LICENSE.md) for more information.

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)