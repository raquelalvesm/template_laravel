FROM php:8.1-fpm

# Get repository and install
RUN apt-get update && apt-get install -y \
	libaio1 \
	vim \
	nano \
	curl \
	zlib1g-dev \ 
	libicu-dev\ 
	g++\
	git
	# libxml2-dev --no-install-recommends

#Config ORACLE

# ADD docker/instantclient-basic-linux.x64-12.2.0.1.0.zip /tmp/
# ADD docker/instantclient-sdk-linux.x64-12.2.0.1.0.zip /tmp/

# unzip them
# RUN unzip /tmp/instantclient-basic-linux.x64-12.2.0.1.0.zip -d /usr/local/ \
# 	&& unzip /tmp/instantclient-sdk-linux.x64-12.2.0.1.0.zip -d /usr/local/

# Prepare oci8
# RUN ln -s /usr/local/instantclient_12_2 /usr/local/instantclient \
# 	&& ln -s /usr/local/instantclient/libclntsh.so.12.1 /usr/local/instantclient/libclntsh.so \
# 	&& ln -s /usr/local/instantclient/lib* /usr/lib

# Install the OCI8 PHP extension
# RUN  docker-php-ext-configure oci8 --with-oci8=instantclient,/usr/local/instantclient && \
# 	docker-php-ext-install oci8 && \
# 	rm -rf /var/lib/apt/lists/* && \
# 	php -v

# Instalação da extenção PHP intl(internationalization)
RUN docker-php-ext-configure intl && docker-php-ext-install intl


# Use the default production configuration
RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

# Override with custom opcache settings
 #COPY config/php.ini $PHP_INI_DIR/conf.d/

# Libs para uso do LDAP
RUN apt-get install libldap2-dev -y 

# Install soap-client
# RUN docker-php-ext-install soap


RUN docker-php-ext-install ldap
# instalacao composer
RUN curl -sS http://getcomposer.org/installer | php && \
	mv composer.phar /usr/local/bin/composer

# ADD docker/tnsnames.ora /etc/
# ADD docker/sqlnet.ora /etc/
 ADD docker/laravel-postinstall.sh /usr/bin/
 #ADD docker/php/php-security.ini /usr/local/etc/php/conf.d/
 RUN docker-php-ext-install pdo 
 RUN docker-php-ext-install pdo_mysql 
 

# Clean
RUN apt-get clean -y 
# Remove the unnecessary zips
# RUN rm /tmp/*.zipc


