create database proyecto_psicologia;

create table Administrador(
  id int primary key auto_increment,
  nombre varchar(30) not null,
  email varchar(30) not null,
  pasw varchar(100) not null,
  estatus int default(1),
  eliminado int default(0)
);
create table Persona(
  curp varchar(18) primary key,
  nombre varchar(100) not null,
  sexo char not null,
  fecha_n date not null,
  codigo_postal int not null
);
create table Comunidad(
  id_Comunidad int primary key auto_increment,
  nombre varchar(30) not null,
  tipo varchar(20) not null,
  sistema_social varchar(20),
  interes_comun varchar(50) not null,
  objetivo varchar(50),
  n_participantes int default(0)
);
create table Rol(
  rol varchar(30) not null,
  id_persona varchar(18),
  id_comunidad int,
  estado int default(1)
);
alter table Rol add foreign key (id_persona) references Persona(curp);
alter table Rol add foreign key (id_comunidad) references Comunidad(id_Comunidad);

create table Com_Per(
  id_comunidad int,
  id_persona varchar(18)
);
alter table Com_Per add foreign key (id_comunidad) references Comunidad(id_Comunidad);
alter table Com_Per add foreign key (id_persona) references Persona(curp);

create table Perfil(
  id_persona varchar(18),
  salud_mental varchar(30),
  salud_fisica varchar(30),
  area_des varchar(30)
);
alter table Perfil add foreign key (id_persona) references Persona(curp);

create table Padecimiento(
  id_perfil varchar(18),
  estado varchar(30) not null
);
alter table Padecimiento add foreign key(id_perfil) references Perfil(id_persona);

create table Trastorno(
  nombre varchar(30) primary key,
  tipo varchar(20) not null,
  descripcion varchar(150) not null
);
create table Pade_Tras(
  id_padecimiento varchar(18),
  id_trastorno varchar(30)
);
alter table Pade_Tras add foreign key (id_padecimiento) references Padecimiento(id_perfil);
alter table Pade_Tras add foreign key (id_trastorno) references Trastorno(nombre);


//ADMINISTRATOR
insert into Administrador values(0,'_denso','denso@gmail.com','fae0b27c451c728867a567e8c1bb4e53',1,0);

//COMUNITY
insert into Comunidad values(0,'CUCEI_social','Digital','Anarchy','Knowledge creation','maximize the university community',0);
insert into Comunidad values(0,'Llama de Amor','Ethnic','Socialist','The love for own God','Create awareness in people about god',0);
insert into Comunidad values(0,'SubMind','Scientific','Comunist','Scientific knowledge','Develop research',0);
insert into Comunidad values(0,'FAD','Social','Anarchy','Art','Create street art',0);
insert into Comunidad values(0,'UNAM-science','Scientific','Socialist','Scientific knowledge','Create a cure for COVID-19',0);
insert into Comunidad values(0,'FEU','Politic','Comunist','The public politics into UDG','Represent the students of our university and be the voice of their choices',0);

//TRASTORNS
insert into Trastorno values('Minor psychosis','Mental','Small hallucinations, emotional imbalance and irrationality');
insert into Trastorno values('Psychosis','Mental','Distorted thinking and knowledge');
insert into Trastorno values('Chronic anxiety','Mental','Episodes of fear and terror in common situations for the person');
insert into Trastorno values('Humor','Mental','Lingering feelings of sadness or periods with overflowing joy');
insert into Trastorno values('Dissociative','Mental','Severe disturbances or changes in memory, identity and general consciousness');
insert into Trastorno values('Obsessive compulsive','Mental','The individual experiences intrusive thoughts, ideas, or images related to fear, anguish, and stress');
insert into Trastorno values('Bipolarity','Mental','Exaggerated changes in mood, from mania to major depression');
insert into Trastorno values('Depression','Mental','Psychopathology that weakens and affects how the individual feels, thinks and acts');
insert into Trastorno values('Antisocial','Mental','Tendency to not relate in society, avoiding any interaction, shy, depressed and have social anxiety');
insert into Trastorno values('Nervous bulimia','Alimentary','Abnormal eating patterns, with episodes of massive food intake followed by maneuvers seeking to eliminate those calories');

//PERSONAS y COMUNIDAD
insert into Persona values('JICF000406HJCMSLA7','Felipe Alejandro Jimenez Castillo','M','2000-04-06',45645);
insert into Rol values ('Founder','JICF000406HJCMSLA7',3,1);
insert into Com_Per values(3,'JICF000406HJCMSLA7');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('BADD110313HCMLNS09','Davalos Arturo Daveson Darrell','M','2013-07-16',45875);
insert into Rol values ('Admin','BADD110313HCMLNS09',3,1);
insert into Com_Per values(3,'BADD110313HCMLNS09');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('FOCM980826MJCLSR47','Maria Guadalupe Flores Castro','F','1998-08-26',45875);
insert into Rol values ('Member','FOCM980826MJCLSR47',3,1);
insert into Com_Per values(3,'FOCM980826MJCLSR47');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('SALA770826MTSLPR82','Araceli Salazar Lopez','F','1977-08-26',45875);
  insert into Rol values ('Member','SALA770826MTSLPR82',3,1);
insert into Com_Per values(3,'SALA770826MTSLPR82');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('RUMJ850212HJCZNS15','Jose de Jesus Ruiz Mendoza','M','1985-02-12',45875);
  insert into Rol values ('Member','RUMJ850212HJCZNS15',3,1);
insert into Com_Per values(3,'RUMJ850212HJCZNS15');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;
