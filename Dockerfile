FROM opensuse/leap:15.2
LABEL maintainer="dmpop@linux.com"
LABEL version="0.1"
LABEL description="Linkalot Docker image"
RUN zypper up
RUN zypper in -y php7
COPY . /usr/src/linkalot
WORKDIR /usr/src/linkalot
EXPOSE 8000
CMD [ "php", "-S", "0.0.0.0:8000" ]