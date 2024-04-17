
# Prerequisite
- PHP >= 8.0.2
- Composer
- MySql / MariaDB

# Installation Guide
1. **Install PHP and Composer**
   Make sure you have PHP >= 8.0.2 and Composer installed on your system. If not, you can download PHP from [here](https://www.php.net/downloads.php) and Composer from [here](https://getcomposer.org/download/).

2. **Clone the Laravel Project**
   Clone the Laravel project from your repository using the following command: `git clone <repository-url>`

3. **Install Dependencies**
    Navigate to the project directory and install the dependencies using Composer with  this command:
    `composer install`

4. **Configure the Environment**
    Copy the `.env.example` file to `.env` and configure your database credentials.

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_lks_webdonasi
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. **Generate Application Key**
    Generate a new application key: `php artisan key:generate`

6. **Create a Database**
    Create a new database in MySql or MariaDB.

7. **Migrate the Database**
    Run the database migrations to create the database schema:
    `php artisan migrate`

8. **Running Database Seeder**
    To populate the database with initial data, you can run the database seeder:
    `php artisan db:seed`

9. **Start the Local Development Server**
    Start the local development server using the following command:
    `php artisan serve`  

    You can now access the Laravel project at [http://localhost:8000](http://localhost:8000).

## API Documentation
You can see API Documentation from Postman by [following this link](https://documenter.getpostman.com/view/4171991/2sA3BkdDgY)
  