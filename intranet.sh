#!/bin/bash
# wget https://raw.githubusercontent.com/skybertech/intrranet/master/intranet.sh && chmod +x intranet.sh && bash intranet.sh\

# GitHub:   https://github.com/riyas-rawther/intranet_apps_lemp
# Author:   Riyas Rawther
# Email:   	riyasrawther.in@gmail.com
# URL:      https://github.com/riyas-rawther/
#




### SETTINGS ->
#KEY="ssh-rsa ABC123== you@email.com"	# Please, place below your public key!
#TIMEZONE="Asia/Kolkata"				# Change to your timezone
### <- SETTINGS

# Fix environment
echo 'LC_ALL="en_US.UTF-8"' >> /etc/environment
sleep 1

# Install security updates automatically
#echo  "APT::Periodic::Update-Package-Lists \"1\";\nAPT::Periodic::Unattended-Upgrade \"1\";\nUnattended-Upgrade::Automatic-Reboot \"false\";\n" > /etc/apt/apt.conf.d/20auto-upgrades
#/etc/init.d/unattended-upgrades restart

# Setup simple Firewall
ufw allow 20 #ftp
ufw allow 21 #ftp
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
sudo killall apt apt-get
sudo lsof /var/lib/dpkg/lock
sleep 1
sudo lsof /var/lib/apt/lists/lock
sleep 1
sudo lsof /var/cache/apt/archives/lock
sleep 1
sudo rm /var/lib/apt/lists/lock
sleep 1
sudo rm /var/cache/apt/archives/lock
sleep 1
sudo rm /var/lib/dpkg/lock
sleep 3
sudo fuser -cuk /var/cache/apt/archives/lock; sudo rm -f /var/cache/apt/archives/lock

# Update the repository location to US 
curl https://repogen.simplylinux.ch/txt/bionic/sources_5d6f82baa5992eae0ab833bb6689d1d08908e8a7.txt | sudo tee /etc/apt/sources.list

# MariaDB Preperation
sudo apt-get install software-properties-common -y
sudo apt-key adv --fetch-keys 'https://mariadb.org/mariadb_release_signing_key.asc'
sudo add-apt-repository 'deb [arch=amd64,arm64,ppc64el] http://mirror.kku.ac.th/mariadb/repo/10.4/ubuntu bionic main'

echo "Updating Linux"
sudo apt-get update -y
sleep 1
sudo apt-get upgrade -y

echo "Installing  Nginx"

sudo apt-get install nginx -y
sleep 3
nginx -v
sleep 3
sudo systemctl enable nginx
sudo systemctl start nginx.service
sudo systemctl start nginx
#systemctl status nginx
nginx -v
sudo chown www-data:www-data /var/www/ -R
sudo rm /etc/nginx/sites-enabled/default

echo "Installed  Nginx"

sudo apt-get install -y unzip


echo "Install MariaDB"

sudo apt install mariadb-server mariadb-client -y
#systemctl status mariadb
sudo systemctl start mariadb
sudo systemctl enable mariadb
mariadb --version
sudo mysql_secure_installation

echo "Install PHP 7.2"

sudo apt-get install php7.2 php7.2-fpm php7.2-mysql php-common php7.2-cli php7.2-common php7.2-json php7.2-opcache php7.2-readline php7.2-mbstring php7.2-xml php7.2-gd php7.2-curl -y
php -v

echo "Install needed modules for PHP"
sudo apt-get install php7.2-fpm php7.2-json php7.2-imap php7.2-xmlrpc php7.2-soap php7.2-Intl php7.2-APCu php7.2-opcache php7.2-readline php7.2-mysql php7.2-curl php7.2-bz2 php7.2-mbstring php7.2-xml php7.2-zip php7.2-gd php7.2-sqlite -y
#apt install php-{xmlrpc,soap,bcmath,cli,xml,tokenizer,ldap,imap,util,intl,apcu,gettext} openssl -y
echo "Done Installing needed modules for PHP"

