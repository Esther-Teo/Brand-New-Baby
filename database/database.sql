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
  itemcondition varchar(500)
);


INSERT INTO beneficiarylisting (username, mrt, category, item, quantity, itemcondition) VALUES 
('Zack', 'Paya Lebar', 'Hygiene', 'Diapers', '2 packs',  'newCondition' ),
('Thomas', 'Boon Lay', 'Clothing', 'Shirt for 3 month old boy', '3', 'preLoved'),
('Wong Shi Lin','Sengkang' , 'Toys', 'Rattle toy', '5', 'preLoved'),
('Tammy Ho', 'Bedok' , 'Hygiene', 'Baby shampoo', '2 bottles', 'newCondition');
('Timothy', 'RedHill' , 'Clothing', 'baby pants', '2 pairs', 'used or new');
('Jasmine Tan', 'Ang Mo Kio', 'Toys', 'Robot toy', '1', '2020/2/12/','iron man')
('Maximus Lim', 'Jurong East' , 'Clothing', 'baby pants', '2 pairs', 'used or new');
('Jamie Lee', 'Macpherson' , 'Toys', 'Baby puzzles', '1 set', '');
('Siu Lee', 'Yishun' , 'Hygiene', 'Baby bathing powder', '2 bottles', '');
('Jackson Teo', 'City Hall' , 'Toys', 'Superhero figurines', '4', 'power ranger figurines preferred');
('Kimberly Ann', 'Choa Chu Kang' , 'Hygiene', 'Pacifier', '2', 'new with packaging');
('Hoe Hin', 'Simei' , 'Clothing', 'Baby socks', '5 pairs', 'new condition');
('Darryl', 'Eunos' , 'Toys', 'Dinosaur figurine', '3 or more sets', 'prefers Trex');
('Wee Liang', 'Queenstown' , 'Hygiene', 'Baby Diapers', '2 packages', 'Huggies brand ');
('Amos Lee', 'Raffles Place' , 'Hygiene', 'Baby body wash', '6 bottles', '');
