# Laravel Enumerable Eloquent Models
[![Build Status](https://travis-ci.org/mindtwo/laravel-enumerable.svg?branch=master)](https://travis-ci.org/mindtwo/laravel-enumerable)
[![StyleCI](https://styleci.io/repos/160328535/shield)](https://styleci.io/repos/160328535)
[![Quality Score](https://img.shields.io/scrutinizer/g/mindtwo/laravel-enumerable.svg?style=flat-square)](https://scrutinizer-ci.com/g/mindtwo/laravel-enumerable)
[![Latest Stable Version](https://poser.pugx.org/mindtwo/laravel-enumerable/v/stable)](https://packagist.org/packages/mindtwo/laravel-enumerable)
[![Total Downloads](https://poser.pugx.org/mindtwo/laravel-enumerable/downloads)](https://packagist.org/packages/mindtwo/laravel-enumerable)
[![License](https://poser.pugx.org/mindtwo/laravel-enumerable/license)](https://packagist.org/packages/mindtwo/laravel-enumerable)

## Installation

You can install the package via composer:

```bash
composer require mindtwo/laravel-enumerable
```

## How to use?

### Setting up enumerable objects

This package based on [BenSampo/laravel-enum](https://github.com/BenSampo/laravel-enum). 
Take a look at its [Documentation](https://sampo.co.uk/blog/using-enums-in-laravel) to set 
up your enumerable objects.

### Prepare eloquent model
There are two ways to use this package. The simplest way is to extend the 
EnumerableModel which is shipped with this package.

```php
namespace example;

use mindtwo\LaravelEnumerable\Models\EnumerableModel

class exampleModel extends EnumerableModel
{
}
```

If you prefer, you can directly use the Enumerable trait in your models. Be sure to
implement the EnumerableInterface, too.

```php
namespace example;

use Illuminate\Database\Eloquent\Model;
use mindtwo\LaravelEnumerable\Interfaces\EnumInterface;
use mindtwo\LaravelEnumerable\Models\Traits\Enumerable;


class exampleModel extends Model implements EnumInterface
{
    use Enumerable;
}
```

### Configure eloquent model

To configure enumerable attributes simply set up a property named 'enums' as array.
The key contains the attribute name. The value is set to the enumerable class name 
you like to use for that attribute.

```php
namespace example;

use mindtwo\LaravelEnumerable\Models\EnumerableModel

class exampleModel extends EnumerableModel
{
    $enums = [
        'examle_attribute' => ExampleEnum::class
    ];
}
```

Now you can use Laravel's regular attribute set and fill functions to 
set the attribute value. If the value is not configured in the given enum object,
an InvalidEnumValueException is thrown. 


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@mindtwo.de instead of using the issue tracker.

## Credits

- [mindtwo GmbH](https://github.com/mindtwo)
- [All Other Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
 
