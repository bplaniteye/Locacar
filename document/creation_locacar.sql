--
-- Base de données: LOCACAR
--
create database if not exists locacar default character set utf8 collate utf8_general_ci;
use locacar;
-- --------------------------------------------------------
-- Création des tables

set foreign_key_checks =0;

-- Table agence
drop table if exists agence;
create table agence (
age_id int not null auto_increment primary key,
age_ville  varchar(100) not null,
age_departement varchar(100) not null,
age_telephone varchar (100) not null,
age_adresse varchar (1000) not null,
age_info varchar (15000) not null
)engine=innodb;

-- Table client
drop table if exists client;
create table client (
cli_id int not null auto_increment primary key,
cli_nom  varchar(100) not null,
cli_prenom varchar(100) not null,
cli_login varchar(100) unique not null ,
cli_mdp varchar(500) not null,
cli_adresse varchar(100) not null,
cli_email varchar(100) not null,
cli_telephone varchar(100) not null
)engine=innodb;

-- Table voiture
drop table if exists voiture;
create table voiture (
voi_id int not null auto_increment primary key,
voi_marque varchar (500),
voi_immatriculation varchar(20),
voi_categorie int not null,
voi_localisation int 
)engine=innodb;

-- Table categorie
drop table if exists categorie;
create table categorie (
cat_id int not null auto_increment primary key,
cat_libelle  varchar(100) not null    
)engine=innodb;

-- Table accessoire
drop table if exists accessoire;
create table accessoire (
acc_id int not null auto_increment primary key ,
acc_libelle varchar(100) not null,
acc_prix float not null
)engine=innodb; 

-- Table location
drop table if exists location;
create table location (
loc_id int not null auto_increment primary key,
loc_debut datetime,
loc_fin datetime,
loc_type varchar(100),
loc_statut varchar(100),
loc_agencedepart int not null,
loc_agencearrivee int not null,
loc_client int not null,
loc_voiture int
)engine=innodb;

-- Table forfait
drop table if exists forfait;
create table forfait (
for_id int not null auto_increment primary key ,
for_location int not null,
for_accessoire int not null
)engine=innodb;

-- Table tranche
drop table if exists tranche;
create table tranche (
tra_id int not null auto_increment primary key ,
tra_dureemin int not null,
tra_dureemax int not null
)engine=innodb;

-- Table tarification
drop table if exists tarification;
create table tarification (
tar_id int not null auto_increment primary key ,
tar_categorie int not null,
tar_tranche int not null,
tar_prix float not null
)engine=innodb;

-- Table employe
drop table if exists employe;
create table employe (
emp_id int not null auto_increment primary key,
emp_nom  varchar(100) not null,
emp_prenom varchar(100) not null,
emp_login varchar(100) unique not null ,
emp_mdp varchar(500) not null,
emp_profil varchar(100),
emp_agence int 
)engine=innodb;
set foreign_key_checks =1;

-- Contraintes 
alter table employe add constraint cs1 foreign key (emp_agence) references agence(age_id) on delete cascade;
alter table forfait add constraint cs2 foreign key (for_accessoire) references accessoire(acc_id) on delete cascade;
alter table forfait add constraint cs3 foreign key (for_location) references location(loc_id) on delete cascade;
alter table location add constraint cs4 foreign key (loc_agencedepart) references agence(age_id) on delete cascade;
alter table location add constraint cs5 foreign key (loc_agencearrivee) references agence(age_id) on delete cascade;
alter table location add constraint cs6 foreign key (loc_client) references client(cli_id) on delete cascade;
alter table location add constraint cs7 foreign key (loc_voiture) references voiture(voi_id) on delete cascade;
alter table tarification add constraint cs8 foreign key (tar_categorie) references categorie(cat_id) on delete cascade;
alter table tarification add constraint cs9 foreign key (tar_tranche) references tranche(tra_id) on delete cascade;
alter table voiture add constraint cs10 foreign key (voi_localisation) references agence (age_id) on delete cascade;
alter table voiture add constraint cs11 foreign key (voi_categorie) references categorie(cat_id) on delete cascade;

-- Jeu de données tranche
insert into tranche values (null,0,12);
insert into tranche values (null,12,24);
insert into tranche values (null,24,1000000);

-- Jeu de données categorie   
insert into categorie values (null,'Petit');
insert into categorie values (null,'Moyen');
insert into categorie values (null,'Grand');
insert into categorie values (null,'Utilitaire');
insert into categorie values (null,'Prestige');
insert into categorie values (null,'Camping car');

-- Jeu de données accessoire
insert into accessoire  values (null,'Climatisation',10);
insert into accessoire  values (null,'GPS',7);
insert into accessoire  values (null,'Pneus-neige',23);
insert into accessoire  values (null,'Lecteur vidéo',5);
insert into accessoire  values (null,'Mini bar', 15);

-- Jeu de données tarification   
insert into tarification  values (null,1,1,4);
insert into tarification  values (null,1,2,3.5);
insert into tarification  values (null,1,3,3);
insert into tarification  values (null,2,1,5);
insert into tarification  values (null,2,2,4.5);
insert into tarification  values (null,2,3,4);
insert into tarification  values (null,3,1,7);
insert into tarification  values (null,3,2,6.5);
insert into tarification  values (null,3,3,6);
insert into tarification  values (null,4,1,3);
insert into tarification  values (null,4,2,2.5);
insert into tarification  values (null,4,3,2);
insert into tarification  values (null,5,1,15);
insert into tarification  values (null,5,2,14);
insert into tarification  values (null,5,3,13);
insert into tarification  values (null,6,1,17);
insert into tarification  values (null,6,2,16);
insert into tarification  values (null,6,3,15);