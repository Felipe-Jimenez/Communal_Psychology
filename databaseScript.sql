create database proyecto_psicologia;

create table Administrador(
  id int primary key auto_increment,
  nombre varchar(30) not null,
  email varchar(30) not null,
  pasw varchar(100) not null,
  estatus int default 1,
  eliminado int default 0
);
create table Persona(
  curp varchar(18) primary key,
  nombre varchar(100) not null,
  sexo char not null,
  fecha_n date not null,
  codigo_postal int not null
);
create index NOMBRES on Persona(nombre);
create table Comunidad(
  id_Comunidad int primary key auto_increment,
  nombre varchar(30) not null,
  tipo varchar(20) not null,
  sistema_social varchar(20),
  interes_comun varchar(50) not null,
  objetivo varchar(100),
  n_participantes int default 0
);
create index CNOMBRES on Comunidad(nombre);
create table Rol(
  rol varchar(30) not null,
  id_persona varchar(18),
  id_comunidad int,
  estado int default 1
);
alter table Rol add foreign key (id_persona) references Persona(curp);
alter table Rol add foreign key (id_comunidad) references Comunidad(id_Comunidad);

create table Perfil(
  id_persona varchar(18) unique,
  salud_mental varchar(30),
  salud_fisica varchar(30)
);
alter table Perfil add foreign key (id_persona) references Persona(curp);

create table Perfi_comunal(
  id_comunidad int,
  tendencia varchar(50),
  recursos varchar(50),
  rango varchar(50)
);
alter table Perfi_comunal add foreign key (id_comunidad) references Comunidad(id_Comunidad);

create table Trastorno(
  nombre varchar(30) primary key,
  tipo varchar(20) not null,
  descripcion varchar(150) not null
);

create table Padecimiento(
  id_persona varchar(18),
  id_trastorno varchar(30),
  estado varchar(30) not null
);
alter table Padecimiento add foreign key(id_persona) references Persona(curp);
alter table Padecimiento add foreign key (id_trastorno) references Trastorno(nombre);


insert into Administrador values(0,'_denso','denso@gmail.com','fae0b27c451c728867a567e8c1bb4e53',1,0);


insert into Comunidad values(0,'CUCEI_social','Digital','Anarchy','Knowledge creation','maximize the university community',0);
insert into Perfi_comunal values(1,'Primary Problems','Low','High');
insert into Comunidad values(0,'Llama de Amor','Ethnic','Socialist','The love for own God','Create awareness in people about god',0);
insert into Perfi_comunal values(2,'Secondary Problems','Low','Middle');
insert into Comunidad values(0,'SubMind','Scientific','Comunist','Scientific knowledge','Develop research',0);
insert into Perfi_comunal values(3,'Secondary Problems','High','Low');
insert into Comunidad values(0,'FAD','Social','Anarchy','Art','Create street art',0);
insert into Perfi_comunal values(4,'Ternary Problems','Low','Low');
insert into Comunidad values(0,'UNAM-science','Scientific','Socialist','Scientific knowledge','Create a cure for COVID-19',0);
insert into Perfi_comunal values(5,'Secondary Problems','Middle','Middle');
insert into Comunidad values(0,'FEU','Politic','Comunist','The public politics into UDG','Represent the students of our university and be the voice of their choices',0);
insert into Perfi_comunal values(6,'Primary Problems','High','Low');
insert into Comunidad values(0,'QciFem','Social','Anarchy','Womens rights','Modify the to improve gender parity',0);
insert into Perfi_comunal values(7,'Primary Problems','Low','Middle');
insert into Comunidad values(0,'Little learning','Digital','Comunist','Learning','Make the web a best site to the kids learning',0);
insert into Perfi_comunal values(8,'Ternary Problems','Middle','High');
insert into Comunidad values(0,'Stack OverFlow','Digital','Utopic','Programming','Create a library of detailed answers for all questions programming',0);
insert into Perfi_comunal values(9,'Ternary Problems','Middle','High');
insert into Comunidad values(0,'ProgramadoresGDL','Social','Anarchy','Programming','Create a community to the newest programmers',0);
insert into Perfi_comunal values(10,'Secondary Problems','Middle','Low');

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

