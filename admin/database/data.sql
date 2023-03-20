CREATE TABLE `gym_ms`.`admin_tbl` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(20) NOT NULL ,
    `password` VARCHAR(20) NOT NULL ,
    PRIMARY KEY (`id`)
    )

    create table company_profile (
    id bigint not null AUTO_INCREMENT,
    title varchar(255) not null,
    slogan varchar(255) DEFAULT null,
    address varchar(255) not null,
    secondary_address varchar(255) DEFAULT null,
    email varchar(120) DEFAULT null,
    secondary_email varchar(120) DEFAULT null,
    contact_no varchar(20) DEFAULT null,
    secondary_contact_no varchar(20) DEFAULT null,
    contact_person varchar(20) DEFAULT null,
    logo varchar(500) DEFAULT null,
    secondary_logo varchar(500) DEFAULT null,
    google_map text DEFAULT null,
    facebool_url varchar(1000) DEFAULT null,
    twitter_url varchar(1000) DEFAULT null,
    instagram_url varchar(1000) DEFAULT null,
    PRIMARY KEY(id)
);