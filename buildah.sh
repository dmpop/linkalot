#!/usr/bin/env bash

container=$(buildah from opensuse/leap:15.2)
buildah run $container zypper --non-interactive up
buildah run $container zypper --non-interactive in php7
buildah copy $container . /usr/src/linkalot/
buildah config --workingdir /usr/src/linkalot $container
buildah config --port 8000 $container
buildah config --cmd "php -S 0.0.0.0:8000" $container
buildah config --label description="Linkalot container image" $container
buildah config --label maintainer="dmpop@linux.com" $container
buildah config --label version="0.1" $container
buildah commit --squash $container linkalot
buildah rm $container
