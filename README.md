# NuSOAP for PHP 5.4 - 7.1

[![Downloads total](https://img.shields.io/packagist/dt/ne0bot/nusoap.svg?style=flat-square)](https://packagist.org/packages/ne0bot/nusoap)
[![Latest stable](https://img.shields.io/packagist/v/ne0bot/nusoap.svg?style=flat-square)](https://packagist.org/packages/ne0bot/nusoap)

Fork of NuSOAP fixed for PHP 5.4, 5.5, 5.6, 7.0 and 7.1 (tested).

All credits belongs to official author(s): http://nusoap.sourceforge.net.

## Discussion / Help

[![Join the chat](https://img.shields.io/gitter/room/econea/econea.svg?style=flat-square)](http://bit.ly/ecogitter)

## Install
```sh
$ composer require econea/nusoap
```

## Usage

```php
// Config
$client = new nusoap_client('example.com/api/v1', 'wsdl');
$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = FALSE;

// Calls
$result = $client->call($action, $data);
```
