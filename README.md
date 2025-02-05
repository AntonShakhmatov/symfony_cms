# Symfony CMS Portfolio Project

## Project Description
This is a basic Symfony project setup with minimal functionality. It includes routes for a home page and an admin panel, running on a local server.

## Requirements
- **PHP** 8.3+
- **Composer** 2+
- **Symfony CLI**

## Getting Started

### Clone the Repository
```sh
git clone https://github.com/AntonShakhmatov/symfony_cms.git
cd symfony-cms
```

### Set Up Environment Variables
Copy the `.env` file and configure it as needed.

## Install Dependencies
```sh
composer install
composer update
```

## Database Migration

### Configure Database Connection
Update the `.env` file with your database connection details, for example:
```env
DATABASE_URL="mysql://username:password@127.0.0.1:3306/database_name"
```

### Create the Database
```sh
php bin/console doctrine:database:create
```

### Run Migrations
```sh
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate
```

### (Optional) Load Fixtures
If you have fixtures for initial data, run:
```sh
php bin/console doctrine:fixtures:load
```

## Run the Symfony Server
```sh
symfony server:start
```
The server will start at [http://localhost:8000](http://localhost:8000) by default.

## Application Routes
- **Home Page:** [http://localhost:8000/](http://localhost:8000/)
- **Admin Panel:** [http://localhost:8000/admin](http://localhost:8000/admin)

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Support
For questions or suggestions, open an **Issue** on GitHub.
