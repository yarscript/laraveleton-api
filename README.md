<h1 align="center">laraveleton-api</h1>

<p align="center">:ninja: Laravel-based API demo app with packaging structure :ninja:</p>
<p align="center">
/** the following idea of packaging respresented in monolyte architecture so i don't cared some thins like migrations publishing  */
</p>

## Dependencies
```json
    "require": {
        "php": "^7.4|^8.0",
        "fideloper/proxy": "^4.4",
        "fruitcake/laravel-cors": "^1.0",
        "laravel/framework": "^8.0",
        "laravel/ui": "^3.1",
        "prettus/l5-repository": "^2.6",
        "tymon/jwt-auth": "^1.0.0",
        "guzzlehttp/guzzle": "^6.3",
        "yarscript/laraveleton-core": "*",
        "yarscript/laraveleton-api": "*",
        "yarscript/laraveleton-dashboard": "*",
        "yarscript/laraveleton-organisation": "*",
        "yarscript/laraveleton-project": "*",
        "yarscript/laraveleton-serviceplan": "*",
        "yarscript/laraveleton-task": "*",
        "yarscript/laraveleton-user": "*"
    },
    "require-dev": {
        "roave/security-advisories": "dev-latest",
        "fzaninotto/faker": "^1.9",
        "barryvdh/laravel-debugbar": "^3.1"
    },
```

## Install

To install through Composer, by run the following command:

``` bash
git clone https://github.com/yarscript/laraveleton-api.git
```

Then.. Deefault laravel deploy

## Autoloading



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


### packages autoloading

<p>All the packages includes src/composer.json depeendencies file so we need to put them at the "require" as dependencies </p>

``` json
{
    "require": {
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

<p>To let Compeser know about the local depeendencies we are useeing the following structure:</p>

``` json
    "repositories": [
        {
            "type": "path",
            "url": "packages/Yarscript/Core"
        },
        {
            "type": "path",
            "url": "packages/Yarscript/Api"
        },
        {
            "type": "path",
            "url": "packages/Yarscript/Dashboard"
        },
        {
            "type": "path",
            "url": "packages/Yarscript/Organisation"
        },
        {
            "type": "path",
            "url": "packages/Yarscript/Project"
        },
        {
            "type": "path",
            "url": "packages/Yarscript/ServicePlan"
        },
        {
            "type": "path",
            "url": "packages/Yarscript/Task"
        },
        {
            "type": "path",
            "url": "packages/Yarscript/User"
        }
    ],
```

<p>Finally, how the required package's dependency looks like</p>

``` json
{
    "name": "yarscript/laraveleton-core",
    "description": "description",
    "minimum-stability": "stable",
    "license": "MIT",
    "authors": [
        {
            "name": "yar",
            "email": "yar.yason@gmail.com"
        }
    ],
    "require": {
    },
    "autoload": {
        "psr-4": {
            "Yarscript\\Core\\": "src/"
        }
    },
    "extra": {
        "laravel": {
            "providers": [
                "Yarscript\\Core\\Providers\\CoreServiceProvider"
            ],
            "aliases": {}
        }
    }
}
```

***Conclusion***

> ### So this stuff let us to build TRUE Modular Lavael's application structure. Clear with it, fine. Fron now, my dear reader, you are completeley open to dive into the true DDD with Laravel. Please enjoy to use it!

## Credits

- [YAro Script](https://github.com/yarscript)



## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.



 🇺🇦 MADE IN UKRAINE 🇺🇦
 
