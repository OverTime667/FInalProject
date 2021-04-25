SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE posts (
  post_id int(6) UNSIGNED NOT NULL,
  owner varchar(30) NOT NULL,
  brand varchar(30) NOT NULL,
  price INT(8) NOT NULL,
  location varchar(10) NOT NULL,
  milage varchar(16) NOT NULL,
  seats INT(1) NOT NULL,
  availability varchar(10) NOT NULL,
  date_of_model varchar(50) NOT NULL,
    date_of_post timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  fees varchar(16) NOT NULL,
  dateSold DateTime,
  image varchar(300),
  other varchar(500)

); 


ALTER TABLE posts
  ADD PRIMARY KEY (post_id);


ALTER TABLE posts
  MODIFY post_id int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