sudo systemctl start php7.2-fpm
sudo systemctl enable php7.2-fpm
#systemctl status php7.2-fpm

echo "Setting timezone to India"
timedatectl set-timezone Asia/Kolkata 

echo "Installing ProFTP"
sudo apt-get install proftpd-basic -y 

#echo "Installing ZIP"
#apt install unzip -y 

#----------- Optimization ------------#
echo "Some php.ini Tweaks"
sleep 2;
sudo sed -i "s/post_max_size = .*/post_max_size = 200M/" /etc/php/7.2/fpm/php.ini
sudo sed -i "s/memory_limit = .*/memory_limit = 300M/" /etc/php/7.2/fpm/php.ini
sudo sed -i "s/upload_max_filesize = .*/upload_max_filesize = 512M/" /etc/php/7.2/fpm/php.ini
sudo sed -i "s/max_execution_time = .*/max_execution_time = 18000/" /etc/php/7.2/fpm/php.ini
sudo sed -i "s/; max_input_vars = .*/max_input_vars = 10000/" /etc/php/7.2/fpm/php.ini
sudo systemctl restart php7.2-fpm.service


#echo "Optimizing php.ini"
#sed -i -r 's/\s*memory_limit\s+=\s+16M/memory_limit = 256M/g' /etc/php/7.2/fpm/php.ini
#sed -i -r 's/\s*UPLOAD_MAX_FILESIZE\s+=\s+16M/UPLOAD_MAX_FILESIZE = 256M/g' /etc/php/7.2/fpm/php.ini
#sed -i -r 's/\s*POST_MAX_SIZE\s+=\s+16M/POST_MAX_SIZE = 256M/g' /etc/php/7.2/fpm/php.ini
#sed -i -r 's/\s*max_execution_time\s+=\s+16M/max_execution_time = 360/g' /etc/php/7.2/fpm/php.ini

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



#!/bin/bash
PASS=sULpXEm3N

mysql -uroot <<MYSQL_SCRIPT
CREATE DATABASE seeddms DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci; 
CREATE DATABASE osticket_db DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci; 
CREATE DATABASE internal DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci; 
CREATE DATABASE moodle DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci; 
ALTER DATABASE moodle DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
CREATE USER 'dbadmin'@'localhost' IDENTIFIED BY '$PASS';
GRANT ALL PRIVILEGES ON *.* TO 'dbadmin'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
MYSQL_SCRIPT

echo "MySQL user created."
echo "Username:   $1"
echo "Password:   $PASS"

#----------- Creating all DBs and permissions ------------#
#sudo mysql 
#CREATE DATABASE seeddms DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci; 
#CREATE DATABASE osticket_db DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
#CREATE DATABASE internal DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
#CREATE DATABASE moodle DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
#CREATE USER 'dbadmin'@'localhost' IDENTIFIED BY 'sULpXEm3N';
#GRANT ALL PRIVILEGES ON *.* TO 'dbadmin'@'localhost' WITH GRANT OPTION;
#FLUSH PRIVILEGES;
#exit;




#Install phpmyadmin

