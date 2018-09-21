FROM php:5.6-apache

COPY file.php /var/www/html/file.php
COPY vuln.php /var/www/html/vuln.php 
RUN chmod 777 /var/www/html/*