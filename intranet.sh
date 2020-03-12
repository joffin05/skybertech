# Install Nginx
sudo bash -c 'cat > /etc/apt/sources.list.d/nginx.list << EOL
deb http://nginx.org/packages/ubuntu/ xenial nginx
deb-src http://nginx.org/packages/ubuntu/ xenial nginx
EOL'

wget http://nginx.org/keys/nginx_signing.key
sudo apt-key add nginx_signing.key
sudo apt-get update
sudo apt-get install nginx

# Install MariaDB
sudo apt-get install software-properties-common
sudo apt-key adv --fetch-keys 'https://mariadb.org/mariadb_release_signing_key.asc'
sudo add-apt-repository 'deb [arch=amd64,arm64,ppc64el] http://mirror.nodesdirect.com/mariadb/repo/10.4/ubuntu bionic main'
sudo apt update
sudo apt install mariadb-server

# Install PHP 7.2
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install php7.2

# Install needed modules for PHP
sudo apt-get install php7.2-fpm php7.2-mysql php7.2-curl php7.2-gd php7.2-bz2 php7.2-mbstring php7.2-xml php7.2-zip

# Install Git
sudo apt install git
git --version
git config --global user.name "Riyas Rawther"
git config --global user.email "riyasrawther.in@gmail.com"
# Download the full folder
cd /tmp
https://github.com/riyas-rawther/intranet_apps_lemp.git

cd intranet_apps_lemp

# Create required folders

mkdir -p -v /var/www/internal
# mkdir -p -v /var/www/osticket
mkdir -p -v /var/www/moodle
mkdir -p -v /var/www/seeddms
mkdir -p -v /var/www/itdb

# Move Internal folder to /var/www/internal

mv internal * /var/www/internal

#Restore Internal DB from Dump

mysql internal < /var/www/internal/sql.sql

# Install OS Ticket for github
cd /tmp
git clone https://github.com/osTicket/osTicket
cd osTicket
php manage.php deploy --setup /var/www/osticket/

# Fix OsTicket AJAX issue with NGINX


# Move NGINX host files to sites Available

mv /tmp/intranet_apps_lemp/nginx_vhosts * /etc/nginx/sites-available

# Create NGINX links

sudo ln -s /etc/nginx/sites-available/internal.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/osticket.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/moodle.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/seeddms.conf /etc/nginx/sites-enabled/
sudo ln -s /etc/nginx/sites-available/itdb.conf /etc/nginx/sites-enabled/


#Remove Default NGINX File
sudo rm /etc/nginx/sites-available/default
# test Nginx
sudo nginx-t
# Restart NGINX

sudo systemctl restart nginx.service
