# TecDoc Client PHP
A [TecDoc Webservice API](http://webservice.tecalliance.services) client written in PHP.

The DTO classes are generated with [xsd2php](https://github.com/goetas-webservices/xsd2php) using the 
[TecDoc SOAP XSD](http://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.soapEndpoint?xsd) as input.

This project is licensed under the terms of the GNU Lesser General Public License v3.0.

## Install
```shell script
composer require sbaumeister/tecdoc-client-php
```

## Usage
```php
<?php

use Baumeister\TecDocClient\Client;
use Baumeister\TecDocClient\Generated\GetAmBrands;

$client = new Client('API_KEY', 'PROVIDER_ID');
$params = (new GetAmBrands())
            ->setLang('de')
            ->setArticleCountry('de');
$response = $client->getAmBrands($params);
$brands = $response->getData();
```

## TODOs
- [ ] Better tests
- [ ] Add status table for implemented API functions to README