insert into Persona values('JICF000406HJCMSLA7','Felipe Alejandro Jimenez Castillo','M','2000-04-06',45645);
insert into Perfil values('JICF000406HJCMSLA7','Balanced','Critical');
insert into Rol values('Founder','JICF000406HJCMSLA7',3,1);
insert into Padecimiento values('JICF000406HJCMSLA7','Antisocial','Critical');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('BADD110313HCMLNS09','Davalos Arturo Daveson Darrell','M','2013-07-16',45875);
insert into Perfil values('BADD110313HCMLNS09','Balanced','Healthy');
insert into Rol values ('Admin','BADD110313HCMLNS09',3,1);
insert into Padecimiento values('BADD110313HCMLNS09','Antisocial','Starting');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('FOCM980826MJCLSR47','Maria Guadalupe Flores Castro','F','1998-08-26',45875);
insert into Perfil values('FOCM980826MJCLSR47','Healthy','Balanced');
insert into Rol values ('Moderator','FOCM980826MJCLSR47',3,1);
insert into Padecimiento values('FOCM980826MJCLSR47','Psychosis','Critical');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('SALA770826MTSLPR82','Araceli Salazar Lopez','F','1977-08-26',45875);
insert into Perfil values('SALA770826MTSLPR82','Healthy','Balanced');
insert into Rol values ('Member','SALA770826MTSLPR82',3,1);
insert into Padecimiento values('SALA770826MTSLPR82','Dissociative','Starting');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('RUMJ850212HJCZNS15','Jose de Jesus Ruiz Mendoza','M','1985-02-12',45875);
insert into Perfil values('RUMJ850212HJCZNS15','Healthy','Balanced');
insert into Rol values ('Member','RUMJ850212HJCZNS15',3,1);
insert into Padecimiento values('RUMJ850212HJCZNS15','Chronic anxiety','Critical');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('TOMJ000404HASRLS09','Jose Torres Maldonado','M','2000-04-04',85698);
insert into Perfil values('TOMJ000404HASRLS09','Balanced','Critical');
insert into Rol values ('Moderator','TOMJ000404HASRLS09',3,1);
insert into Padecimiento values('TOMJ000404HASRLS09','Obsessive compulsive','Starting');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('GOGM000608MJCNDR01','Maria Esperanza Gonzales Gudiño','F','2000-08-06',45645);
insert into Perfil values('GOGM000608MJCNDR01','Critical','Healthy');
insert into Rol values ('Moderator','GOGM000608MJCNDR01',3,1);
insert into Padecimiento values('GOGM000608MJCNDR01','Chronic anxiety','Critical');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 3;

insert into Persona values('AAZE950428HTLLMS01','Esteban a la Torre Zamora','M','1995-06-28',15689);
insert into Perfil values('AAZE950428HTLLMS01','Balanced','Balanced');
insert into Rol values ('Founder','AAZE950428HTLLMS01',4,1);
insert into Padecimiento values('AAZE950428HTLLMS01','Depression','Balanced');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 4;

insert into Persona values('OIHA770826MOCRRN27','Andrea Ortiz Hernandez','F','1977-08-26',74859);
insert into Perfil values('OIHA770826MOCRRN27','Critical','Balanced');
insert into Rol values ('Member','OIHA770826MOCRRN27',4,1);
insert into Padecimiento values('OIHA770826MOCRRN27','Nervous bulimia','Balanced');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 4;

insert into Persona values('GOVI770826MCXNRR88','Irma Vargaz Gonzales','F','1977-08-26',74859);
insert into Perfil values('GOVI770826MCXNRR88','Balanced','Balanced');
insert into Rol values ('Member','GOVI770826MCXNRR88',4,1);
insert into Padecimiento values('GOVI770826MCXNRR88','Bipolarity','Starting');
update Comunidad set n_participantes = n_participantes+1 where id_Comunidad = 4;


insert into Persona values('GOSA980915MNLNTR28','Armando Gonzales Soto','M','1998-09-15',45645);
insert into Perfil values('GOSA980915MNLNTR28','Balanced','Heakthy');

insert into Persona values('AAVM000317MJCNGRC9','Mariana Mayte Andrade Vega','F','2000-03-17',56568);
insert into Perfil values('AAVM000317MJCNGRC9','Critical','Critical');
