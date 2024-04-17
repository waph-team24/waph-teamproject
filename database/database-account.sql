create database waph_team;
create user 'waph-team24'@'localhost' IDENTIFIED BY 'team@24';
GRANT ALL ON  waph_team.* TO 'waph-team24'@'localhost';
