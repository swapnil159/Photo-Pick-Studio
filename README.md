# Photo-Gallery App

As of now this application provides the following features.

## Tech Stack

- MySQL
- PHP (Web application backend lanugage)
- Apache (Web server)

## Third Party Library

- PHP Mailer, has been used to implement the mailing system.
  - Source: <https://github.com/PHPMailer/PHPMailer>

## Set-up Instructions

1. First make sure you have MySQL, PHP and Apache installed (latest versions
   are fine).

2. Clone the repository using, `git clone https://github.com/swapnil159/Photo-Gallery.git`.
3. Move code from the `Photo-Gallery` folder to `/var/www/html` in your system

4. Now provide permissions to write inside the folders pp and ALBUM.

   - Open /var/www/html in terminal and give the following command

   shell
   chmod 777 pp
   chmod 777 ALBUMS
   

5. Go to `localhost` (or wherever your Apache is serving) in your web brower.

## Features to implement

- Routing
- UI
- Refactor

## Known bugs

- [ ] For few pages like `/user_profile.php`, you need to refresh the page after clicking the links.
