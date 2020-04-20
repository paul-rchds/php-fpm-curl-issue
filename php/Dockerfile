FROM ubuntu:18.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update
RUN apt-get upgrade -y

RUN export LC_ALL=en_US.UTF-8
RUN export LANG=en_US.UTF-8

RUN apt-get install software-properties-common -y
RUN add-apt-repository ppa:ondrej/php
RUN apt-get update

RUN apt-get install php7.4-fpm \
                    php7.4-common \
                    php7.4-curl -y

RUN apt-get install apache2 -y

# Copy of config files
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf 
COPY ./www.conf /etc/php/7.4/fpm/pool.d/www.conf

# Copy over code
ADD serverOne.php /var/www/html/
ADD serverTwo.php /var/www/html/

# Enable Mods
RUN a2enmod headers ssl rewrite proxy proxy_fcgi

# Enable Sites
RUN a2ensite 000-default

CMD ["bash", "-c", "service apache2 restart && service php7.4-fpm start && tail -f /var/log/apache2/error.log"]
