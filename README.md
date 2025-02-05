# Innoscripta News API

## Overview

The **Innoscripta News API** is a backend service designed for a news aggregator application. It pulls articles from
multiple sources, such as The Guardian, The New York Times, and NewsAPI.org, and provides an API for frontend
consumption.

## Features

- **Article Search & Filtering**
    - Search articles by keyword from Third party APIs
    - Filter results by date, category, and source
- **User Preferences System**
    - Recommends articles based on user search history
- **API Documentation**
    - Available at `/request-docs`

## Technologies

- Laravel11
- PHP8.4
- MySQL8

## Installation

```bash
# Clone the repository
git clone https://github.com/amiiiiink/innoscripta-news-api.git
cd innoscripta-news-api
```

### Using Docker

```bash
# Build and start containers
docker-compose up --build -d
```

```bash
# For subsequent runs
make up   
```

```bash
# OR
docker-compose up -d
```

```bash
# To stop the project
make down  
```

```bash
# OR
docker-compose down
```

### After Project serve on localhost:8000

 Run below commands on Docker bash.

1. **Migrate and Seed the Database**
   ```bash
   php artisan migrate
   ```

2. **Start Queue Worker**
   ```bash
   php artisan queue:work
   ```
3. **Seed Additional Data**
   ```bash
   php artisan tinker
   App\Models\User::factory()->create();
   ```
   
The test user in api/auth/token is : 

 username: amin@gmail.com
 password: password

4**Seed Additional Data (Optional in case you want to have 100 articles to test without fetching from APIs)**
   ```bash
   php artisan tinker
    App\Models\Article::factory()->count(100)->create();;
   ```
  

 **Update Environment Variables**
   Edit your `.env` file and add API keys:
   ```ini
   GUARDIAN_API_KEY=
   NEWS_API_API_KEY=
   NEW_YORK_API_KEY=
   ```
   
   and

  ```ini
     DB_CONNECTION=mysql
     DB_HOST=mysql
     DB_PORT=3306
     DB_DATABASE=innoscripta
     DB_USERNAME=root
     DB_PASSWORD=password
   ```

## Usage

API documentation is available at:

```
http://localhost:8000/request-docs
```

## Development Guide

To add a new service:

- Register it in `NewsServiceProvider`
- Implement the logic in `Services/ThirdParties`

## Contact

For inquiries, feel free to reach out:
📧 [karimi66.amin@gmail.com](mailto:karimi66.amin@gmail.com)

