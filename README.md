# laraveleton-api
## Laravel demo api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nwidart/laravel-modules.svg?style=flat-square)](https://packagist.org/packages/nwidart/laravel-modules)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/nWidart/laravel-modules/master.svg?style=flat-square)](https://travis-ci.org/nWidart/laravel-modules)
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/nWidart/laravel-modules.svg?maxAge=86400&style=flat-square)](https://scrutinizer-ci.com/g/nWidart/laravel-modules/?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/nWidart/laravel-modules.svg?style=flat-square)](https://scrutinizer-ci.com/g/nWidart/laravel-modules)
[![Total Downloads](https://img.shields.io/packagist/dt/nwidart/laravel-modules.svg?style=flat-square)](https://packagist.org/packages/nwidart/laravel-modules)

## Install

To install through Composer, by run the following command:

``` bash
git clone https://github.com/yarscript/laraveleton-api.git
```

``` bash
composer install
```

### Autoloading

<hr>

### root composer.json autoload

By default, the App lovated at Core packagee so fill the vendor path:

``` json
{
    "autoload": {
        "classmap": [
            "database/seeders",
            "database/factories"
        ],
        "psr-4": {
            "App\\": "vendor/yarscript/laraveleton-core/src"
        }
    },

}
```

<hr>

### packages autoloading

<p>All the packages includes src/composer.json depeendencies file so we need to put them at the "require" as dependencies </p>

``` json
{
    "require": {
        /** ... */
        "yarscript/laraveleton-core": "*",
        "yarscript/laraveleton-api": "*",
        "yarscript/laraveleton-dashboard": "*",
        "yarscript/laraveleton-organisation": "*",
        "yarscript/laraveleton-project": "*",
        "yarscript/laraveleton-serviceplan": "*",
        "yarscript/laraveleton-task": "*",
        "yarscript/laraveleton-user": "*"
    },
}
```


## Credits

- [YAro Script](https://github.com/yarscript)



## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
