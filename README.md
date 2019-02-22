IP CSE HELPERS
=======

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

**CSE Helpers projec:**
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-ip).

### Composer

Execute the following command to get the latest version of the package:
```shell
composer require cse/helpers-ip
```

Or file composer.json should include the following contents:
```
{
    "require": {
        "cse/helpers-ip": "*"
    }
}
```

### Git

Clone this repository locally:
```shell
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


## License

See the [LICENSE.md](https://github.com/cs-eliseev/helpers-ip/blob/master/LICENSE.md) file for licensing details.
