#------- Heading ------#

#!/bin/bash
#
# Setup server block in Nginx
#
# GitHub:   https://github.com/riyas-rawther/intranet_apps_lemp
# Author:   Riyas Rawther
# URL:      https://github.com/riyas-rawther/
#
#wget https://raw.githubusercontent.com/riyas-rawther/intranet_apps_lemp/master/intranet.sh && chmod 755 intranet.sh && ./intranet.sh

# Styling
bold=$(tput bold)
normal=$(tput sgr0)
fontwhite="\033[1;37m"
fontgreen="\033[0;32m"

# App details
DIRECTORY=
DOMAIN=
IP= hostname -I

echo
echo -e "****************************************************************"
echo -e "*"
echo -e "* Setting up Nginx Server Block:"
echo -e "*   Domain: ${fontgreen}${bold}${DOMAIN}${normal}"
echo -e "*   Directory: ${fontgreen}${bold}${DIRECTORY}${normal}"
echo -e "*"
echo -e "****************************************************************"
echo

# Confirm setup
read -p "${bold}Do you want to Proceed? [y/N]${normal} " -n 1 -r
if [[ ! $REPLY =~ ^[Yy]$ ]]; then
  echo
  echo -e "Exiting..."
  echo
  echo
  exit 1
fi

### SETTINGS ->
#KEY="ssh-rsa ABC123== you@email.com"	# Please, place below your public key!
TIMEZONE="Asia/Kolkata"				# Change to your timezone
### <- SETTINGS

# Fix environment
echo 'LC_ALL="en_US.UTF-8"' >> /etc/environment

# Install security updates automatically
echo -e "APT::Periodic::Update-Package-Lists \"1\";\nAPT::Periodic::Unattended-Upgrade \"1\";\nUnattended-Upgrade::Automatic-Reboot \"false\";\n" > /etc/apt/apt.conf.d/20auto-upgrades
/etc/init.d/unattended-upgrades restart

# Setup simple Firewall
ufw allow 22 #OpenSSH
ufw allow 80 #http
ufw allow 81 #http
ufw allow 82 #http
ufw allow 83 #http
ufw allow 84 #http
ufw allow 85 #http
ufw allow 443 #https
yes | ufw enable

# Check Firewall settings
ufw status

# See disk space
df -h
#------- Heading END ------#



echo "Updating Linux"
sudo apt-get update -y
sudo apt-get upgrade -y

echo "Installing  Nginx"

sudo apt install nginx -y
sudo systemctl enable nginx
sudo systemctl start nginx.service
sudo systemctl start nginx
#systemctl status nginx
nginx -v
sudo chown www-data:www-data /var/www/ -R
sudo rm /etc/nginx/sites-enabled/default

echo "Installed  Nginx"

echo "Install MariaDB"

sudo apt install mariadb-server mariadb-client -y
#systemctl status mariadb
sudo systemctl start mariadb
sudo systemctl enable mariadb
mariadb --version
sudo mysql_secure_installation

echo "Install PHP 7.2"

sudo apt install php7.2 php7.2-fpm php7.2-mysql php-common php7.2-cli php7.2-common php7.2-json php7.2-opcache php7.2-readline php7.2-mbstring php7.2-xml php7.2-gd php7.2-curl -y
php -v

echo "Install needed modules for PHP"
sudo apt-get install php7.2-fpm php7.2-json php7.2-opcache php7.2-readline php7.2-mysql php7.2-curl php7.2-bz2 php7.2-mbstring php7.2-xml php7.2-zip php7.2-gd php7.2-sqlite -y
#apt install php-{xmlrpc,soap,bcmath,cli,xml,tokenizer,ldap,imap,util,intl,apcu,gettext} openssl -y
echo "Done Installing needed modules for PHP"

sudo systemctl start php7.2-fpm
sudo systemctl enable php7.2-fpm
#systemctl status php7.2-fpm

echo "Setting timezone to India"
timedatectl set-timezone Asia/Kolkata 

echo "Installing ProFTP"
sudo apt install proftpd-basic -y 

echo "Installing ZIP"
apt install unzip

#----------- Optimization ------------#

echo "Optimizing php.ini"
sed -i -r 's/\s*memory_limit\s+=\s+16M/memory_limit = 256M/g' /etc/php/7.2/fpm/php.ini
sed -i -r 's/\s*UPLOAD_MAX_FILESIZE\s+=\s+16M/UPLOAD_MAX_FILESIZE = 256M/g' /etc/php/7.2/fpm/php.ini
sed -i -r 's/\s*POST_MAX_SIZE\s+=\s+16M/POST_MAX_SIZE = 256M/g' /etc/php/7.2/fpm/php.ini
sed -i -r 's/\s*max_execution_time\s+=\s+16M/max_execution_time = 360/g' /etc/php/7.2/fpm/php.ini

#sed -ie 's/memory_limit\ =\ 128M/memory_limit\ =\ 2G/g' /etc/php5/apache2/php.ini
sed -ie 's/\;date\.timezone\ =/date\.timezone\ =\ Asia\/Kolkata/g' /etc/php/7.2/fpm/php.ini
#sed -ie 's/upload_max_filesize\ =\ 2M/upload_max_filesize\ =\ 200M/g' /etc/php5/apache2/php.ini
#sed -ie 's/post_max_size\ =\ 8M/post_max_size\ =\ 200M/g' /etc/php5/apache2/php.ini



