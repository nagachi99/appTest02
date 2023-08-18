FROM mysql:8.0.15

ENV TZ=Asia/Tokyo \
    MYSQL_ROOT_PASSWORD=secret

COPY ./mysql/my.cnf /etc/mysql/conf.d/my.cnf

WORKDIR /docker-entrypoint-initdb.d

COPY ./sql/data.sql /docker-entrypoint-initdb.d/data.sql
