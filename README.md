<p align="center">
<a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</a>
</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel Innoscripta Home Challenge

I have some features, such as:


- update read me road map


# Innoscripta API (case study)

Innoscripta App  is to build the backend functionality for
a news aggregator website that pulls articles from various sources and serves them to the
frontend application.
Data sources used were The Guardian, New York Times, and NewsAPI.org

## About Project

- Article search and filtering
    - Search for articles by keyword
    - Filter search results by date, category, and source
    -  user preferences system is automatically going based on each user search we can recommend his/her articles
  

To see front end document goto /request-docs


## Prerequisites

- Laravel11
- Php8.4
- Mysql

## Installation ( With Docker )



## Installation ( With out Docker )




1. **Migrate and Seed the Database**  
   Run the following command to set up the database structure and seed it with initial data:
   ```bash
   php artisan migrate 
   ```
2. **Update `.env` File**  
   After running the above commands, copy the generated `Client ID` and `Client Secret` from the output and update
   your `.env` file with the following variables:
   ```env
    GUARDIAN_API_KEY= 
    NEWS_API_API_KEY= 
    NEW_YORK_API_KEY=
   ```
   
3. Then run :
```bash
 php artisan queue:work
   ```
4. run 
```bash
 php artisan tinker
   ```
```bash
App\Models\User::factory()->create();
Article::factory()->count(100)->create();
```
## Usage

The application uses these endpoints 

`/article/aggregation`

## Development

To add new Service just add it NewsServiceProvider
and the concrete code into Services/Third parties 


## Contact

You can contact me at [karimi66.amin@gmail.com](karimi66.amin@gmail.com 'Amin Karimi')




