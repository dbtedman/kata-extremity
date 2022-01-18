FROM wordpress

RUN apt-get update \
  && apt-get install -y less \
  && curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    --output /usr/local/bin/wp \
  && chmod +x /usr/local/bin/wp

COPY --chown=www-data:www-data ./docker-setup-wordpress.sh /app/

RUN chmod +x /app/docker-setup-wordpress.sh
