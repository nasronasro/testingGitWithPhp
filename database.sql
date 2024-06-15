create database GestionApprenant;
use GestionApprenant;

create table accounts(
id int auto_increment primary key,
nom varchar(50) not null,
email varchar(50) not null unique,
username varchar(50) not null unique,
password varchar(100) not null
)

