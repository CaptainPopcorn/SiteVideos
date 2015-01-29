#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


CREATE TABLE t_Videos(
        idVideo     int (11) Auto_increment  NOT NULL ,
        nomVideo    Varchar (100) NOT NULL ,
        urlVideo    Varchar (250) NOT NULL ,
        Description Text NOT NULL ,
        PRIMARY KEY (idVideo ) ,
        UNIQUE (urlVideo )
)ENGINE=InnoDB;


CREATE TABLE t_Utilisateurs(
        idUtilisateur  int (11) Auto_increment  NOT NULL ,
        nomUtilisateur Varchar (50) NOT NULL ,
        motDePasse     Varchar (50) NOT NULL ,
        email          Varchar (100) NOT NULL ,
        PRIMARY KEY (idUtilisateur ) ,
        UNIQUE (nomUtilisateur ,email )
)ENGINE=InnoDB;


CREATE TABLE Noter(
        Note          Int NOT NULL ,
        idVideo       Int NOT NULL ,
        idUtilisateur Int NOT NULL ,
        PRIMARY KEY (idVideo ,idUtilisateur )
)ENGINE=InnoDB;


CREATE TABLE Commenter(
        Commentaire   Varchar (250) NOT NULL ,
        idVideo       Int NOT NULL ,
        idUtilisateur Int NOT NULL ,
        PRIMARY KEY (idVideo ,idUtilisateur )
)ENGINE=InnoDB;

ALTER TABLE Noter ADD CONSTRAINT FK_Noter_idVideo FOREIGN KEY (idVideo) REFERENCES t_Videos(idVideo);
ALTER TABLE Noter ADD CONSTRAINT FK_Noter_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES t_Utilisateurs(idUtilisateur);
ALTER TABLE Commenter ADD CONSTRAINT FK_Commenter_idVideo FOREIGN KEY (idVideo) REFERENCES t_Videos(idVideo);
ALTER TABLE Commenter ADD CONSTRAINT FK_Commenter_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES t_Utilisateurs(idUtilisateur);
