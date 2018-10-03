# bard-erp
ERP Project for BARD

# Prerequisites
---
`docker`
`docker-compose`

# Installation
---
#### Run commands after initial pull

`composer install`
`chmod -R o+rw bootstrap/ storage/`
`docker-compose up --build -d`

# Developement Resources
---
#### mysql
`mysql -u bard -P 3307 -h 127.0.0.1 -p`
