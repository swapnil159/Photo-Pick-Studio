# Photo-Gallery App

As of now this application provides the following features.

## Tech Stack

### Backend

- MySQL
- PHP (Web application backend lanugage)
- Apache (Web server)

### Frontend

- AngularJS framework
- Vanilla JS
- CSS (very basic)

## Third Party Library

- PHP Mailer, has been used to implement the mailing system.
  - Source: <https://github.com/PHPMailer/PHPMailer>

## Set-up Instructions

1. First make sure you have MySQL, PHP and Apache installed (latest versions
   are fine). Also make sure you have MySQL native driver installed,

   ```shell
   sudo apt-get install php-mysqlnd
   ```

2. Clone the repository using, `git clone https://github.com/swapnil159/Photo-Gallery.git`.

3. Move code from the `Photo-Gallery` folder to `/var/www/html` in your system.

4. Dump the provided fixture `db.sql` in MySQL database, using the following steps.

   - First create the database using the following command,

     ```shell
         # After log in as a "root" user
         mysql> CREATE DATABASE Photo_Gallery;
     ```

   - Now load the fixture,

     ```shell
     # Logout from mysql and run the following in bash

     mysql -u root -p Photo_Gallery < db.sql

     ```

5. Make the following replacment throughout the code,

   - Replace `$password='swapnil159';` with `$password='<your database password>;`to connect with the database.
   - This can be easily done by searching the former string.

6. Now provide permissions to write in `pp` and `ALBUMS` folder.

   ```shell
    # Open /var/www/html in terminal
    cd /var/www/html
    chmod 777 pp
    chmod 777 ALBUMS
   ```

7. Go to `localhost` (or wherever your Apache is serving) in your web brower.

## Features to implement

- Routing
- UI
- Refactor

## Known bugs

- [ ] For few pages like `/user_profile.php`, you need to refresh the page after clicking the links.
