<?php
$cons  = mysql_connect("localhost", "root", "");
mysql_select_db('db');

// table schema for "users"
//1	id_user Primary	int(11) AUTO_INCREMENT	 
//2	name	varchar(128)				 
//3	email	varchar(64)				 
//4	username	varchar(16)				 
//5	password	varchar(32)				 
//6	confirmcode	varchar(32)				 
//User registration reference ------- https://github.com/simfatic/RegistrationForm

?>
