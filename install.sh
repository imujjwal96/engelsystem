#!/usr/bin/env bash

# Authors:
#   Sreeja Kamishetty <sreeja25kamishetty@gmail.com>

# Description:
#   A post-installation bash script for engelsystem

echo "Updating your package manager enter your root password"
sudo apt-get update
sudo apt-get upgrade

echo "Installing LAMP enter your root password where ever asked"
echo "Install Apache"
sudo apt-get install -y apache2

echo "Install MySQL"
sudo apt-get install mysql-server mysql-client
sudo mysql_secure_installation

$version = lsb_release -r -s
if [ $version -lt 16 ]
then
  $php_version = php -v | head -1 | cut -d " " -f2 | cut -d "-"
  if [ $php_version -ge 5 ]
  then
    sudo apt-get purge php5-common -y
    sudo apt-get install php7.0 php7.0-fpm php7.0-mysql -y
  fi
elif [ $version -eq 16.01  ]
then
  sudo apt-get install php7.0 php7.0-fpm php7.0-mysql -y
fi

echo "Install git"
sudo apt-get install -y git
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
