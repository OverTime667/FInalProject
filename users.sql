SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE users (
  user_id int(6) UNSIGNED NOT NULL,
  email varchar(30) NOT NULL,
  username varchar(30) NOT NULL,
  phone varchar(10) NOT NULL,
  password varchar(16) NOT NULL,
  subscription varchar(10) NOT NULL,
  status varchar(10) NOT NULL,
  reg_date timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
); 

INSERT INTO users (user_id, email, username, phone, password, subscription, status, reg_date) VALUES
(1, 'joel@gmail.com', 'Joel', '1112223333','123','no','admin', '2021-04-12 18:03:42'),
(2, 'raji@gmail.com', 'Raji', '2223334444','222','no','admin', '2021-04-12 16:52:24');

ALTER TABLE users
  ADD PRIMARY KEY (user_id);


ALTER TABLE users
  MODIFY user_id int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;


