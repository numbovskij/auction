FROM nginx:stable-alpine3.19

COPY ./common/nginx/snippets /etc/nginx/snippets
COPY ./development/nginx/conf.d /etc/nginx/conf.d

WORKDIR /app