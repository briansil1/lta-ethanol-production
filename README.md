## Requirements

- **PHP extension php_zip enabled**
- **PHP extension php_xml enabled**
- **PHP extension php_iconv enabled**
- **PHP extension php_simplexml enabled**
- **PHP extension php_xmlreader enabled**
- **PHP extension php_zlib enabled**
- **Also install the ext-zip extension**


## Database

For the database, you need to follow the following instructions.

1. You need to create a backup of the production environment, You must execute the following instruction

- **mysqldump -u [username] -p [database] > prod_database.sq**

2. Create user table backup, You must execute the following instruction

- **mysqldump -u [username] -p [database] users > users.sql**

3. Download the latest changes and deploy the application

4. Create database migrations
- **php artisan migrate:fresh --seed**

5. Finally we must return the information from the users table, for this it is necessary to execute the following instruction

- **mysql -u [username] -p [database] < users.sql**

## Enviroment variables
- **APP_EUROPE_ID**
The id is 23
- **APP_DEFAULT_COUNTRY_ID**
The id is 4
- **APP_USA_ID**
The id is 24

- **ADMIN_PASS**
This password is set by US Grains