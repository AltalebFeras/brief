#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE mvf_utilisateur(
        UTILISATEURID Int  Auto_increment  NOT NULL ,
        PRENOM        Varchar (50) NOT NULL ,
        NOM           Varchar (50) NOT NULL ,
        TELEPHONE     Int NOT NULL ,
        MOTDEPASSE    Varchar (200) NOT NULL ,
        RGPD          Varchar (200) NOT NULL ,
        ROLE          Varchar (50) NOT NULL ,
        EMAIL         Varchar (200) NOT NULL
	,CONSTRAINT AK_mvf_utilisateur UNIQUE (EMAIL)
	,CONSTRAINT PK_mvf_utilisateur PRIMARY KEY (UTILISATEURID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pass
#------------------------------------------------------------

CREATE TABLE mvf_pass(
        PASSID     Int  Auto_increment  NOT NULL ,
        NOM        Varchar (200) NOT NULL ,
        PRIX       Int NOT NULL ,
        PRIXREDUIT Int NOT NULL
	,CONSTRAINT PK_mvf_pass PRIMARY KEY (PASSID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: nuite
#------------------------------------------------------------

CREATE TABLE mvf_nuite(
        NUITEID Int  Auto_increment  NOT NULL ,
        NOM     Varchar (50)
	,CONSTRAINT PK_mvf_nuite PRIMARY KEY (NUITEID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: option
#------------------------------------------------------------

CREATE TABLE mvf_option(
        OPTIONID Int  Auto_increment  NOT NULL ,
        NOM      Varchar (50)
	,CONSTRAINT PK_mvf_option PRIMARY KEY (OPTIONID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reservation
#------------------------------------------------------------

CREATE TABLE mvf_reservation(
        RESERVATIONID Int  Auto_increment  NOT NULL ,
        CASQUE        Int ,
        LUGE          Int ,
        ENFANT        Int ,
        PRIXTOTAL     Int NOT NULL ,
        UTILISATEURID Int NOT NULL
	,CONSTRAINT PK_mvf_reservation PRIMARY KEY (RESERVATIONID)

	,CONSTRAINT FK_mvf_reservation_mvf_utilisateur FOREIGN KEY (UTILISATEURID) REFERENCES mvf_utilisateur(UTILISATEURID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reservation_pass
#------------------------------------------------------------

CREATE TABLE mvf_relation_reservation_pass(
        PASSID        Int NOT NULL ,
        RESERVATIONID Int NOT NULL ,
        DATE          Date NOT NULL
	,CONSTRAINT PK_RESERVATION_PASS PRIMARY KEY (PASSID,RESERVATIONID)

	,CONSTRAINT FK_RESERVATION_PASS_mvf_pass FOREIGN KEY (PASSID) REFERENCES mvf_pass(PASSID)
	,CONSTRAINT FK_RESERVATION_PASS_mvf_reservation0 FOREIGN KEY (RESERVATIONID) REFERENCES mvf_reservation(RESERVATIONID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reservation_nuite
#------------------------------------------------------------

CREATE TABLE mvf_relation_reservation_nuite(
        NUITEID       Int NOT NULL ,
        RESERVATIONID Int NOT NULL ,
        DATE          Date NOT NULL
	,CONSTRAINT PK_RESERVATION_NUITE PRIMARY KEY (NUITEID,RESERVATIONID)

	,CONSTRAINT FK_RESERVATION_NUITE_mvf_nuite FOREIGN KEY (NUITEID) REFERENCES mvf_nuite(NUITEID)
	,CONSTRAINT FK_RESERVATION_NUITE_mvf_reservation0 FOREIGN KEY (RESERVATIONID) REFERENCES mvf_reservation(RESERVATIONID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reservation_option
#------------------------------------------------------------

CREATE TABLE mvf_relation_reservation_option(
        OPTIONID      Int NOT NULL ,
        RESERVATIONID Int NOT NULL ,
        DATE          Date NOT NULL
	,CONSTRAINT PK_RESERVATION_OPTION PRIMARY KEY (OPTIONID,RESERVATIONID)

	,CONSTRAINT FK_RESERVATION_OPTION_mvf_option FOREIGN KEY (OPTIONID) REFERENCES mvf_option(OPTIONID)
	,CONSTRAINT FK_RESERVATION_OPTION_mvf_reservation0 FOREIGN KEY (RESERVATIONID) REFERENCES mvf_reservation(RESERVATIONID)
)ENGINE=InnoDB;

