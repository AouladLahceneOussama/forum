<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Forum
This application is made using Laravel 9 and brezze startkit and livewire, The main idea of that FORUM is that the admin manage the questions and the responses of different users, in the otherside, the users can like/dislke and respond on the comments of the users.

# Requirements
- php >= 8
- Laravel = 9
 
# Instruction to install the application
```
git clone ...
cd project-manager
composer install
npm install
php artisan migrate
```
> Don't forget to copy the env file and enter a valid database name before migration.  
> After creating .env file please run this command to generate an application key 
```
php artisan key:generate
```

# usage
```
php artisan serve
npm run dev
```  
> Register to the application with 2 account, one with the partner role and the other with the user role, to test all the functionalities.

# Functionalities
- Crud the Questions.
- The users respond to the question without authentification.
- The responses are validated by the admin.
- The users can respond on the response of other uses and the same they need validation by admin to be seen.
- the users can Like / Dislike questions and responses.
