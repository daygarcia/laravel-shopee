# Mercado Livre Laravel

<h4>A package to connect to Shopee API</h4>

## Requirements

PHP 8 and later

## Installation & Usage

### Composer

To install via [composer](http://getcomposer.org/):

```
composer require daygarcia/laravel-shopee
```

## Setup

The `Configuration` constructor takes a single argument: an array containing all configuration needed to connect to Mercado Livre API:

```php
<?php

// Still under development

```

The access_token returned last for 6 hours.

Getter and setter methods are available for the `Configuration` class. You can directly get and set `pending insert`

Alternatively, if you are managing your token by yourself, you dont need request a new token every single API call. You can just pass the token as a value in `Configuration` instance:

```php
<?php

use Illuminate\Http\Request;

...

$config = new Configuration([
    'access_token' => 'APP_USR-fafafafafafa...',
]);


```

## Example

```php
<?php

use LaravelShopee\Configuration;

...

public function index(Request $request)
{

}


```

## Pending add URLs
