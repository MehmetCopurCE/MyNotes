# MyNotes
<img src="assets/logos/mynotes.png" width="200"> 

**MyNotes** is a simple and functional note-taking application developed with `PHP`. This project was created to learn PHP backend development and gain experience with `REST API` usage. Users can easily add, edit, delete, and list notes through this application. A modern PHP development approach is adopted using the Composer package management system and the Pest framework for testing.

## Technologies and Tools Used
- **PHP**: Backend development language
- **Composer**: Dependency management for PHP
- **Pest**: Test framework for PHP applications
- **MySQL**: Database management system
- **REST API**: API structure used for note operations within the application.
- **HTML, CSS, JavaScript**: Frontend development languages
- **Bootstrap**: Frontend framework for designing responsive websites

## Project Structure

```
MyNotes
├── assets
│   ├── images
│   └── logos
├── Core
│   ├── Middleware
│   ├── Router.php
│   └── Validator.php
│   └── Database.php
├── Http
│   ├── Controllers
│   ├── forms
├── public
│   └── index.php
├── tests
│   ├── Feature
│   └── Unit
├── vendor
├── views
├── .gitignore
├── bootstrap.php
├── composer.json
├── composer.lock
├── config.php
├── README.md
└── routes.php
```

## Router Structure
This project uses a `Router` class to direct HTTP requests to the appropriate controllers. This class includes methods necessary for defining and processing routes.

### **Router.php**
The `Router.php` file contains the class that provides routing functionality. Here are its main functions:
- **Route Definition**: You can define routes using the `add`, `get`, `post`, `put`, `patch`, and `delete` methods.
- **Middleware Management**: You can add a specific middleware to a route using the `only` method.
- **Request Routing**: The `route` method calls the controller based on a specific URI and HTTP method.
- **Error Handling**: The `abort` method displays a 404 error page for undefined routes.

```php
<?php

namespace Core;

use Core\Middleware\Middleware;

class Router {
    // ...
}
```

### **Routes**
Routes are defined in the `routes.php` file, and each route specifies which controller will be called with which HTTP method. Below are some example routes:

```php
$router->get('/', 'index.php');                          // Home page
$router->get('/about', 'about.php');                     // About page
$router->get('/notes', 'notes/index.php')->only('auth');  // Notes page
$router->get('/notes/create', 'notes/create.php')->only('auth'); // Note creation page
$router->post('/notes/create', 'notes/create.php')->only('auth'); // Add a new note
$router->get('/note', 'notes/show.php')->only('auth');    // Show a specific note
$router->patch('/note', 'notes/update.php')->only('auth'); // Update a specific note
$router->delete('/note/delete', 'notes/delete.php')->only('auth'); // Delete a specific note
$router->get('/contact', 'contact.php');                  // Contact page
$router->get('/login', 'session/create.php')->only('guest'); // Login page
$router->post('/login', 'session/store.php')->only('guest'); // Login process
$router->delete('/logout', 'session/destroy.php')->only('auth'); // Logout process
```

### Explanations:
- **Route Definition**: The `only` method allows only specific user roles (e.g., `auth` or `guest`) to access certain routes.
- **HTTP Methods**: Different HTTP methods (`GET`, `POST`, `PUT`, `DELETE`, `PATCH`) are used for CRUD (Create, Read, Update, Delete) operations.


**Example Usage:** When users try to access the `/notes` route, they will be authenticated by the `auth` middleware. If the user is logged in, the notes will be listed. Otherwise, an appropriate error message will be displayed.

## Additional Features
- **User Registration and Login**: Users can create an account and log in.
- **Note Management**: Note addition, editing, deletion, and listing operations are performed using a REST API.
- **Simple and Functional Interface**: A user-friendly interface provides easy navigation.
- **MySQL Database**: Notes are stored in a MySQL database.
- **Security**: User passwords are hashed for secure storage.
- **Tests**: Tests are written using the Pest test framework.
- **REST API**: A REST API is used for note operations.
- **Middleware**: Access control is implemented for routes based on user roles.
- **Error Handling**: A 404 error page is displayed for undefined routes.
- **Session Management**: User sessions are managed using PHP sessions.
- **Clean Code**: The codebase follows PHP standards and is readable and well-organized.
- **MVC**: The Model-View-Controller architecture separates code into different layers.
- **Composer**: Composer is used for managing PHP dependencies.
- **PHP 7.4**: Developed to be compatible with PHP 7.4 and higher versions.
- **Modern PHP**: Developed using current PHP development techniques and standards.

## Installation and Usage
To run the project on your local machine, you can follow the steps below.

