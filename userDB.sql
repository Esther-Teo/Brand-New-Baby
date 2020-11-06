drop database if exists userDB;

create database userDB;
use userDB;

CREATE TABLE if not exists useraccount (
  username varchar(20) NOT NULL,
  password_hash varchar(64) NOT NULL,
  rname varchar(64) NOT NULL,
  mobilenumber varchar(64) NOT NULL,
  addrss varchar(64) NOT NULL,
  acctype varchar(64) NOT NULL
);


ALTER TABLE useraccount 
  ADD PRIMARY KEY (username);
