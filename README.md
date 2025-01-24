# Translation API Service

This project provides an API for managing translations with support for multiple locales and tags. It allows you to create, update, search, and export translations, as well as handle large datasets efficiently.

## Installation Instructions

### 1. Clone the Repository
Clone the repository to your local machine:

```bash
git clone https://github.com/your-repository-name/translation-api.git
cd translation-api

```

## Install Dependencies
Run Composer to install the required dependencies:

```bash
composer install
```

After composer installation, copy .env.example file to .env or run the following command

```bash
cp .env.example .env
```

Run the following command to generate the application key

```bash
php artisan key:generate
```

Update the .env file with your database credentials

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Run the migrations and seed the database with test data

```bash
php artisan migrate --seed
```

and then 

```bash
php artisan db:seed --class=TranslationSeeder
```

After successful commands a user should be created in the database with following credentials

```bash
email: test@example.com
password: 12345678
```

## API Endpoints
### Login

```bash
URL: POST /api/auth/login
Payload: {
    "email": "test@example.com",
    "password": "12345678"
}
Response Example: Bearee Token
```

### Create a Translation

```bash
URL: POST /api/translations
PAYLOAD: {
    "key": "greeting",
    "locale": "en",
    "content": "Hello",
    "tags": ["web"]
}
Authentication: Bearer Token
Response Example: {
    "id": 1,
    "key": "greeting",
    "locale": "en",
    "content": "Hello",
    "tags": ["web"]
}
```

### Update a Translation

```bash
URL: PUT /api/translations/{id}
PAYLOAD: {
    "key": "greeting",
    "locale": "en",
    "content": "Hi",
    "tags": ["mobile"]
}
Authentication: Bearer Token
Response Example: {
    "id": 1,
    "key": "greeting",
    "locale": "en",
    "content": "Hi",
    "tags": ["mobile"]
}
```

### Get a Translation by ID

```bash
URL: GET /api/translations/{id}
PAYLOAD: None
Authentication: Bearer Token
Response Example: {
    "id": 1,
    "key": "greeting",
    "locale": "en",
    "content": "Hello",
    "tags": ["web"]
}
```

### Search Translations

```bash
URL: GET /api/translations
Parameters:
    key (optional)
    locale (optional)
    tags (optional)
    content (optional)
Authentication: Bearer Token
Response Example: [
    {
        "id": 1,
        "key": "greeting",
        "locale": "en",
        "content": "Hello",
        "tags": ["web"]
    },
    {
        "id": 2,
        "key": "greeting",
        "locale": "fr",
        "content": "Bonjour",
        "tags": ["web"]
    }
]
```

### Export Translations

```bash
URL: GET /api/translations/export
Parameters:
    locale (optional)
    tags (optional)
Authentication: Bearer Token
Response Example: {
    "en": {
        "greeting": "Hello"
    },
    "fr": {
        "greeting": "Bonjour"
    }
}
```

