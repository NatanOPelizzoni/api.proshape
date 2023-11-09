# ProShape Api

## Description
ProShape Api is a RESTful API for ProShape, a web application for managing a gym. It is built with Laravel 10 and uses a PostgreSQL database. It is currently in development.

### Requirements
- [Docker](https://www.docker.com/)
- [Git](https://git-scm.com/)
- [PostgreSQL](https://www.postgresql.org/)
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/)

### Installation
1. Clone the repository
```sh
git clone https://github.com/NatanOPelizzoni/api.proshape.git
```

2. Install dependencies
```sh
composer install
```

3. Create a .env file
```sh
cp .env.example .env
```

Fill the .env file with the database credentials

Example:
- DB_DATABASE=proshape
-  DB_USERNAME=root
-  DB_PASSWORD=secret

4. Generate the JWT secret
```sh
php artisan jwt:secret
```

5. Run the migrations
```sh
php artisan migrate
```

6. Run the server
```sh
php artisan serve
```

### Roadmap
- [x] Create the project
- [ ] Implement the authentication
- [ ] Implement the CRUD for the users

### Contact
Natan Pelizzoni -
[LinkedIn](https://www.linkedin.com/in/natan-o-pelizzoni-739177131/) -
[GitHub](https://github.com/NatanOPelizzoni)
