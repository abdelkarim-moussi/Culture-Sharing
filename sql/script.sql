
-- create database
create database csdb;

-- create users table
create table users(
user_id int primary key auto_increment not null,  
firstname varchar(50) not null,
lastname varchar(50) not null,
email varchar(100) not null,
password varchar(255) not null,
role enum ("admin","author","visitor") 
);

-- create categories table
create table categories(
categorie_id int primary key auto_increment not null,
categorie_name varchar(50) not null
);

-- create articles table

create table articles(
articlee_id int primary key auto_increment not null,
user_id int,
categorie_id int,
title varchar(200) not null,
content text not null,
pub_date date,
image varchar(100) ,
foreign key (user_id) references users(user_id) on delete cascade on update cascade,
foreign key (categorie_id) references categoriescategoriescategories(categorie_id) on delete cascade on update cascade
);


