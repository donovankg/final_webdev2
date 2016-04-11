//run queries in final_db

CREATE TABLE `users` (
`user_id` int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 user_email varchar(100) NOT NULL,
  user_password varchar(100) NOT NULL,
  user_display_name varchar(100) NOT NULL,
  user_role varchar(100) NOT NULL,
  user_active varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO users (user_email, user_password, user_display_name, user_role, user_active)
value
('bob@email.com','1234','bob','user','active'),
('sally@email.com','1234','sally','user','active'),
('admin@email.com','1234','admin','user','active');