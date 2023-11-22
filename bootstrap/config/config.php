
<?php

$database_config = [
    "host" => "localhost",
    "user" => "root",
    "password" => "",
    "database" => "advance_crud"
];


/*

create table user(
    -> id int(10) unsigned not null auto_increment,
    -> name varchar(256) not null,
    -> email varchar(256) not null,
    -> password varchar(256) not null,
    -> created_at datetime default current_time,
    -> primary key(id));


    create table folder(
    ->  id int(10) unsigned not null auto_increment,
    ->  name varchar(256) not null,
    -> user_id int(10) unsigned,
    ->  created_at datetime default current_time,
    -> constraint fk_uid foreign key (user_id) references user(id));


    create table task(
    -> id int(10) unsigned not null auto_increment,
    ->  title varchar(256) not null,
    ->  user_id int(10) unsigned,
    -> folder_id int(10) unsigned,
    -> created_at datetime default current_time,
    -> primary key(id),
    ->  constraint fk_userid foreign key (user_id) references user(id),
    -> constraint fk_fid foreign key (folder_id) references folder(id));
    */

?>

