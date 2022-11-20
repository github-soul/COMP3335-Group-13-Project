# docker-lamp

Docker example with Apache, MySql 8.0, PhpMyAdmin and Php

First, create the docker-compose file.

To run these containers:

```
docker-compose up -d
```

Open phpmyadmin at [http://localhost:8000].

Open web browser to look at a php at [http://localhost:8001].

Run mysql client:

`docker-compose exec db mysql -u root -p` 
