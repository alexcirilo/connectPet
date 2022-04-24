create database if not exists connect_pet;

use connect_pet;

create table tutor(
id_tutor int(11) not null auto_increment,
cpf varchar(14) not null unique,
nome varchar(100) not null,
email varchar(30),
telefone varchar(14),
status varchar(1),
dt_status date null,
primary key(id_tutor, cpf)
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
especie varchar(10) not null,
raca varchar(30) not null,
data_nascimento date,
pelagem varchar(20),
sexo char(1) not null,
castrado char(1) not null,
microchip varchar(15),
local_implantacao varchar(20),
foto varchar(45),
status varchar(1),
dt_status date null,
id_tutor int(11) not null,
primary key (id_pet),
foreign key (id_tutor) references tutor(id_tutor)
);

create table vacina(
id_vacina int(11) not null auto_increment,
codigo int(11) not null unique,
descricao varchar(40),
lote varchar(20),
laboratorio varchar(20),
quantidade int(11),
validade date,
status varchar(1),
dt_status date null,
primary key (id_vacina)
);

create table vacinacao(
id_vacinacao int(11) not null auto_increment,
id_pet int(11) not null,
data_vacina date,
tipo int(2),
id_vacina int(11) not null,
codigo int(11) not null,
primary key (id_vacinacao),
foreign key (id_vacina) references vacina(id_vacina),
foreign key (codigo) references vacina(codigo),
foreign key (id_pet) references pet(id_pet)
);

create table funcao(
id_funcao int(11) not null auto_increment,
codigo int(4) not null,
descricao varchar(60),
status varchar(1),
dt_status date null,
primary key (id_funcao, codigo)
);

create table usuarios(
id_usuario int(11) not null auto_increment,
cpf varchar(14) not null unique,
senha varchar(20) not null,
nome varchar(100) not null,
id_funcao int(2),
registro varchar(10),
conselho varchar(15),
email varchar(45),
perfil int(2),
status varchar(1),
dt_status date null,
primary key (id_usuario,cpf),
foreign key (id_funcao) references funcao(id_funcao)
);

create table campanha(
id_campanha int(11) not null auto_increment,
cpf_tutor varchar(14) not null,
cpf_vacinador varchar(14) not null,
data_vacinacao date,
status varchar(1),
dt_status date null,
primary key (id_campanha),
foreign key (cpf_tutor) references tutor(cpf),
foreign key (cpf_vacinador) references usuarios(cpf)
);


