FROM wyveo/nginx-php-fpm:latest
#FROM nginx:stable-alpine
# FROM nexus-docker-interno.app.df.trf1.gov.br/infra/nginx-alpine-headers:1.19.10

# RUN echo net.ipv4.tcp_timestamps=0 >> /etc/sysctl.conf;

ADD docker/vhost.conf /etc/nginx/conf.d/default.conf
# COPY ./docker/nginx/ /etc/nginx/
#RUN mkdir /etc/nginx/sites-enabled
#RUN ln -s /etc/nginx/sites-availabe/* /etc/nginx/sites-enabled/