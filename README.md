DATE CSE HELPERS
=======

The helpers allows you to manipulating network IP addresses (IPv4 and IPv6).

Project repository: https://github.com/cs-eliseev/helpers-ip

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


## License

See the [LICENSE.md](https://github.com/cs-eliseev/helpers-ip/blob/master/LICENSE.md) file for licensing details.
