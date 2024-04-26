
## Instructor: Dr. Phu Phung

# Mini-Facebook

# Team members

1. Sai Kumar Gadde, gaddesr@mail.uc.edu
2. Dilip Kumar Sanipina, sanipidr@mail.uc.edu
3. Uma Satwik Meka, mekauk@mail.uc.edu
4. Siva Sai Manoj Korlepara, korlepsj@mail.uc.edu

# Project Management Information

Source code repository (private access):  <https://github.com/waph-team10/waphteamproject/>

Project homepage (public): <https://github.com/waph-team24/waph-team24.github.io>

## Revision History

| Date        |   Version      |  Description |
|:------------|:-------------: |-------------:|
| 21/03/2024  |  0.0           | Sprint 0     |
| 04/04/2024  |  0.1           | Sprint 1     |
| 20/04/2024  |  0.2           | Sprint 2.    |


# Overview
 
# System Analysis

(Start from Sprint 0, keep updating)

# Demo (screenshots)

![Login_Form](img/s-1.jpeg)


![sucessful_Login](img/s-2.jpeg)


![Team_members_personalPage](img/s-7.jpeg)


![Test_page_gaddesr](img/s-3.jpeg)


![Test_page_sanipidr](img/s-4.jpeg)


![Test_page_mekauk](img/s-5.jpeg)


![Test_page_korlepsj](img/s-6.jpeg)


# Software Process Management

(Start from Sprint 0, keep updating)


## Scrum process

All of our teammates uses Google Meet and Discord to communicate efficiently. We have a stand-up meeting on Google Meet every day to go over tasks and make sure everyone is informed of their responsibilities. With the help of this conference, we can identify any dependencies or hurdles so that we may tackle challenges head-on. Throughout the day, we exchange questions, quick updates, and quick cooperation via Discord. We speak often. At the conclusion of the day, we meet together to talk about what happened, evaluate our progress, and establish plans for the next day. This comprehensive approach to communication promotes accountability, transparency, and fruitful teamwork among our members.



### Sprint 0

Duration: 21/03/2024-27/03/2024

#### Completed Tasks: 

1. In sprint 0 we have created public and private repositories and name them as "Waph-teamproject" and                   " Waph-team24.github.io".
2. We have generated ssl keys and certificates for the team project and configure the https for the local domain.
3. We have develop the database for team project.
4. We also developed a individual home page for all of them and we have satisfied the requirements based on lab3 & lab4 for the team project.
5. We have tested the functionality using using index.html.

#### Contributions: 

1. Saikumar Gadde has done 7 commits over 5 hours and contributed in creating ssl keys and certificates for the team project amd creation of team personal home page.
2. Dilip Kumar Sanipina has done 4 commits over 4 hours and contributed in creating team repo's and public repo and database creation and contirbuted in developing form and index .php files.
3. Uma Satwik Meka has done 2 commits over 3 hours contributed in creation of setup database structure and index.html.
4. Manoj Kumar Korelpara has done 2 commits over 3 hours contributed in readme file and database setup.

### Sprint 1

Duration: 28/03/2024-07/03/2024

#### Completed Tasks: 

1. In sprint 1 we have completed designing the database and created the user-table,host tables and also created database-data.sql file.
2. we also created the user registration and login and change passwords

#### Contributions: 

1. Saikumar Gadde has done 5 commits over 6 hours and contributed in creating database design and developing database-data.sql 
2. Dilip Kumar Sanipina has done 3 commits over 5 hours and contributed in creating registration form and other php files. 
3. Uma Satwik Meka has done 2 commits over 4 hours contributed in modificarion of userregistrationform and index files.
4. Manoj Kumar Korelpara has done 2 commits over 3 hours contributed in dealing with change password and  creating readme file.



#### Database-account.sql
  sql
          create database waph_team;
          CREATE USER 'waph-team24'@'localhost' IDENTIFIED BY "team@24";
          GRANT ALL ON waph_team.* TO 'waph-team24'@'localhost';
 

#### Database-data.sql
 sql
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



![database-data](img/s-8.jpeg)


