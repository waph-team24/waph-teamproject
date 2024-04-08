# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

# Mini-Facebook

# Team members

1. Sai Kumar Gadde, gaddesr@mail.uc.edu
2. Dilip Kumar Gadde, sanipidr@mail.uc.edu
3. Uma Satwik Meka, mekauk@mail.uc.edu
4. Siva Sai Manoj Korlepara, korlepsj@mail.uc.edu

# Project Management Information

Source code repository (private access):  <https://github.com/waph-team10/waphteamproject/>

Project homepage (public): <https://github.com/waph-team24/waph-team24.github.io>

## Revision History

| Date        |   Version      |  Description |
|:------------|:-------------: |-------------:|
| 21/03/2024  |  0.0           | Init draft   |
| 04/04/2024  |  0.1           | Filling Document|



# Overview
 
# System Analysis

_(Start from Sprint 0, keep updating)_

# Demo (screenshots)

![Login_Form](img/s-1.jpeg)


![sucessful_Login](img/s-2.jpeg)


![Team_members_personalPage](img/s-7.jpeg)


![Test_page_gaddesr](img/s-3.jpeg)


![Test_page_sanipidr](img/s-4.jpeg)


![Test_page_mekauk](img/s-5.jpeg)


![Test_page_korlepsj](img/s-6.jpeg)


# Software Process Management

_(Start from Sprint 0, keep updating)_


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


# Appendix

#### Form.php
 ```html
        <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>WAPH Team24-Login page</title>
      <script type="text/javascript">
          function displayTime() {
            document.getElementById('digit-clock').innerHTML = "Current time:" + new Date();
          }
          setInterval(displayTime,500);
      </script>
    </head>
    <body>
      <h1>Mini Facebook Login Form</h1>
      <h2>Student Name</h2>
      <div id="digit-clock"></div>  
    <?php
      //some code here
      echo "Visited time: " . date("Y-m-d h:i:sa")
    ?>
      <form action="index.php" method="POST" class="form login">
        Username:<input type="text" class="text_field" name="username" /> <br>
        Password: <input type="password" class="text_field" name="password" /> <br>
        <button class="button" type="submit">Login</button>
      </form>
    </body>
    </html>
 ``` 
#### index.php
 ```php
        <?php
        session_start();    
        if (checklogin_mysql($_POST["username"],$_POST["password"])) {
    ?>
        <h2> Welcome <?php echo $_POST['username']; ?> !</h2>
    <?php       
        }else{
            echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
            die();
        }
        function checklogin($username, $password) {
            $account = array("admin","1234");
            if (($username== $account[0]) and ($password == $account[1])) 
              return TRUE;
            else 
              return FALSE;
        }
 ```
#### Database-account.sql
  ```sql
        create database waph_team;
        CREATE USER 'waph_team24'@'localhost' IDENTIFIED BY "Pa$$w0rd"
        GRANT ALL ON waph_team.* TO 'waph_team24'@'localhost';
 ```
#### Database-data.sql
 ```sql
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
    ```           