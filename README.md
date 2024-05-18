## POLLUX MES install instructions

### Pollux MES is an application developed in Laravel 10 + Vite + MySQL

1. Download and install php >= 8.1
2. Download and install Composer (for dependencies)
3. Modify php.ini file and remove ';' to activate ext ```pdo_mysql ``` in the line:
```bash
    ;extension=pdo_mysql
```
4. Download and install node and npm 
5. Download and install Mysql
6. Download and install GIT (for version control and updates)
7. Select a folder to install the app and open a cmd or terminal in the selected folder, and open it after the clone is finished
```bash
git clone https://github.com/driftking301/quotations.git
cd quotations
```
8. Execute composer install 
```bash
composer install
```
If the command shows an error add the flag --ignore-platform-req=ext-fileinfo

```bash
composer install --ignore-platform-req=ext-fileinfo
```
9. Execute npm install
```bash
npm install
```
10. Open .env.example with a text editor and modify it with the Database settings
    - DB_DATABASE=quotations will be created in next step
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quotations
DB_USERNAME=root
DB_PASSWORD=
```
11. Execute php artisan migrate (answer yes when prompt in order to create the database automatically)
```bash
php artisan migrate
```
12. Execute php artisan key:generate
```bash
php artisan migrate key:generate
```

If you want to check the app configuration is working you will need 2 cmd or 2 terminals:
- first terminal:
```bash
php artisan serve
```
- second terminal:
```bash
npm run dev
```
This will open a server in localhost:8000 and you will see the app running

Depending on the type of web server you have, you will have to do the app deployment and the necessary configuration.

This app will receive updates constantly.
### How to update?
- Navigate to the root directory of the project, open a cmd or terminal and execute this:
```bash
git pull origin master
```
