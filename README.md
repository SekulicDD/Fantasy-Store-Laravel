# Fantasy Store
> An online e-commerce web store built using Laravel and JS.  
> 
> ![Fantasy store banner](public/assets/img/fantasyStore.jpg)

## Table of Contents
- [Fantasy Store](#fantasy-store)
  - [Table of Contents](#table-of-contents)
  - [Technologies Used](#technologies-used)
  - [Features](#features)
  - [Setup locally](#setup-locally)
    - [Clone repository](#clone-repository)
    - [Download dependencies](#download-dependencies)
    - [Generate database](#generate-database)
    - [Run the app](#run-the-app)
    - [Credentials](#credentials)

## Technologies Used
- Laravel
- JQuery
- Bootstrap

## Features
This website has all the required functions as an e-commerce web store. Here are the available features.
- Pages - Home, Products, Contact.
- Membership - Admin, guest user and authorized user.
- User Authentication - Register, login for website and admin panel.

Role based functionalities:
- Guest functions - View, search, filter, sort products.
- User functions - Shopping cart, comments.
- Admin functions - Create, update, delete data.

## Setup locally
### Clone repository
    git clone https://github.com/SekulicDD/Fantasy-Store-Laravel 
### Download dependencies
    npm install 
### Generate database 
    php artisan migrate:fresh --seed  
### Run the app 
    php artisan serve
### Credentials
- Admin:  
Email: admin@gmail.com Password: admin123  
- User:  
Email: pera@gmail.com Password: pera123




