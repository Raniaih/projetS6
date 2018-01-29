#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: QUIZ
#------------------------------------------------------------

CREATE TABLE QUIZ(
        id_q     Int NOT NULL ,
        nom_q    Varchar (25) NOT NULL ,
        niveau_q Varchar (25) NOT NULL ,
        matiere  Varchar (25) NOT NULL ,
        id_mat   Int NOT NULL ,
        id_res   Int NOT NULL ,
        PRIMARY KEY (id_q )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: RESULTAT
#------------------------------------------------------------

CREATE TABLE RESULTAT(
        id_res Int NOT NULL ,
        res    Varchar (25) NOT NULL ,
        id_q   Int NOT NULL ,
        id_elv Int NOT NULL ,
        id_prf Int NOT NULL ,
        PRIMARY KEY (id_res )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MATIERE
#------------------------------------------------------------

CREATE TABLE MATIERE(
        id_mat  Int NOT NULL ,
        matiere Varchar (25) NOT NULL ,
        id_niv  Int NOT NULL ,
        PRIMARY KEY (id_mat )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: QUESTION
#------------------------------------------------------------

CREATE TABLE QUESTION(
        id_qst      Int NOT NULL ,
        nom_qst     Varchar (25) NOT NULL ,
        reponse_qst Varchar (25) NOT NULL ,
        question    Varchar (25) NOT NULL ,
        niveau      Varchar (25) NOT NULL ,
        matiere     Varchar (25) NOT NULL ,
        note_v      Float NOT NULL ,
        note_f      Float NOT NULL ,
        choix       Varchar (25) NOT NULL ,
        PRIMARY KEY (id_qst )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ELEVE
#------------------------------------------------------------

CREATE TABLE ELEVE(
        cin  VARCHAR(25)Not NULL,
		cne varchar(25) NOT NULL,
        nom_elv    Varchar (25) ,
        prenom_elv Varchar (25) NOT NULL,
		datenaissance varchar(25) NOT NULL,
		nationalite varchar(25) NOT NULL,
		nvetude varchar(25) NOT NULL,
		diplomeelv varchar(25) NOT NULL,
		obtention varchar(25) NOT NULL,
		email_elv  Varchar (25) NOT NULL ,
		phone varchar (25) NOT NULL ,
        pwd_elv Varchar (25) NOT NULL ,
        
        PRIMARY KEY (id_elv )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PROFESSEUR
#------------------------------------------------------------

CREATE TABLE PROFESSEUR(
        id_prf     Int NOT NULL ,
        nom_prf    Varchar (25) NOT NULL ,
        prenom_prf Varchar (25) NOT NULL ,
        email_prf  Varchar (25) NOT NULL ,
        pwd        Varchar (25) NOT NULL ,
        matiere    Varchar (25) NOT NULL ,
        PRIMARY KEY (id_prf )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: NIVEAU
#------------------------------------------------------------

CREATE TABLE NIVEAU(
        id_niv  Int NOT NULL ,
        nom_niv Varchar (25) NOT NULL ,
        id_mat  Int NOT NULL ,
        PRIMARY KEY (id_niv )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: GROUPE
#------------------------------------------------------------

CREATE TABLE GROUPE(
        id_grp  Int NOT NULL ,
        nom_grp Varchar (25) NOT NULL ,
        code    Varchar (25) NOT NULL ,
        id_prf  Int NOT NULL ,
        PRIMARY KEY (id_grp )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: composer_de
#------------------------------------------------------------

CREATE TABLE composer_de(
        id_q   Int NOT NULL ,
        id_qst Int NOT NULL ,
        PRIMARY KEY (id_q ,id_qst )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Ëtre_dans
#------------------------------------------------------------

CREATE TABLE Etre_dans(
        id_q   Int NOT NULL ,
        id_grp Int NOT NULL ,
        PRIMARY KEY (id_q ,id_grp )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appartenir
#------------------------------------------------------------

CREATE TABLE Appartenir(
        id_grp Int NOT NULL ,
        id_elv Int NOT NULL ,
        PRIMARY KEY (id_grp ,id_elv )
)ENGINE=InnoDB;

ALTER TABLE QUIZ ADD CONSTRAINT FK_QUIZ_id_mat FOREIGN KEY (id_mat) REFERENCES MATIERE(id_mat);
ALTER TABLE QUIZ ADD CONSTRAINT FK_QUIZ_id_res FOREIGN KEY (id_res) REFERENCES RESULTAT(id_res);
ALTER TABLE RESULTAT ADD CONSTRAINT FK_RESULTAT_id_q FOREIGN KEY (id_q) REFERENCES QUIZ(id_q);
ALTER TABLE RESULTAT ADD CONSTRAINT FK_RESULTAT_id_elv FOREIGN KEY (id_elv) REFERENCES ELEVE(id_elv);
ALTER TABLE RESULTAT ADD CONSTRAINT FK_RESULTAT_id_prf FOREIGN KEY (id_prf) REFERENCES PROFESSEUR(id_prf);
ALTER TABLE MATIERE ADD CONSTRAINT FK_MATIERE_id_niv FOREIGN KEY (id_niv) REFERENCES NIVEAU(id_niv);
ALTER TABLE NIVEAU ADD CONSTRAINT FK_NIVEAU_id_mat FOREIGN KEY (id_mat) REFERENCES MATIERE(id_mat);
ALTER TABLE GROUPE ADD CONSTRAINT FK_GROUPE_id_prf FOREIGN KEY (id_prf) REFERENCES PROFESSEUR(id_prf);
ALTER TABLE composer_de ADD CONSTRAINT FK_composer_de_id_q FOREIGN KEY (id_q) REFERENCES QUIZ(id_q);
ALTER TABLE composer_de ADD CONSTRAINT FK_composer_de_id_qst FOREIGN KEY (id_qst) REFERENCES QUESTION(id_qst);
ALTER TABLE Etre_dans ADD CONSTRAINT FK_Etre_dans_id_q FOREIGN KEY (id_q) REFERENCES QUIZ(id_q);
ALTER TABLE Etre_dans ADD CONSTRAINT FK_Etre_dans_id_grp FOREIGN KEY (id_grp) REFERENCES GROUPE(id_grp);
ALTER TABLE Appartenir ADD CONSTRAINT FK_Appartenir_id_grp FOREIGN KEY (id_grp) REFERENCES GROUPE(id_grp);
ALTER TABLE Appartenir ADD CONSTRAINT FK_Appartenir_id_elv FOREIGN KEY (id_elv) REFERENCES ELEVE(id_elv);
