CREATE DATABASE logintut;

CREATE TABLE users (
    user_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	uname TINYTEXT NOT NULL,
    uemail TINYTEXT NOT NULL,
    upwd LONGTEXT NOT NULL
);

CREATE TABLE friends (
    user_id INT NOT NULL,
    friend_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (friend_id) REFERENCES users(user_id)
);

CREATE TABLE message (
	message_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    message LONGTEXT NOT NULL,
    sender INT NOT NULL,
    receiver INT NOT NULL,
    FOREIGN KEY (sender) REFERENCES users(user_id),
    FOREIGN KEY (receiver) REFERENCES users(user_id)
);