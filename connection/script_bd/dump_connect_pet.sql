create database if not exists connect_pet;

use connect_pet;

create table tutor(
id_tutor int(11) not null auto_increment,
cpf varchar(14) not null unique,
nome varchar(100) not null,
email varchar(30),
telefone varchar(14),
primary key(id_tutor)
);

create table endereco(
id_endereco int(11) not null auto_increment,
cep varchar(9) not null,
logradouro varchar(50) not null,
numero varchar(6) not null,
complemento varchar(50),
bairro varchar(20) not null,
cidade varchar(30) not null,
uf char(2) not null,
tutor_id int(11) not null,
primary key (id_endereco),
foreign key (tutor_id) references tutor(id_tutor)
);

create table pet(
id_pet int(11) not null auto_increment,
nome_pet varchar(50) not null,
especie int(2) not null,
raca int(2) not null,
data_nascimento date,
sexo char(1) not null,
castrado char(1) not null,
tutor_id int(11) not null,
primary key (id_pet),
foreign key (tutor_id) references tutor(id_tutor)
);

create table vacinacao(
id_vacina int(11) not null auto_increment,
id_pet int(11) not null,
data_vacina date,
tipo int(2),
primary key (id_vacina),
foreign key (id_pet) references pet(id_pet)
);

create table usuarios(
id_usuario int(11) not null auto_increment,
login varchar(14) not null unique,
senha varchar(20) not null,
tutor_id int(11) not null,
primary key (id_usuario),
foreign key (tutor_id) references tutor(id_tutor)
);



