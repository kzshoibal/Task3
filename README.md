# Task3
Task 3. CRUD for Posts and One to Many relation between Posts and Categories, many to many relation between Posts and Tags

How to run:
1. Open command prompt or git:Bash from the directory you want to setup this project.
2. Run Command: git clone https://github.com/kzshoibal/Task3.git
3. Change directory to the clone folder(Task3) and Run Command: Composer install
4. Run Command: copy .env.example .env
5. Run Command: php artisan key:generate
6. (Optional) Open .env change the DB_DATABASE to any other database name
7. Create a database(name: Laravel) in the mysql server
or Run command at mysql directory: mysql>create database database_name
8. from Command prompt, Run Command: php artisan serve
9. Run Command: php artisan migrate --seed
