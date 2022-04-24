# Laravel-Subscribe
Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required)

#Run the Following Commands
```
composer install
```
create database called "subscribeplatform"

then run this command 

```
php artisan migrate

php artisan db:seed
```

For sending emails to users run the following command 

```
 php artisan remainder:emails
```
