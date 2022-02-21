create database phplearn;

create table posts(
	post_id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    subject varchar(128) not null,
    content varchar(1000) not null,
    date datetime not null
);

create table users(
	user_id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    user_name text not null,
    user_passwd text not null
);

insert into posts (subject, content, date) VALUES ('This is the subject', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non dictum nisl. Fusce suscipit, est ut ullamcorper sagittis, arcu nibh venenatis metus, ut tristique mi est ut mauris. Quisque hendrerit metus sit amet lectus faucibus, ac laoreet.', '2022-02-21 03:33:25');