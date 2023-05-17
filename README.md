# Kerung

Kerung is an E-commerce Platform Created by Khem Raj Regmi which is intially based on 5.3 version of Laravel which is 
developed more that 5 years ago but the concept of Repository Design Pattern is still applicable as it was. :) :)

#### NOTE: make sure the business logic are built in /kerung/Service
The service object is the middleman for communicating between the Repo and the controllers, Repo will grab the data
objects, then service will work on top of the objects then pass the processed data objects to controller which then
render in view.

SETUP GUIDES
composer update
Complete Your .env file setup
php artisan migrate
php artisan db:seed