### Requirements
- [PHP](https://www.php.net/) 7.4 or higher
- [Mysql](https://www.mysql.com/) database
- [Composer](https://getcomposer.org/) package manager
- Database management tool such as [Mysql Workbench](https://www.mysql.com/products/workbench/)
- [Pest](https://pestphp.com/) test framework
- Web server (e.g., Apache, Nginx) or PHP's built-in server

<img src="assets/logos/php.png" width="100" style="margin-right: 20px;"><img src="assets/logos/mysql.png" width="140" style="margin-right: 20px; margin-bottom: 10px;"> <img src="assets/logos/composer.png" width="80" style="margin-right: 20px;"> <img src="assets/logos/workbench.png" width="80" style="margin-right: 20px;">  <img src="assets/logos/pest.png" width="130" style="margin-right: 20px;">

### Step 1: Clone the Repository

```bash
git clone https://github.com/MehmetCopurCE/MyNotes.git
cd MyNotes
```

### Step 2: Install Composer Dependencies
If Composer is not installed on your system, you can install it using the following commands:

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

After installation is complete, run the following command to install project dependencies:

```bash
composer install
```

### Step 3: Install Pest Test Framework
To install the Pest test framework, run the following command:

```bash
composer remove phpunit/phpunit
composer require pestphp/pest --dev --with-all-dependencies
```

### Step 4: Create Database Tables
This project is developed using pure PHP without Laravel or another framework. Therefore, there is no migrate command to automatically create database tables. You can use the following SQL commands to create tables:

#### 1) Create a Database
First, create a database. In this example, the database name is set to `PhpDemo`:
```sql
CREATE DATABASE PhpDemo;
USE PhpDemo;
```

#### 2) Create Tables
You can create the `users` and `notes` tables using the following SQL commands:

```sql
CREATE TABLE users (
                       user_id INT AUTO_INCREMENT PRIMARY KEY,
                       email VARCHAR(100) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE notes (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       body TEXT NOT NULL,
                       user_id INT,
                       created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
```

Note: The `ON DELETE CASCADE` clause ensures that all notes belonging to a user are automatically deleted when that user is deleted.

### Step 5: Update Database Connection
Open the `config.php` file and update the connection details as follows:

```php
    'database' => [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'PhpDemo',
        'user' => 'your_username',
        'password' => 'your_password'
    ]
```

### Step 6: Run the Application
You can use PHP's built-in server to run the application. To start the server, follow the steps below:

#### 1) PHP Built-in Server
Common method for Windows and macOS: <br> Run the following command to start PHP's built-in server:

```bash
php -S localhost:8000 -t public
```

This command starts the PHP built-in server with the `public` directory as the root directory. You can view your application by going to `http://localhost:8000` in your browser.

#### 2) Other Web Servers
- **XAMPP or WAMP (Windows)**:
    - [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](https://www.wampserver.com/en/), popular options for running PHP applications. These tools include the Apache server, providing more configuration options.
    - After installing XAMPP or WAMP, copy your project to the `htdocs` directory and run the application by going to `http://localhost/MyNotes/public` in your browser.

- **MAMP (Mac)**:
  - [MAMP](https://www.mamp.info/en/) is a popular Apache, MySQL, and PHP package for macOS. After installing MAMP, copy your project to the `htdocs` directory and run the application by going to `http://localhost:8888/MyNotes/public` in your browser.
  - The default port for MAMP is 8888. If you have changed the port, you can run the application in your browser by changing the port number.
  - For example, if the port number is 8889, you can run the application by going to `http://localhost:8889/MyNotes/public` in your browser.
  - Update the MySQL database connection details in the `config.php` file.
  - To update the MySQL connection details in the `config.php` file, edit the following lines:
  - ```php
    'database' => [
        'host' => 'localhost',
        'port' => '8889',
        'dbname' => 'PhpDemo',
        'user' => 'your_username',
        'password' => 'your_password'
    ]
    ```
    - The default username and password for MAMP are `root` and `root`, respectively.
    
### Step 7: Run Tests
To run the tests, use the following command:

```bash
./vendor/bin/pest
```

The Pest test framework will run the tests and display the results.


## Resources

I followed the following training course while developing this project:

- **Course Name**: [PHP For Beginners - Complete Laracasts Course](https://www.youtube.com/watch?v=fw5ObX8P6as&list=WL&ab_channel=Laracasts)
- **Instructor**: Jeffrey Way
- **Platform**: Laracasts
- **Duration**: 6 hours
- **Description**: This course covers PHP basics, including syntax, functions, classes, and object-oriented programming. It also covers more advanced topics such as Composer, testing, and Laravel.
- **Topics**: PHP basics, Composer, testing, Laravel, object-oriented programming, classes, functions, and more.


## Contact & Feedback

Feel free to share your ideas or suggestions about the project. You can reach me through the following channels:

<a href="https://www.linkedin.com/in/mehmet-copur/"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0bGEl9v47XieEtHyj0TqTr1tOXJmib-KHtw&s" height = "50"/></a> <a href="mailto:mhmtcpr120@gmail.com?"><img src="https://img.shields.io/badge/gmail-%23DD0031.svg?&style=for-the-badge&logo=gmail&logoColor=white" height = "50"/></a> <a href="https://medium.com/@mhmtcpr120/nette-dependency-injection-transient-scoped-ve-singleton-ya%C5%9Fam-d%C3%B6ng%C3%BCleri-aa9aa4f38193"><img src="https://miro.medium.com/v2/resize:fit:1400/1*RB1rxSK_TBmcC5D2PN30JA.png" height = "50"/></a>


Any feedback you give me is valuable and will help me make the project better.