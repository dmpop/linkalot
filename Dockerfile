FROM alpine:latest
LABEL maintainer="dmpop@linux.com"
LABEL version="0.1"
LABEL description="Linkalot container image"
RUN apk update
RUN apk add php-cli
COPY . /usr/src/linkalot
WORKDIR /usr/src/linkalot
EXPOSE 8000
CMD [ "php", "-S", "0.0.0.0:8000" ]