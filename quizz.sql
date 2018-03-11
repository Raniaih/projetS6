#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Etudiant
#------------------------------------------------------------

CREATE TABLE Etudiant(
        id             Int NOT NULL ,
        cin            Varchar (25) NOT NULL ,
        cne            Int NOT NULL ,
        nom_elv        Varchar (25) NOT NULL ,
        prenom_elv     Varchar (25) NOT NULL ,
        date_naissance Varchar (25) NOT NULL ,
        nationnalite   Varchar (25) NOT NULL ,
        sexe           Varchar (25) NOT NULL ,
        nivetude       Text NOT NULL ,
        email          Varchar (25) NOT NULL ,
        motdepasse     Varchar (25) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Groupe
#------------------------------------------------------------

CREATE TABLE Groupe(
        id             Int NOT NULL ,
        nom            Varchar (25) NOT NULL ,
        code           Varchar (25) NOT NULL ,
        id_Proffesseur Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Theme
#------------------------------------------------------------

CREATE TABLE Theme(
        id             int (11) Auto_increment  NOT NULL ,
        nom            int (11) Auto_increment  NOT NULL ,
        id_Proffesseur Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reponses
#------------------------------------------------------------

CREATE TABLE Reponses(
        id          Int NOT NULL ,
        reponse     Varchar (25) NOT NULL ,
        id_Question Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Resultat
#------------------------------------------------------------

CREATE TABLE Resultat(
        id          Int NOT NULL ,
        score       Varchar (25) NOT NULL ,
        id_Etudiant Int NOT NULL ,
        id_Theme    Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Proffesseur
#------------------------------------------------------------

CREATE TABLE Proffesseur(
        id                  Int NOT NULL ,
        email               Varchar (25) NOT NULL ,
        motdepasse          Varchar (25) NOT NULL ,
        nom_prof            Varchar (25) NOT NULL ,
        prenom_prof         Varchar (25) NOT NULL ,
        responsable_matiere Varchar (25) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Question
#------------------------------------------------------------

CREATE TABLE Question(
        id       int (11) Auto_increment  NOT NULL ,
        question Text NOT NULL ,
        id_Theme Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: etudiant_groupe
#------------------------------------------------------------

CREATE TABLE etudiant_groupe(
        id        Int NOT NULL ,
        id_Groupe Int NOT NULL ,
        PRIMARY KEY (id ,id_Groupe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reposes_etudiant
#------------------------------------------------------------

CREATE TABLE reposes_etudiant(
        id          Int NOT NULL ,
        id_Reponses Int NOT NULL ,
        PRIMARY KEY (id ,id_Reponses )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: groupe-theme
#------------------------------------------------------------

CREATE TABLE groupe_theme(
        id       Int NOT NULL ,
        id_Theme Int NOT NULL ,
        PRIMARY KEY (id ,id_Theme )
)ENGINE=InnoDB;

ALTER TABLE Groupe ADD CONSTRAINT FK_Groupe_id_Proffesseur FOREIGN KEY (id_Proffesseur) REFERENCES Proffesseur(id);
ALTER TABLE Theme ADD CONSTRAINT FK_Theme_id_Proffesseur FOREIGN KEY (id_Proffesseur) REFERENCES Proffesseur(id);
ALTER TABLE Reponses ADD CONSTRAINT FK_Reponses_id_Question FOREIGN KEY (id_Question) REFERENCES Question(id);
ALTER TABLE Resultat ADD CONSTRAINT FK_Resultat_id_Etudiant FOREIGN KEY (id_Etudiant) REFERENCES Etudiant(id);
ALTER TABLE Resultat ADD CONSTRAINT FK_Resultat_id_Theme FOREIGN KEY (id_Theme) REFERENCES Theme(id);
ALTER TABLE Question ADD CONSTRAINT FK_Question_id_Theme FOREIGN KEY (id_Theme) REFERENCES Theme(id);
ALTER TABLE etudiant_groupe ADD CONSTRAINT FK_etudiant_groupe_id FOREIGN KEY (id) REFERENCES Etudiant(id);
ALTER TABLE etudiant_groupe ADD CONSTRAINT FK_etudiant_groupe_id_Groupe FOREIGN KEY (id_Groupe) REFERENCES Groupe(id);
ALTER TABLE reposes_etudiant ADD CONSTRAINT FK_reposes_etudiant_id FOREIGN KEY (id) REFERENCES Etudiant(id);
ALTER TABLE reposes_etudiant ADD CONSTRAINT FK_reposes_etudiant_id_Reponses FOREIGN KEY (id_Reponses) REFERENCES Reponses(id);
ALTER TABLE groupe_theme ADD CONSTRAINT FK_groupe_theme_id FOREIGN KEY (id) REFERENCES Groupe(id);
ALTER TABLE groupe_theme ADD CONSTRAINT FK_groupe_theme_id_Theme FOREIGN KEY (id_Theme) REFERENCES Theme(id);
