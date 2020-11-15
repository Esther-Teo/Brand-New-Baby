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
('Siu Lee', 'Yishun' , 'hygiene', 'babyWipes', '2', 'newCondition'),
('Thomas', 'Boon Lay', 'clothing', 'male_clothing', '3', 'preLoved'),
('Wong Shi Lin','Sengkang' , 'toys', 'softToys', '5', 'preLoved'),
('Tammy Ho', 'Bedok' , 'hygiene', 'bib', '2', 'newCondition'),
('Timothy', 'RedHill' , 'clothing', 'female_clothing', '2', 'preLoved'),
('Jasmine Tan', 'Ang Mo Kio', 'toys', 'books', '1', 'preLoved'),
('Maximus Lim', 'Jurong East' , 'clothing', 'male_clothing', '2', 'preLoved'),
('Jamie Lee', 'Macpherson' , 'toys', 'bathToys', '1', 'preLoved'),
('Jackson Teo', 'City Hall' , 'toys', 'softToys', '4', 'newCondition'),
('Kimberly Ann', 'Choa Chu Kang' , 'hygiene', 'bib', '2', 'newCondition'),
('Zack', 'Paya Lebar', 'hygiene', 'diapers', '2',  'newCondition' ),
('Hoe Hin', 'Simei' , 'clothing', 'unisex_clothing', '5', 'newCondition'),
('Darryl', 'Eunos' , 'toys', 'softToys', '3', 'preLoved'),
('Wee Liang', 'Queenstown' , 'hygiene', 'diapers', '2', 'newCondition'),
('Amos Lee', 'Raffles Place' , 'hygiene', 'bib', '6', 'newCondition');

INSERT INTO donorlisting (username, category, item, quantity, itemcondition) VALUES
('Hyun Bin', 'hygiene', 'babyWipes', '2', 'newCondition'),
('Park Seo Joon', 'hygiene', 'diapers', '2', 'newCondition'),
('Kim Seokjin', 'hygiene', 'bib', '4', 'preLoved'),
('Kim Namjoon', 'clothing','male_clothing', '5', 'preLoved'),
('Min Yoongi', 'clothing','female_clothing', '3', 'preLoved'),
('Jung Hoseok', 'clothing','unisex_clothing', '4', 'newCondition'),
('Park Jimin', 'toys','books', '2', 'preLoved'),
('Kim Taehyung', 'toys','softToys', '2', 'newCondition'),
('Jeon Jungkook', 'toys','bathToys', '4', 'newCondition'),
('Kylie Jenner', 'clothing','unisex_clothing', '2', 'preLoved');
