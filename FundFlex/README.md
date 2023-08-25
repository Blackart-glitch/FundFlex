<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Complete All steps

## installation guide
### 1. Install Xampp
#### Download Xampp from [here](https://www.apachefriends.org/download.html)

### 2. Install Composer Gloabally
#### Download Composer from [here](https://getcomposer.org/download/)

### 3. Install Git Globally if you don't have it
#### Download Git from [here](https://git-scm.com/downloads)

### 4. Install Node.js (RECOMMENDED TO INSTALL GLOBALLY)
#### Download Node.js from [here](https://nodejs.org/en/download/)

### 5. Install Laravel
#### Open your terminal and run the following command
```bash
composer global require laravel/installer
```
#### Then run the following command to check if laravel is installed
```bash     
laravel --version
```
### 6. Clone the project from github repo:
#### if you are using SSH, 
 - Add your SSH key to your github account (Read here how to add)[https://docs.github.com/en/authentication/connecting-to-github-with-ssh/adding-a-new-ssh-key-to-your-github-account]
 - Then clone your repository in your Xampp *Htdocs* Folder
```bash
git clone git@github.com:Blackart-glitch/Fund-wallet-web-app.git
```
#### if you are using HTTPS
 - clone your repository in your Xampp *Htdocs* Folder
```bash
git clone https://github.com/Blackart-glitch/Fund-wallet-web-app.git
```
 - Note: you will be asked to enter your github username and password everytime you try to push to the repo

Read more about cloning [here](https://docs.github.com/en/repositories/creating-and-managing-repositories/cloning-a-repository)

### 7. cd into the project folder
```bash
cd Fund-wallet-web-app
```
### 8. Install all the dependencies
```bash
composer install
```

### 9. Install node dependencies
```bash
npm install
```

### 10. Create a database in your phpmyadmin
 - Name: fundflex

#### if your username is root and password is empty, you can skip this step
 - Open the .env file in the project folder and change the following lines to your database username and password
 - Change the following lines to your database username and password
```bash     
DB_DATABASE=fundflex
DB_USERNAME=YOUR_USERNAME
DB_PASSWORD=YOUR_PASSWORD
```
### 11. Generate a key for the project
```bash
php artisan key:generate
```

### 12. Migrate the database only after step 9 is complete
```bash
php artisan migrate
```

### 13. Run the project
```bash
php artisan serve
```
### if the setup is successful, you should see this in your terminal
```bash
Starting Laravel development server: http://
```



