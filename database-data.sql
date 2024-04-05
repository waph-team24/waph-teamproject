drop table if exists users; 
drop table if exists messages; 
drop table if exists sends; 
drop table if exists received;

create table users(
username VARCHAR(255) PRIMARY KEY, password CHAR(32) NOT NULL);

create table messages(
message_ID INT PRIMARY KEY AUTO_INCREMENT, content TEXT NOT NULL,
type VARCHAR(50) NOT NULL,
timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

create table sends(
username VARCHAR(255) NOT NULL,
message_ID INT NOT NULL,
PRIMARY KEY(username, message_ID),
FOREIGN KEY (username) references users(username), FOREIGN KEY (message_ID) references messages(message_ID) );

create table received(
username VARCHAR(255) NOT NULL,
message_ID INT NOT NULL,
PRIMARY KEY(username, message_ID),
FOREIGN KEY (username) references users(username), FOREIGN KEY (message_ID) references messages(message_ID) );