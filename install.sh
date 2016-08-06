#!/usr/bin/env bash

# Authors:
#   Sreeja Kamishetty <sreeja25kamishetty@gmail.com>

# Description:
#   A post-installation bash script for engelsystem

echo "Updating your package manager enter your root password"
sudo apt-get update

echo "Installing LAMP enter your root password where ever asked"
echo "Install Apache"
sudo apt-get install -y apache2

echo "Install MySQL"
sudo apt-get install -y mysql-server php5-mysql

echo "Install PHP"
sudo apt-get install php7.0 php7.0-fpm php7.0-mysql -y

echo "Install git"
sudo apt-get install  -y git
cd /var/www/html

echo "Cloning the github repository"
sudo git clone --recursive https://github.com/fossasia/engelsystem.git
cd engelsystem

echo "enter mysql root password"
# creating new database engelsystem
echo "create database engelsystem" | mysql -u root -p
echo "enter your mysql root password to migrate the tables to engelsystem database"
mysql -u root -p engelsystem < db/install.sql
mysql -u root -p engelsystem < db/update.sql

echo "enter the database name username and password"
cp config/config-sample.default.php config/config.php

echo "Restarting Apache"
sudo service apache2 restart
echo "Engelsystem is successfully installed and can be viewed on local server at localhost/engelsystem/public"
