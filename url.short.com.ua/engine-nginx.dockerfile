FROM nginx:alpine
ADD ./vhost.conf /etc/nginx/conf.d/default.conf
WORKDIR /var/www/url.short.com.ua
