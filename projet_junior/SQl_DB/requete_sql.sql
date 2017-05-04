 

 
 create  table etudiant (
 id_etudiant integer AUTO_INCREMENT not null , nom varchar(100) not null, pwd varchar(20) not null, email varchar(100) not null, 
 activite varchar(150), competence varchar(5000), disponible boolean , id_admin integer not null,
 constraint etudiant_pk primary key (id_etudiant),
 constraint association_fk foreign key (id_admin) REFERENCES association(id_admin)
 );
 
 
 create  table association (
 id_admin integer AUTO_INCREMENT not null , nom varchar(30), pwd varchar(20) not null, email varchar(100),
 constraint admin_pk primary key (id_admin)
 );
 
 
 create table entreprise (
 id_entreprise integer AUTO_INCREMENT not null , nom varchar(100) not null, pwd varchar(20) not null, email varchar(100) not null,
 activite varchar(150), competence varchar(5000), disponibilite boolean , id_admin integer not null,
 constraint entreprise_pk primary key (id_entreprise),
 constraint association_fk foreign key (id_admin) REFERENCES association(id_admin)
 );
 

create table convention (
   id_convention integer AUTO_INCREMENT not null, id_admin integer not null, id_entreprise integer not null, id_devis integer not null, realisation varchar(10000),
  constraint convention_pk primary key (id_convention),
  constraint admin_fk foreign key (id_admin) REFERENCES association(id_admin),
  constraint entreprise_fk foreign key (id_entreprise) REFERENCES entreprise(id_entreprise),
  constraint devis_fk foreign key (id_devis) REFERENCES devis(id_devis)
 );
 
 
create  table devis (
id_acteur integer AUTO_INCREMENT  not null, nom varchar(100), id_film integer not null, 
constraint pk_acteur primary key (id_acteur),
constraint fk_acteur foreign key (id_film) references film (id_film)
);

create  table mission (
id_mission integer AUTO_INCREMENT  not null, id_etudiant integer not null, 
intitule_mission varchar(150) not null, duree integer not null, remuneration integer ,
constraint mission_pk primary key (id_mission),
constraint etudiant_fk foreign key (id_etudiant) references etudiant (id_etudiant)
);


 