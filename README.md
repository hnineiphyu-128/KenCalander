# KenCalander
Calander Json and view, timetable coming soon <br />
<br />
first <br />
copy down in your composer.json<br />
"repositories": [<br />
&nbsp;{<br />
&nbsp;&nbsp;"type": "vcs",<br />
&nbsp;&nbsp;"url": "https://github.com/hnineiphyu-128/KenCalander"<br />
&nbsp; }<br />
]<br />
<br />
And then, the updated composer.json file should look as follows:<br />
<br />
{<br />
&nbsp;"name": "laravel/laravel",<br />
&nbsp;"type": "project",<br />
&nbsp;"description": "The Laravel Framework.",<br />
&nbsp;"keywords": ["framework", "laravel"],<br />
&nbsp;"license": "MIT",<br />
&nbsp;// here you go<br />
&nbsp;"repositories": [<br />
&nbsp;&nbsp;{<br />
&nbsp;&nbsp;&nbsp;"type": "vcs",<br />
&nbsp;&nbsp;&nbsp; "url": "https://github.com/hnineiphyu-128/KenCalander"<br />
&nbsp;&nbsp;}<br />
&nbsp;],<br />
&nbsp;// ... so on<br />
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
Kennebula\Calendar\CalendarServiceProvider::class,<br />
<br />
And finally Now, open the Kernal.php file and scroll down to the routeMiddleware. In that array, there should be a section for the package services class. Add the following line of code in that section:<br />
<br />
/*<br />
 * The application's route middleware.<br />
 *<br />
 * These middleware may be assigned to groups or used individually.<br />
 *<br />
 */<br />
'CalendarService' => \Kennebula\Calendar\CalendarService::class,<br />
<br />
Conclusion<br />
I would like to thank you for the time you've spent reading this article. I hope you've enjoyed it<br />
<br />
<br />
Using Tultorial<br />
<br />
Calling for calander json<br />
\$your_year_month='2023-06';<br />
CalendarService::getcalendarjson($your_year_month);<br />
<br />
Calling for calander view<br />
getcalendar/your_year_month<br />
<br />
your year month format is must be 'yyyy-mm'.<br />

