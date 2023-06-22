# KenCalander
Calander Json and view, timetable coming soon <br />
<br />
first <br />
copy down in your composer.json<br />
"repositories": [<br />
    {<br />
        "type": "vcs",<br />
        "url": "https://github.com/hnineiphyu-128/KenCalander"<br />
    }<br />
]<br />
<br />
And then, the updated composer.json file should look as follows:<br />
<br />
{<br />
    "name": "laravel/laravel",<br />
    "type": "project",<br />
    "description": "The Laravel Framework.",<br />
    "keywords": ["framework", "laravel"],<br />
    "license": "MIT",<br />
    // here you go<br />
    "repositories": [<br />
        {<br />
            "type": "vcs",<br />
            "url": "https://github.com/hnineiphyu-128/KenCalander"<br />
        }<br />
    ],<br />
    // ... so on<br />
}<br />
<br />
Now composer will also look into this repository for any installable package. Execute the following command to install the package:<br />
<br />
composer require ken/calendar<br />
<br />
As you can see, the package has been installed successfully. Now, open the config/app.php file and scroll down to the providers array. In that array, there should be a section for the package service providers. Add the following line of code in that section:<br />
<br />
/*<br />
 * Package Service Providers...<br />
 */<br />
Ken\Calendar\CalendarServiceProvider::class,<br />
<br />
And finally Now, open the Kernal.php file and scroll down to the routeMiddleware. In that array, there should be a section for the package services class. Add the following line of code in that section:<br />
<br />
/*<br />
 * The application's route middleware.<br />
 *<br />
 * These middleware may be assigned to groups or used individually.<br />
 *<br />
 */<br />
'CalendarService' => \Ken\Calendar\CalendarService::class,<br />
<br />
Conclusion<br />
I would like to thank you for the time you've spent reading this article. I hope you've enjoyed it<br />

