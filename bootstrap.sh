#!/usr/bin/env bash

apt-get update
#mkdir /var/www
apt-get install -y nginx sqlite3 php5-fpm php5-sqlite php-apc
service nginx start
rm -rf /var/www
ln -fs /vagrant/public /var/www
rm -f /etc/nginx/sites-available/default
ln -fs /vagrant/conf/default /etc/nginx/sites-available/default
rm -f /etc/php5/fpm/pool.d/www.conf
ln -fs /vagrant/conf/www.conf /etc/php5/fpm/pool.d/www.conf
sudo service php5-fpm reload && sudo service nginx reload

