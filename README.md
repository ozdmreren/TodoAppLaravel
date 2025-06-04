# Requirements

- PHP (Laravel installed)
- Node.js and npm (for tailwindcss)
- XAMPP (for MySQL)

Follow the steps below to run the project locally:

1. *Start the Laravel development server:*
   Go project folder -> open terminal ->  php artisan serve
2. *Run tailwind css with vite
    Go project folder -> open terminal -> npm run dev
3. *Start MYSQL using XAMPP
   open xampp and start Apache and MySQL
4. *.env file*
   DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=todo_app
    DB_USERNAME=root
    DB_PASSWORD=

5. **Last Step**
   This step is most important step.
   First of all, you go to your cloned laravel project and open terminal.
   And than write "
   1-composer install
   2-npm install
   3-php artisan key:generate(you should have  created the .env file !!!)
   4-php artisan storage:link
   5-php artisan migrate:fresh
   5-npm run dev
   6-php artisan serve"
   in your terminal
