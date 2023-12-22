CREATE DATABASE IF NOT EXISTS insurance;
USE insurance;

 CREATE TABLE IF NOT EXISTS insurer (
    id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(50),
    address VARCHAR(50)
 );

 CREATE TABLE IF NOT EXISTS client (
    id VARCHAR(50) PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    address VARCHAR(50),
    date TIMESTAMP

 );

 CREATE TABLE IF NOT EXISTS insurerOfClient (
    insurer_id VARCHAR(50),
    client_id VARCHAR(50),
    FOREIGN KEY (insurer_id) REFERENCES insurer(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (client_id) REFERENCES client(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS article (
    id VARCHAR(50) PRIMARY KEY,
    title VARCHAR(50),
    content VARCHAR(50),
    date TIMESTAMP,
    insurer_id VARCHAR (50),
    client_id VARCHAR (50),
    FOREIGN KEY (insurer_id) REFERENCES insurer(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (client_id) REFERENCES client(id) ON DELETE CASCADE ON UPDATE CASCADE   
);


  CREATE TABLE IF NOT EXISTS claim (
    id VARCHAR(50) PRIMARY KEY,
    description VARCHAR(50),
    date TIMESTAMP,
    article_id VARCHAR (50),
    FOREIGN KEY (article_id) REFERENCES article(id) ON DELETE CASCADE ON UPDATE CASCADE

 );

 CREATE TABLE IF NOT EXISTS premium (
    id VARCHAR(50) PRIMARY KEY,
    amount VARCHAR(50),
    date TIMESTAMP,
    claim_id VARCHAR (50),
    FOREIGN KEY (claim_id) REFERENCES claim(id) ON DELETE CASCADE ON UPDATE CASCADE

 );