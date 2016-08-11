# Five Minute Installation of Engelsystem
### Prerequisites
Please check out the docs for more information [the documentation here](/docs/).

    1.1 PHP 5.4.x (cgi-fcgi)
    1.2 MySQL-Server 5.5.x pr MariaDB
    1.3 Webserver ( Apache/Nginx/lighttpd)

### Step 1: Download or Clone the repository
- $ git clone --recursive https://github.com/fossasia/engelsystem.git

### Step 2: Create the Database and a User
- Using the MySQL Client
- $ mysql -u adminusername -p
- mysql> CREATE DATABASE databasename;

### Step 3: Set up config.php
- Renname config/config-sample.php to config/config.php, and add your database information. databasename, user, password

### Step 4: Upload the files
- Upload the engelsystem files to the desired location on your web server. For Apache server we need to upload to /var/www/html/ and we can view engelsystem on localhost/engelsystem/ after configuring document root.

### Step 5: Run the Install Script
- If you placed the engelsystem files in the root directory, you should visit: localhost/engelsystem/

Once you have filled the information and clicked install engelsystem. We are redirected to login page where we can login with the credentials with admin rights.
