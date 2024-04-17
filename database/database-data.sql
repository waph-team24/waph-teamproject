drop table if exists users; 
drop table if exists messages; 
drop table if exists sends; 
drop table if exists received;

create table users(
	username varchar(255) PRIMARY KEY, 
	password varchar(100) NOT NULL,
	fullname varchar(100),
	otheremail varchar(100),
	phone varchar(10));
INSERT INTO users(username,password) VALUES ('test1',md5('test1'));
INSERT INTO users(username,password) VALUES ('test2',md5('test2'));

drop table if exists posts; 
create table posts(
	postID int PRIMARY KEY, 
	title varchar(100) NOT NULL,
	content varchar(100),
	posttime varchar(100),
	owner varchar(100),
	FOREIGN KEY (`owner`) REFERENCES `users`(`username`) ON DELETE CASCADE);

