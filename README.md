# Students REST API (Laravel)

A small REST API built with Laravel for managing student records: list, add, edit and delete students.

## Features

- JSON API for students with a name, email and phone number
- List, create, update and delete endpoints
- Eloquent model and migration for the `students` table

## API

All routes are under `/api`.

| Method | Endpoint | Description |
| --- | --- | --- |
| GET | `/api/watch` | List all students |
| POST | `/api/store` | Add a student (`name`, `email`, `phone`) |
| PUT | `/api/edit/{id}` | Update a student |
| DELETE | `/api/delete/{id}` | Delete a student |

## Built with

- PHP 8.1, Laravel 10
- MySQL (or any database Laravel supports)

## Run it locally

You need PHP 8.1+, Composer and a database.

```bash
git clone https://github.com/hamzakhalem/REST-API-laravel.git
cd REST-API-laravel/restapi
composer install
cp .env.example .env
php artisan key:generate
```

Set `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` in `.env`, then:

```bash
php artisan migrate
php artisan serve
```

Try it:

```bash
curl -X POST http://127.0.0.1:8000/api/store -d "name=Amina&email=amina@example.com&phone=0555000000"
curl http://127.0.0.1:8000/api/watch
```

## Project structure

```
restapi/
  app/Http/Controllers/StudentController.php   API actions
  app/Models/Student.php                       Student model
  routes/api.php                               API routes
```
