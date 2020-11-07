drop database if exists BBB_database;

create database BBB_database;
use BBB_database;

CREATE TABLE if not exists useraccount (
  useremail varchar(20) NOT NULL,
  password_hash varchar(64) NOT NULL,
  username varchar(64) NOT NULL,
  mobilenumber varchar(64) NOT NULL,
  mrt varchar(64) NOT NULL,
  acctype varchar(64) NOT NULL
);

ALTER TABLE useraccount 
  ADD PRIMARY KEY (useremail);

CREATE TABLE if not exists donorlisting (
  username varchar(256) NOT NULL,
  mrt varchar(256) NOT NULL,
  category varchar(256) NOT NULL,
  item varchar(256) NOT NULL,
  quantity varchar(256) NOT NULL,
  itemcondition varchar(256) NOT NULL
);

CREATE TABLE if not exists beneficiarylisting (
  username varchar(20) NOT NULL,
  mrt varchar(256) NOT NULL,
  category varchar(256) NOT NULL,
  item varchar(256) NOT NULL,
  quantity varchar(256) NOT NULL,
  wantedby date NOT NULL,
  comments varchar(500)
);


INSERT INTO beneficiarylisting (username, mrt, category, item, quantity, wantedby, comments) VALUES 
('Zack', 'Paya Lebar', 'Hygiene', 'Diapers', '2 packs', '2020/11/12', 'Merries Tape Diapers - S' ),
('Thomas', 'Boon Lay', 'Clothing', 'Shirt for 3 month old boy', '3', '2020/11/29', 'Dark colour please'),
('Wong Shi Lin','Sengkang' , 'Toys', 'Rattle toy', '5', '2020/11/15', ''),
('Tammy Ho', 'Bedok' , 'Hygiene', 'Baby shampoo', '2 bottles', '2020/11/30', 'Dove baby shampoo - rich moisture');
