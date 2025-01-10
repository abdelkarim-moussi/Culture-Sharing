
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

-- comments table
create table comments(
comment_id int primary key auto_increment,
visitor_id int,
article_id int,
com_content text not null,
foreign key(visitor_id) references users(user_id) on delete cascade on update cascade,
foreign key(article_id) references articles(article_id) on delete cascade on update cascade
);

-- tags table
create table tags(
  tag_id int primary key auto_increment,
  tag_name varchar(10) not null
);

-- articles_tags associated table
create table articles_tags(
article_id int,
tag_id int,
primary key(article_id,tag_id),
foreign key(article_id) references articles(article_id) on delete cascade on update cascade,
foreign key(tag_id) references tags(tag_id) on delete cascade on update cascade
);



-- Trouver le nombre total d'articles publiés par catégorie.

SELECT COUNT(*) FROM articles GROUP BY categorie_id;

-- Identifier les auteurs les plus actifs en fonction du nombre d'articles publiés.

SELECT firstname,COUNT(*) AS num FROM users JOIN articles WHERE users.user_id = articles.user_id
GROUP BY firstname
ORDER BY num DESC;

--moyen des articles par categorie
select avg(art_count) as article_moyen
from(
select categorie_id, count(article_id) as art_count  from articles
group by categorie_id
) as counts;

-- les categories qui ont auncun article

SELECT c.categorie_name
FROM categories c
LEFT JOIN articles a ON c.categorie_id = a.categorie_id
GROUP BY c.categorie_name
HAVING COUNT(a.article_id) = 0;

-- Vue pour afficher les articles publier dans les derinier 30 jours
drop view if exists afficher_dernier_articles;
CREATE VIEW afficher_dernier_articles AS
SELECT *
FROM articles
where pub_date >= date_sub(curdate() , interval 30 day);







