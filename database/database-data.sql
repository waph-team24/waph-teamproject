use waph_team;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;  
DROP TABLE IF EXISTS users;  
create table users(
	username varchar(255) PRIMARY KEY, 
	password varchar(100) NOT NULL,
	fullname varchar(100),
	otheremail varchar(100),
	phone varchar(10),
	status ENUM('active', 'disabled') DEFAULT 'active';
);
INSERT INTO users(username,password) VALUES ('test1',md5('test1'));
INSERT INTO users(username,password) VALUES ('test2',md5('test2'));

 
create table posts (
    postID INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL, 
    content VARCHAR(100),
    posttime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    owner VARCHAR(50),
    FOREIGN KEY (owner) REFERENCES users(username) ON DELETE CASCADE
);


create table comments (
    commentID INT AUTO_INCREMENT PRIMARY KEY,
    postID INT,
    comment VARCHAR(255) NOT NULL,
    commenter VARCHAR(50),
    commentTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (postID) REFERENCES posts(postID) ON DELETE CASCADE,
    FOREIGN KEY (commenter) REFERENCES users(username) ON DELETE CASCADE
);

create table superuser (
    username varchar(255) PRIMARY KEY, 
    password varchar(100) NOT NULL,
);

INSERT into superuser values ('admin',md5('admin'));
