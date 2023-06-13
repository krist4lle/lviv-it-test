## Introduction

Test task for Lviv IT! Laravel package. It is Service which can get all records for the specified domain name.

## What I've done

I have created a small Laravel package. I have configured composer.json file. I src folder you can find Service Provider,
it binds my DNSServiceContract. DNSService can throw the Exception if function fails, if OK it returns array. Each record
maps to same structure by Strategy. Each record type has its own Strategy for mapping. I have made few unit tests.
I have checked data types and array keys after mapping.

## Local use

To check it locally you need to have php8.1 or higher, composer.

RUN: composer install

RUN: ./vendor/bin/phpunit tests/DNSServiceTest.php

## Installation

composer require krist4lle/lviv-it-test

Service will be registered in your app. Now you can inject it to any class by dependency injection.

## Usage
```php
use Krist4lle\DNSServiceContract;

class YourClass 
{

    public function __construct(
        private readonly DNSServiceContract $DNSService
    ) {
    }

    public function useService() {
        $records = $this->DNSService->getDNSRecords('google.com');
    }
}
```