sudo mkdir -p -v /usr/share/phpmyadmin/
cd /usr/share/phpmyadmin/
sudo wget https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.tar.gz
sudo tar xzf phpMyAdmin-5.0.2-all-languages.tar.gz
sudo mv phpMyAdmin-5.0.2-all-languages/* /usr/share/phpmyadmin


# Install Git
sudo apt-get install git
git --version
git config --global user.name "Riyas Rawther"
git config --global user.email "riyasrawther.in@gmail.com"
# Download the full folder
cd /tmp
git clone https://github.com/riyas-rawther/intranet_apps_lemp.git

cd /tmp/intranet_apps_lemp

sudo cp -p fixes/my.cnf /etc/mysql/my.cnf
service mysql restart
# Create required folders


# mkdir -p -v /var/www/osticket
#mkdir -p -v /var/www/moodle
#mkdir -p -v /var/www/seeddms
#mkdir -p -v /var/www/internal
mkdir -p -v /var/www/itdb
rm -rf /var/www/internal/

# Move Internal folder to /var/www/internal
mv -v internal/ /var/www/

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

cp /var/www/osticket/include/ost-sampleconfig.php /var/www/osticket/include/ost-config.php
chmod 0666 /var/www/osticket/include/ost-config.php

# Install Moodle for github

cd /var/www/
#git clone git://git.moodle.org/moodle.git
git clone https://github.com/moodle/moodle.git
cd moodle
#git branch -a
git branch --track MOODLE_38_STABLE origin/MOODLE_38_STABLE
git checkout MOODLE_38_STABLE
chmod 0777 /var/www/moodle
mkdir -p -v /var/moodledata
chmod 0777 /var/moodledata

#sudo -u www-data /usr/bin/php /var/www/moodle/admin/cli/install_database.php --lang=en adminuser='admin' --adminpass='kFb3DaA4#' --adminemail=it@example.com --fullname="LMS" --shortname="Home"

# Install SeedDMS 

mkdir -p -v /var/www/seeddms && cd /var/www/seeddms
#wget https://liquidtelecom.dl.sourceforge.net/project/seeddms/seeddms-5.1.13/seeddms-quickstart-5.1.13.tar.gz
mv /tmp/intranet_apps_lemp/apps/seeddms-quickstart-5.1.13.tar.gz .
sudo tar -xvzf  seeddms-quickstart-5.1.13.tar.gz
sudo touch /var/www/seeddms/seeddms51x/conf/ENABLE_INSTALL_TOOL


# Install ITDB
cd /tmp
wget https://github.com/sivann/itdb/archive/1.23.zip && unzip 1.23.zip
cd itdb-1.23
mv * /var/www/itdb
cd /var/www/itdb/data; cp pure.db itdb.db
cd /var/www/itdb/data; chown www-data itdb.db; chmod u+w itdb.db
chown www-data /var/www/itdb/data; chmod u+w /var/www/itdb/data/
chown www-data /var/www/itdb/data/files/; chmod u+w /var/www/itdb/data/files/


cd /tmp/intranet_apps_lemp/nginx_vhosts
# Move NGINX host files to sites Available
mv phpmyadmin.conf /etc/nginx/snippets/
mv * /etc/nginx/sites-available

# Create NGINX links

sudo ln -s /etc/nginx/sites-available/internal.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/osticket.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/moodle.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/seeddms.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/itdb.conf /etc/nginx/sites-enabled/

#FIX Permissions
sudo chown -R www-data:www-data /var/www/
sudo chmod -R 755 /var/www/
sudo chown -R www-data /var/moodledata
sudo chmod -R 0770 /var/moodledata

#Cleanups
rm /var/www/seeddms/seeddms-quickstart-5.1.13.tar.gz


# test Nginx
sudo nginx -t
# Restart NGINX

sudo systemctl restart nginx.service

# output
local_ip=$(ip addr show | awk '$1 == "inet" && $3 == "brd" { sub (/\/.*/,""); print $2 }')

echo ""
echo "##################################"
echo "The following applications has been installed"
echo "NGINX - Webserver"
echo "MariaDB - Mysql Server#"
echo "PhpMyadmin#"
echo "Php 7.2"
echo "						"
echo "Internal Portal at port 80#"
echo "OsTicket at  port 81"
echo "Moodle at Port 82"
echo "SeedDMS at Port 83"
echo "ITDB at Port 84"
echo "						"
echo "**********************************"
echo "To install the SeedDMS 	visit http://$local_ip:83/install/install.php"
echo "***********************************"
echo "						"
echo "Mysql Username is dbadmin"
echo "Mysql Password is sULpXEm3N"
echo "##"
echo "For support contact riyasrawther.in@gmail.com"
echo "##################################"
sleep 5
