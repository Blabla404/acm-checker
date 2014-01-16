#!/usr/bin/env bash

apt-get update
apt-get install -y nginx php5-fpm php-apc php5-mysql
service nginx start
rm -f /etc/nginx/sites-available/default
ln -fs /vagrant/conf/default /etc/nginx/sites-available/default
rm -f /etc/php5/fpm/pool.d/www.conf
ln -fs /vagrant/conf/www.conf /etc/php5/fpm/pool.d/www.conf
echo "mysql-server-5.5 mysql-server/root_password_again password root" | debconf-set-selections
echo "mysql-server-5.5 mysql-server/root_password password root" | debconf-set-selections
apt-get -y install mysql-server
mysql --user=root --password=root mysql < /vagrant/start.sql
service php5-fpm restart && service nginx restart
