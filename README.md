
This is a test task, the main functionality: CRUD for ads, registration and authorization system, the ability to fill in information about yourself, leave comments and ratings.

1. Run `mv .env.example .env`
2. Put the correct credentials for your database in .env
3. Get nova credentials, and then run `composer install`
5. Run `php artisan migrate` (ensure you have database created first)
7. Run `php artisan db:seed`


This will create a test user for you with the next creds:
   * Email: ad@gmail.com
   * Password: 1223334444