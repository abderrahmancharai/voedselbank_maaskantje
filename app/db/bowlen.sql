drop DATABASE bowlen3;
CREATE DATABASE bowlen3;
USE bowlen3;


CREATE TABLE TypePersoon (
	Id 					 int  	 			NOT NULL auto_increment
    ,Naam              varchar(255)              not null
         ,IsActive        bool                   null
    ,Opmerking        varchar(500)      null
    ,DatumAangemaakt  date		 not null
    ,Datumgewijzigd    date		not null
		,PRIMARY KEY (Id)
)engine=InnoDB;


CREATE TABLE Persoon (
	Id 					 int  	 			NOT NULL auto_increment
    ,TypePersoonId 		  int 		         NOT NULL   
    ,Voornaam  varchar(255)       not null
    ,Tussenvoegsel   varchar(255)    null
    ,Achternaam      varchar (255)  not null
    ,Roepnaam         varchar (255)    not null
    ,IsVolwassen    int (2)           not null
     ,IsActive        bool                   null
    ,Opmerking        varchar(500)      null
    ,DatumAangemaakt  datetime		 not null
    ,Datumgewijzigd    datetime		not null
		,primary key (Id)
    	,foreign key (TypePersoonId  ) references TypePersoon(Id)
)engine=InnoDB;


CREATE TABLE contact (
	Id 					 int  	 			NOT NULL auto_increment
    ,PersoonId 		  int 		         NOT NULL   
    ,Mobiel 	 	int(12)       not null
    ,Email   		varchar(101)     not  null
     ,IsActive        bool                   null
    ,Opmerking        varchar(500)      null
    ,DatumAangemaakt  date		 not null
    ,Datumgewijzigd    date		not null
		,primary key (Id)
    	,foreign key (PersoonId) references Persoon(Id)
)engine=InnoDB;


INSERT INTO typepersoon (Id, Naam, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, 'klant', NULL, NULL, SYSDATE(), SYSDATE());
INSERT INTO typepersoon (Id, Naam, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, 'medewerker', NULL, NULL, SYSDATE(), SYSDATE());
INSERT INTO typepersoon (Id, Naam, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, 'gast', NULL, NULL, SYSDATE(), SYSDATE());

INSERT INTO persoon (Id, TypePersoonId, Voornaam, Tussenvoegsel, Achternaam, Roepnaam, IsVolwassen, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, '1', 'mazin', NULL, 'jamil', 'mazin', '1', NULL, NULL, SYSDATE(), SYSDATE());
INSERT INTO persoon (Id, TypePersoonId, Voornaam, Tussenvoegsel, Achternaam, Roepnaam, IsVolwassen, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, '1', 'arjan', 'de', 'ruijter', 'arjan', '1', NULL, NULL, SYSDATE(), SYSDATE());
INSERT INTO persoon (Id, TypePersoonId, Voornaam, Tussenvoegsel, Achternaam, Roepnaam, IsVolwassen, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, '1', 'Hans', NULL, 'odijk', 'Hans', '1', NULL, NULL, SYSDATE(), SYSDATE());
INSERT INTO persoon (Id, TypePersoonId, Voornaam, Tussenvoegsel, Achternaam, Roepnaam, IsVolwassen, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, '1', 'Dennis', 'van', 'wakeren', 'Dennis', '1', NULL, NULL, SYSDATE(), SYSDATE());
INSERT INTO persoon (Id, TypePersoonId, Voornaam, Tussenvoegsel, Achternaam, Roepnaam, IsVolwassen, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, '1', 'wilco', 'van de', '	
grift', 'wilco', '1', NULL, NULL, SYSDATE(), SYSDATE());

INSERT INTO contact (Id, PersoonId, Mobiel, Email, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, '1', '612365478', 'm.jamil@gmail.com', NULL, NULL, SYSDATE(), SYSDATE());
INSERT INTO contact (Id, PersoonId, Mobiel, Email, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, '2', '637264532', 'a.ruijtergamil.com', NULL, NULL, SYSDATE(), SYSDATE());
INSERT INTO contact (Id, PersoonId, Mobiel, Email, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, '3', '639451238', 'h.odijk@gmail.com', NULL, NULL, SYSDATE(), SYSDATE());
INSERT INTO contact (Id, PersoonId, Mobiel, Email, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, '4', '693234612', 'd.van.wakeren@gmail.com', NULL, NULL, SYSDATE(), SYSDATE());
INSERT INTO contact (Id, PersoonId, Mobiel, Email, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd) VALUES (NULL, '5', '693234694', 'w.van.de.grift@gmail.com', NULL, NULL, SYSDATE(), SYSDATE());






