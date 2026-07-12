# SuperLand Installation Guide

This guide explains how to run SuperLand on a local computer using Wampserver or XAMPP.

## 1. Requirements

Install one local PHP server package:

- Wampserver, or
- XAMPP

The server should include:

- PHP 7.4 or newer
- MySQL or MariaDB
- phpMyAdmin

A code editor such as VS Code can be used to view or edit the project files.

## 2. Place the Project in the Server Folder

For Wampserver, place the project folder here:

```text
C:\wamp64\www\SuperLand
```

For XAMPP, place the project folder here:

```text
C:\xampp\htdocs\SuperLand
```

The final path should contain `index.php` directly inside the `SuperLand` folder.

Correct example:

```text
SuperLand/index.php
```

Incorrect example:

```text
SuperLand/SuperLand/index.php
```

## 3. Start Apache and MySQL

Open Wampserver or XAMPP and start:

- Apache
- MySQL

For Wampserver, wait until the Wampserver icon becomes green.

## 4. Import the Database

Open phpMyAdmin:

```text
http://localhost/phpmyadmin/
```

Import this SQL file:

```text
SuperLand/database/superland_db.sql
```

The SQL file creates the database:

```text
superland_db
```

## 5. Configure Database Connection

The main database connection file is:

```text
config/db.php
```

By default, it uses these local development values:

```text
host: localhost
username: root
password: empty
database: superland_db
port: 3306
```

If the local MySQL server has a password, open `config/db.php` and update only this line:

```php
$DB_PASSWORD = 'your_mysql_password';
```

## 6. Open the Website

Customer website:

```text
http://localhost/SuperLand/
```

Admin login page:

```text
http://localhost/SuperLand/admin/AdminDashboard.php
```

## 7. Demo Login Details

Admin:

```text
Email: admin@superland.com
Password: admin123
```

Customer:

```text
Email: user@superland.com
Password: user123
```

## 8. Common Issues

### Database connection failed

Check that:

- MySQL is running.
- `database/superland_db.sql` was imported successfully.
- The database name is `superland_db`.
- The database password in `config/db.php` is correct if a MySQL password is used.

### Page not found

Check that the folder path is correct and that `index.php` is directly inside the `SuperLand` folder.

### Images not loading

Do not rename or move image folders without updating code and database image paths.
