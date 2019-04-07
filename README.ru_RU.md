[English](https://github.com/cs-eliseev/helpers-ip/blob/master/README.md) | Русский

IP CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-ip.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-ip)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-ip.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-ip)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-ip.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-ip/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-ip.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-ip)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-ip)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-ip.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-ip/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-ip.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-ip/archive/master.zip)

Данная библиотек позволяет удобно работать с IP адресами (IPv4 и IPv6).

Репозиторий проекта: https://github.com/cs-eliseev/helpers-ip

**DEMO**
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


## Описание проекта

CSE HELPERS - это набор из небольших библиотек с простыми функциями написанных на PHP специально для вас.

Несмотря на повсеместное использование PHP в качестве основного языка для WEB разработки, его зачастую недостаточно. IP CSE HELPERS, позволит вам довольно просто работать с IP адресами (IPv4 и IPv6).

CSE HELPERS создан для быстрой разработки веб-приложений.

**Список библиотек CSE Helpers:**
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

Ниже представлена информация об установке и перечне команд с примерами их использования.


## Установка

Самая последняя версия проекта доступна [здесь](https://github.com/cs-eliseev/helpers-ip).

### Composer

Чтобы установить последнюю версию проекта, выполните следующую команду в терминале:
```shell
composer require cse/helpers-ip
```

Или добавьте следующее содержимое в файл composer.json:
```json
{
    "require": {
        "cse/helpers-ip": "*"
    }
}
```

### Git

Добавить этот репозиторий локально можно следующим образом:
```shell
git clone https://github.com/cs-eliseev/helpers-ip.git
```

### Скачать

[Скачать последнюю версию проекта можно здесь](https://github.com/cs-eliseev/helpers-ip/archive/master.zip).

## Использование

Данный класс использует статические методы, которые удобно использовать в любом проекте. Смотрите пример [examples-ip.php](https://github.com/cs-eliseev/helpers-ip/blob/master/examples/examples-ip.php).


**Получить реальный IP адрес**

Пример:
```php
IP::getRealIP();
// xxx.xxx.xxx.xxx
```

**Удалить подмаску IPv6**

Пример:
```php
IP::removeSubnetMaskIPv6('2a0a:2b40::4:60/124');
// 2a0a:2b40::4:60
```

**Проверить что адрес IPv4**

Пример:
```php
IP::isIPv4('127.0.0.1');
// true
```

Проверить IPv6:
```php
IP::isIPv4('2a0a:2b40::4:60');
// false
```

Проверить нереальный IP адрес:
```php
IP::isIPv4('256.256.256');
// false
```

**Проверить что адрес  IPv6**

Пример:
```php
IP::isIPv6('2a0a:2b40::4:60');
// true
```

Проверить нулевой адрес:
```php
IP::isIPv6('::');
// true
```

Проверить localhost IPv6:
```php
IP::isIPv6('::1');
// true
IP::isIPv6('0:0:0:0:0:0:0:1');
// true
```

Проверить IPv4:
```php
IP::isIPv6('127.0.0.1');
// false
```

Проверить нереальный IP адрес:
```php
IP::isIPv6(':');
// false
```

**Получить версию IP адреса**

Пример:
```php
IP::getVersionIP('::1');
// 6
```

Получить версию IPv4:
```php
IP::getVersionIP('127.0.0.1');
// 4
```

Получить версию IPv6:
```php
IP::getVersionIP('0:0:0:0:0:0:0:1');
// 6
```

Получить версию нереального IP адреса:
```php
IP::getVersionIP('256.256.256.256');
// null
```

**Проверка IP адреса**

Пример:
```php
IP::isIP('::1');
// true
```

Проверить IPv4:
```php
IP::isIP('127.0.0.1');
// true
```

Проверить IPv6:
```php
IP::isIP('0:0:0:0:0:0:0:1');
// true
```

Проверить нереальный IP адрес:
```php
IP::isIP('256.256.256.256');
// false
```

**Получить подсети для IPv6**

Пример:
```php
IP::getRangeIPv6('2a0a:2b40::4:60/124');
// ['2a0a:2b40::4:60', '2a0a:2b40::4:6f']
```

**Фильтрация IP адресов**

Пример:
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

Пример для пустых версий IP:
```php
IP::filterIPs([
    '127.0.0.1',
    '255.255.255.255',
    '256.256.256.256'
]);
// [4 => ['127.0.0.1', '255.255.255.255'], 6 => []]
```

Фильтрация IPv4 адресов:
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

Фильтрация IPv6 адресов:
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

**Получить первый IP адрес из списка по его версии**

Пример:
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

Пример получения первого IPv6 адреса:
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


## Тестирование и покрытие кода

PHPUnit используется для модульного тестирования. Данные тесты гарантируют, что методы класса выполняют свою задачу.

Подробную документацию по PHPUnit можно найти по адресу: https://phpunit.de/documentation.html.

Чтобы запустить тесты выполните:
```bash
phpunit PATH/TO/PROJECT/tests/
```

Чтобы сформировать отчет о покрытии тестами кода, необходимо выполнить следующую команду:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Чтобы использовать настройки по умолчанию, достаточно выполнить:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## Вклад в общее дело

Вы можите поддержать данный проект [здесь](https://www.paypal.me/cseliseev/10usd). 
Вы также можете помочь, внеся свой вклад в проект или сообщив об ошибках.
Даже высказывать свои предложения по функциям - это здорово. Все, что поможет, высоко ценится.


## Лицензия

IP CSE HELPERS это PHP-библиотека с открытым исходным кодом распространяемая по лицензии MIT. Для получения более подробной информации, пожалуйста, ознакомьтесь с [лицензионным файлом](https://github.com/cs-eliseev/helpers-ip/blob/master/LICENSE.md).

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)