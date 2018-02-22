/*创建blog数据库*/
create database blog;
use blog;
/*留言表*/
create table if not exists guestboard(
id int(8) not null AUTO_INCREMENT,
username varchar(16) not null,
email varchar(24),
content text not null,
content_date datetime not null,
ipaddr varchar(64),
browser varchar(16),
os varchar(16),
up int(10) default 0,
profile varchar(64) default "../src/img/profile.jpg",
primary key(id)
)DEFAULT CHARSET=utf8;

/*访问量表*/
create table if not exists views(count int (10) default 1);
insert into views(count)values(1);