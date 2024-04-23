CREATE DATABASE blog;

CREATE TABLE categories (
  category_id INT(11) NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(45) NOT NULL,
  PRIMARY KEY(category_id)
);

CREATE TABLE accounts (
  account_id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(15) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(1) DEFAULT "U",
  PRIMARY KEY(account_id)
);

CREATE TABLE users (
  user_id INT(11) NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL,
  address VARCHAR(45) NOT NULL,
  contact_number VARCHAR(45) NOT NULL,
  avatar VARCHAR(45) NOT NULL,
  bio VARCHAR(100),
  account_id INT(11) NOT NULL,
  PRIMARY KEY(user_id)
);

CREATE TABLE posts (
  post_id INT(11) NOT NULL AUTO_INCREMENT,
  post_title VARCHAR(45) NOT NULL,
  post_message text NOT NULL,
  date_posted date NOT NULL,
  account_id INT(11) NOT NULL,
  category_id INT(11) NOT NULL,
  PRIMARY KEY(post_id)
);
