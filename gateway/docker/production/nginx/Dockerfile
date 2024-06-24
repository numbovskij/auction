FROM nginx:stable-alpine3.19

RUN apk add --no-cache curl

COPY ./common/nginx/snippets /etc/nginx/snippets
COPY ./production/nginx/conf.d /etc/nginx/conf.d

WORKDIR /app