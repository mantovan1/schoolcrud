create database schooldb;

use schooldb;

create table students (

	id int not null auto_increment,
	name varchar(260) not null,
	birth date not null,
	career varchar(260) not null,
	primary key(id)

);
