SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE messages (
  message_id int(6) UNSIGNED NOT NULL,
    message varchar(30) NOT NULL,
  owner varchar(30) NOT NULL,
    reg_date timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
); 


    ALTER TABLE messages
    ADD PRIMARY KEY (message_id);


    ALTER TABLE messages
    MODIFY message_id int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
    COMMIT;


); 

