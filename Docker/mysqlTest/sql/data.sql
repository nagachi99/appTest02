CREATE DATABASE address;

USE address;

CREATE TABLE cities(
   id int PRIMARY KEY,
   name CHAR(12) UNIQUE NOT NULL
);

INSERT INTO cities VALUES
    (1,'茨城県'),
    (2,'栃木県'),
    (3,'群馬県'),
    (4,'埼玉県'),
    (5,'千葉県'),
    (6,'東京都'),
    (7,'神奈川県');
