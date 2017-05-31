#! /usr/bin/env bash

docker pull nickistre/centos-lamp:latest
docker pull eboraas/apache-php:latest
cd login1/
docker build -t skctf:login1 .
cd ../login2/
docker build -t skctf:login2 .
cd ../login3/
docker build -t skctf:login3 .
cd ../login4/
docker build -t skctf:login4 .
cd ../qiannuyou/
docker build -t skctf:qiannuyou .
cd ../qiandao/
docker build -t skctf:qiandao .
cd ../hello/
docker build -t skctf:hello .
cd ../ssrf/
docker build -t skctf:ssrf .
cd ../chengjidan/
docker build -t skctf:chengjidan .
