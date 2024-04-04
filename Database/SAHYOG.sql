-- Database: `SAHYOG`
CREATE TABLE `hospitals` (
    `username` varchar(50),
    `hospital_id` varchar(50), 
    `password` varchar(50), 
    `register_time` varchar(50), 
    `status` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `hospital_info`(
    `sr` INT NOT NULL,
    `hospital_id` varchar(50), 
    `hospital_name` varchar(50), 
    `city` varchar(50), 
    `address` varchar(50), 
    `state` varchar(50),
     `pincode` varchar(50), 
     `phonenumber` varchar(10), 
     `email` varchar(50), 
     `category` varchar(50),
     `website` varchar(50), 
     `beds` int(255), 
     `available_bad` int(255), 
     `Total_emergency_beds` int(255), 
     `available_emergency_bad` int(255),
     `Total_icu_beds` int(255),
     `available_icu_beds` int(255),
     `Total_general_beds` int(255),
     `available_general_bad` int(255), 
     `last_updated` varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users`(
    `username` varchar(50) ,
    `user_id` varchar(50),
    `password` varchar(50),
    `register_time` varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user_info`(
    `user_id` varchar(50), 
    `username` varchar(50), 
    `city` varchar(50), 
    `address` varchar(50), 
    `state` varchar(50), 
    `phonenumber` varchar(50), 
    `email` varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `hospital_info`
  ADD PRIMARY KEY (`sr`);

ALTER TABLE `hospital_info`
    MODIFY `sr` INT  NOT NULL AUTO_INCREMENT;

