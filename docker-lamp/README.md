# docker-lamp

Docker example with Apache, MySql 8.0, netdata,PhpMyAdmin and PHP

First, create the docker-compose file.

To run these containers:

```
docker-compose up -d
```

Open phpmyadmin at [http://localhost:8000].

Open web browser to look at a php at [http://localhost:8001].

Open netdata to monitor MySQL at [http://localhost:19999].

Run mysql client:

`docker-compose exec db mysql -u root -p` 

Demo video: https://www.youtube.com/watch?v=kt4EPGzVhVY
