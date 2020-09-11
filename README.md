# ValidateIt

A Simple Validation Class for PHP

## Install

Via composer

```bash
$ composer require plsankar/validateit:1.0
```

## Usage

```php
use \plsankar\ValidateIt\ValidateIt;

$data = array(
    "name" => "Some Guy",
    "email" => "someguy@google.com",
    "phone" => "1234567890",
    "role" => "1",
    "address" => "In 3rd Planet",
    "zipcode" => "000000"
);

$rules = [
    "name",
    "email:EMAIL",
    "phone:PHONE",
    "role:INT"
];

ValidateIt::isValid($data, $rules) // true or false

echo "isvalid: " . (ValidateIt::isValid($data, $rules) ? "ok" : "not");
```