- The ER (Entity-Relationship) diagram shows the structure and relationships between the "users" and "posts" tables. In the graphic, the "users" table is the primary entity, comprising characteristics such as "username," "password," "fullname," "otheremail," and "phone," with "username" serving as the primary key. This table contains information about specific system users, each of whom is recognized by a username.

- In contrast, the "posts" table stores information about user-created postings. It contains attributes such as "postID," "title," "content," "posttime," and "owner." Here, "postID" is the primary key. The "owner" field has a link with the "username" attribute in the "users" table, indicating who created each post. This relationship is represented as a one-to-many association, which means that one user can create several postings.

- Furthermore, the ER diagram exhibits referential integrity between the two tables using a foreign key constraint. The "owner" element in the "posts" table refers to the "username" field in the "users" table. This constraint requires a post's owner to be a genuine user in the system, eliminating orphaned records and maintaining data consistency. Furthermore, the ON DELETE CASCADE constraint given on the foreign key ensures that when a user is deleted from the system, all posts connected with that user are automatically removed, preventing referential integrity issues.

#### Form.php

![form.php code](img/form.jpeg)

![successful_login_page](img/s-10.jpeg)

#### changepassword.php

![chnagepassword.php code](img/pass.jpeg)

![Changed_password_page](img/s-11.jpeg)


#### session_auth.php 

![session auth.php code](img/s-10.jpeg)

 

![Attack_detected](img/s-12.jpeg)


#### Registration_form.php

 ![Registrationfprm.php code](img/s-10.jpeg)


![Registration_form](img/s-13.jpeg) 


![Successful_registration](img/s-14.jpeg)   


### SPRINT : 2

#### Completed Tasks:

##### Task-1: Database Restructuring
- Created new tables: posts, messages, comments for better data organization.
##### Task-2: User Post Viewing
- Implemented functionality allowing users to view posts of other users post-login.
##### Task-3: User Post Creation
- Enabled users to add new posts post-login.
##### Task-4: Post Editing and Deletion
- Restricted post editing and deletion to the original user for security and control purposes.
##### Task-5: Post Comments
- Implemented the ability for users to comment on posts made by others.
##### Task-6: Documentation Update
- Updated the README file to reflect changes made in this sprint.
c

![After_Login_Successfully](img/s-16.jpeg)

![EditUser_ProfileForm](img/s-17.jpeg)

![Profile Updated_Successfully](img/s-18.jpeg)

![ChangePassword_form](img/s-19.jpeg)

![Password_changed](img/s-20.jpeg)

![Creating Post](img/s-21.jpeg)

![View Post](img/s-22.jpeg)

![Comment_Post](img/s-23.jpeg)

![Comment Post](img/s-24.jpeg)

![Log out](img/s-25.jpeg)

#### Team Members Contribution:

1. Dilip Kumar Sanipina contribution in completing Task-3, Task-6, and updated Index.php file, 5 hours and 3 commits. 
2. Sai Kumar Gadde contribution 2 commits, 3 hours, contributed in Task-4 frontend and backend, and also made changes to database.php file.
3. Siva Sai Manoj Korlepara Contributed in Task-5, and Task-4 delete post with 2 commits and 3 hours. 
4. Uma Sathvik Meka contribution 2 commits,3 hours, contributed in Task-3 and contributed in solve the bugs and documentation 

### SPRINT :3 

#### Completed Tasks: 

- Here we have created database for superuser and created super userform.
![](img/s-26.jpeg)
![](img/s-27.jpeg)





#### SECURITY AND NON-FUNCTATIONAL REQUIREMENTS
![](img/sn-1.jpeg)
![](img/sn-3.jpeg)
![](img/sn-3.1.jpeg)
![](img/sn-4.jpeg)
![](img/sn-5.jpeg)
![](img/sn-6.jpeg)
![](img/sn-7.jpeg)
![](img/sn-7.1.jpeg)

![](img/sn-8.1.jpeg)
![](img/sn-8.2.jpeg)
![](img/sn-8.3.jpeg)
![](img/sn-8.4.jpeg)
![](img/sn-8.5.jpeg)
![](img/sn-9.jpeg) 

# Appendix

- demo video: (https://youtu.be/zywN3zHJUgs) 

- team website: (https://waph-team24.minifacebook.com)




