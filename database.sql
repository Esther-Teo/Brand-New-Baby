drop database if exists BBB_database;

create database BBB_database;

use BBB_database;

CREATE TABLE if not exists donoraccount (
  username varchar(256) NOT NULL,
  passcode varchar(256) NOT NULL,
  email varchar (256) NOT NULL,
  phonenumber int NOT NULL,
  mrt varchar(256) NOT NULL
);

CREATE TABLE if not exists donorlisting (
  username varchar(256) NOT NULL,
  mrt varchar(256) NOT NULL,
  category varchar(256) NOT NULL,
  item varchar(256) NOT NULL,
  quantity varchar(256) NOT NULL,
  itemcondition varchar(256) NOT NULL
);

CREATE TABLE if not exists beneficiaryaccount (
  username varchar(20) NOT NULL,
  passcode varchar(256) NOT NULL, -- change to hashed password?
  email varchar (256) NOT NULL,
  phonenumber int NOT NULL,
  mrt varchar(256) NOT NULL
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

INSERT INTO beneficiaryaccount (username, passcode, email, phonenumber, mrt) VALUES
('Zack', 'ilovecoding122', 'zack&cody@gmail.com', '98764321', 'Paya Lebar'),
('Thomas', 'baby98', 'thomastrain@yahoo.com.sg', '87645441', 'Boon Lay' ),
('Wong Shi Lin', 'heeehaw$$', 'shilinfang@hotmail.com', '86774333', 'Sengkang'),
('Tammy Ho', 'hahahaha@88', 'tammythehamster@gmail.com', '62352345', 'Bedok');

INSERT INTO beneficiarylisting (username, mrt, category, item, quantity, wantedby, comments) VALUES 
('Zack', 'Paya Lebar', 'Hygiene', 'Diapers', '2 packs', '2020/11/12', 'Merries Tape Diapers - S' ),
('Thomas', 'Boon Lay', 'Clothing', 'Shirt for 3 month old boy', '3', '2020/11/29', 'Dark colour please'),
('Wong Shi Lin','Sengkang' , 'Toys', 'Rattle toy', '5', '2020/11/15', ''),
('Tammy Ho', 'Bedok' , 'Hygiene', 'Baby shampoo', '2 bottles', '2020/11/30', 'Dove baby shampoo - rich moisture');