#----------- Permissions ------------#

# Update Permissions
echo -e '\n[Adjusting Permissions]'
chgrp -R www-data /var/www/*
chmod -R g+rw /var/www/*
sh -c 'find /var/www/* -type d -print0 | sudo xargs -0 chmod g+s'

#----------- Creating all DBs and permissions ------------#

# Execute commands
mysql  <<ENDOFSQL
-- Create the database
CREATE DATABASE seeddms; 
CREATE DATABASE osticket_db;
CREATE DATABASE internal;
CREATE DATABASE moodle;
CREATE DATABASE osticket_db;

CREATE USER 'dbdmin'@'localhost' IDENTIFIED BY 'sULpXEm3N';
GRANT ALL PRIVILEGES ON *.* TO 'dbdmin'@'localhost' WITH GRANT OPTION;

--
-- flush the privileges to disk
FLUSH PRIVILEGES;
--
exit
ENDOFSQL

#Install phpmyadmin

sudo mkdir -p -v /usr/share/phpmyadmin/
cd /usr/share/phpmyadmin/
sudo wget https://files.phpmyadmin.net/phpMyAdmin/5.0.1/phpMyAdmin-5.0.1-all-languages.tar.gz
sudo tar xzf phpMyAdmin-5.0.1-all-languages.tar.gz
sudo mv phpMyAdmin-5.0.1-all-languages/* /usr/share/phpmyadmin


# Install Git
sudo apt install git
git --version
git config --global user.name "Riyas Rawther"
git config --global user.email "riyasrawther.in@gmail.com"
# Download the full folder
cd /tmp
https://github.com/riyas-rawther/intranet_apps_lemp.git

cd intranet_apps_lemp_master

# Create required folders

mkdir -p -v /var/www/internal
# mkdir -p -v /var/www/osticket
#mkdir -p -v /var/www/moodle
#mkdir -p -v /var/www/seeddms
mkdir -p -v /var/www/itdb

# Move Internal folder to /var/www/internal

mv internal * /var/www/internal

#Restore Internal DB from Dump

mysql internal < /var/www/internal/sql.sql

# Install OSTicket for github
cd /tmp
git clone https://github.com/osTicket/osTicket
cd osTicket
php manage.php deploy --setup /var/www/osticket/

# Fix OsTicket AJAX issue with NGINX
wget https://raw.githubusercontent.com/riyas-rawther/intranet_apps_lemp/master/fixes/osticket/class.osticket.php 
mv class.osticket.php /var/www/osticket/include/class.osticket.php

# Install Moodle for github

cd /var/www/
#git clone git://git.moodle.org/moodle.git
https://github.com/moodle/moodle.git
cd moodle
git branch -a
git branch --track MOODLE_38_STABLE origin/MOODLE_38_STABLE
git checkout MOODLE_38_STABLE
chmod 0777 /var/www/moodle
mkdir /var/moodledata
chmod 0777 /var/moodledata

sudo -u www-data /usr/bin/php /var/www/moodle/admin/cli/install_database.php --adminuser='admin' --adminpass='kFb3DaA4#' --adminemail=it@example.com --fullname="LMS" --shortname="Home"

# Install SeedDMS 

mkdir -p -v /var/www/seeddms && cd /var/www/seeddms
wget https://liquidtelecom.dl.sourceforge.net/project/seeddms/seeddms-5.1.13/seeddms-quickstart-5.1.13.tar.gz
sudo tar -xvzf  seeddms-quickstart-5.1.13.tar.gz
sudo touch /var/www/seeddms/seeddms51x/conf/ENABLE_INSTALL_TOOL

echo -e "INSTALLATION OF SEEDDMS has been done! \n Open your browser, and point it to http://192.10.100.100:83/install/install.php and follow instruction on the screen.\n
NOTE: on the databse delete the path and enter the db name created in Mariadb.\nREPLACE Content directory and all other feilds with\n/home/www-data/ with /var/www/seeddms\nDatabase Type = mysql"

# Install ITDB
cd /tmp
wget https://github.com/sivann/itdb/archive/1.23.zip && unzip 1.23.zip
cd itdb-1.23
mv * /var/www/itdb


cd /tmp
# Move NGINX host files to sites Available

mv /tmp/intranet_apps_lemp/nginx_vhosts * /etc/nginx/sites-available

# Create NGINX links

sudo ln -s /etc/nginx/sites-available/internal.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/osticket.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/moodle.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/seeddms.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/itdb.conf /etc/nginx/sites-enabled/

#FIX Permissions
sudo chown -R www-data:www-data /var/www/
sudo chmod -R 755 /var/www/
sudo chown -R www-data /var/www/moodledata
sudo chmod -R 0770 /var/www/moodledata

#Remove Default NGINX File
sudo rm /etc/nginx/sites-available/default
# test Nginx
sudo nginx-t
# Restart NGINX

sudo systemctl restart nginx.service
