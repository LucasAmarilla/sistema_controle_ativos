create table tipo(
	id serial primary key,
	nome varchar(50),
	tipo varchar(255)
);

create table equipamento(
	id serial primary key,
	nome varchar(50),
	hertz_opera float,
	ativo boolean,
	tipo_id int,
	CONSTRAINT fk_ripo
      FOREIGN KEY(tipo_id) 
      REFERENCES tipo(id)
);

create table usuario(
	id serial primary key,
	email varchar(255),
	senha varchar(255)
);

ALTER TABLE tipo
ADD descrição varchar(255);

ALTER TABLE equipamento
ADD endereço varchar(255);

ALTER TABLE equipamento
ADD data_instalado date;

insert into tipo (nome, tipo, descrição) values ('EEAT', 'Distribuição', 'Estação elevatoria de agua tratada');
insert into tipo (nome, tipo, descrição) values ('EEAB', 'Captação', 'Estação elevatoria de agua bruta');

select * from tipo;

insert into equipamento(nome, hertz_opera, ativo, tipo_id, endereço) values ('EEAT Afonso pena', 60, 'true', 1,'Avenida afonso pena, 300');
insert into equipamento(nome, hertz_opera, ativo, tipo_id, endereço) values ('EEAB Guariroba', 50, 'false', 2,'MS 146 km12');

select * from equipamento as e inner join tipo as t on e.tipo_id = t.id;

insert into usuario(email, senha) values ('lucas@teste.com', '12345')

ALTER TABLE equipamento 
RENAME COLUMN endereço TO endereco;