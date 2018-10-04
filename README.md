# bard-erp
ERP Project for BARD

# Prerequisites
`docker`\
`docker-compose`

# Installation
#### Run commands after initial pull

`composer install`

`chmod -R o+rw bootstrap/ storage/`  

*To build and run docker image*\
`docker-compose up --build`

*To run docker image*\
`docker-compose up`

*To run docker image in background*\
`docker-compose up -d`


# Developement Resources
#### mysql
`mysql -u bard -P 3307 -h 127.0.0.1 -p`

