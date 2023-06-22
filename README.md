# KenCalander
Calander Json and view, timetable coming soon

first 
copy down in your composer.json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/hnineiphyu-128/KenCalander"
    }
]

And then, the updated composer.json file should look as follows:

{
    "name": "laravel/laravel",
    "type": "project",
    "description": "The Laravel Framework.",
    "keywords": ["framework", "laravel"],
    "license": "MIT",
    // here you go
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/hnineiphyu-128/KenCalander"
        }
    ],
    "require": {
        "php": "^7.3|^8.0",
        "fruitcake/laravel-cors": "^2.0",
        "guzzlehttp/guzzle": "^7.0.1",
        "laravel/framework": "^8.75",
        "laravel/sanctum": "^2.11",
        "laravel/tinker": "^2.5"
    },
    "require-dev": {
        "facade/ignition": "^2.5",
        "fakerphp/faker": "^1.9.1",
        "laravel/sail": "^1.0.1",
        "mockery/mockery": "^1.4.4",
        "nunomaduro/collision": "^5.10",
        "phpunit/phpunit": "^9.5.10"
    },
    // ... so on
}

Now composer will also look into this repository for any installable package. Execute the following command to install the package:

composer require ken/calendar

As you can see, the package has been installed successfully. Now, open the config/app.php file and scroll down to the providers array. In that array, there should be a section for the package service providers. Add the following line of code in that section:

/*
 * Package Service Providers...
 */
Ken\Calendar\CalendarServiceProvider::class,

And finally Now, open the Kernal.php file and scroll down to the routeMiddleware. In that array, there should be a section for the package services class. Add the following line of code in that section:

/*
 * The application's route middleware.
 *
 * These middleware may be assigned to groups or used individually.
 *
 */
'CalendarService' => \Ken\Calendar\CalendarService::class,

Conclusion
I would like to thank you for the time you've spent reading this article. I hope you've enjoyed it

