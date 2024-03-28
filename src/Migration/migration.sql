#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE mvf_utilisateur(
        UTILISATEURID Int  Auto_increment  NOT NULL ,
        NOM           Varchar (50) NOT NULL ,
        PRENOM        Varchar (50) NOT NULL ,
        TELEPHONE     Varchar (16) NOT NULL ,
        ADRESSE       Varchar (100) NOT NULL ,
        MOTDEPASSE    Varchar (300) NOT NULL ,
        ROLE          Varchar (50) NOT NULL ,
        RGPD          Date NOT NULL ,
        EMAIL         Varchar (80) NOT NULL
	,CONSTRAINT AK_mvf_utilisateur UNIQUE (EMAIL)
	,CONSTRAINT PK_mvf_utilisateur PRIMARY KEY (UTILISATEURID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Pass
#------------------------------------------------------------

CREATE TABLE mvf_pass(
        PASSID Int  Auto_increment  NOT NULL ,
        PRIX   Integer NOT NULL ,
        NOM    Varchar (60) NOT NULL
	,CONSTRAINT AK_mvf_pass UNIQUE (NOM)
	,CONSTRAINT PK_mvf_pass PRIMARY KEY (PASSID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Nuitee
#------------------------------------------------------------

CREATE TABLE mvf_nuitee(
        NUITEEID Int  Auto_increment  NOT NULL ,
        PRIX     Integer NOT NULL ,
        NOM      Varchar (60)
	,CONSTRAINT AK_mvf_nuitee UNIQUE (NOM)
	,CONSTRAINT PK_mvf_nuitee PRIMARY KEY (NUITEEID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Option
#------------------------------------------------------------

CREATE TABLE mvf_option(
        OPTIONID Int  Auto_increment  NOT NULL ,
        STOCK    Int NOT NULL ,
        PRIX     Integer NOT NULL ,
        NOM      Varchar (60)
	,CONSTRAINT AK_mvf_option UNIQUE (NOM)
	,CONSTRAINT PK_mvf_option PRIMARY KEY (OPTIONID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reservation
#------------------------------------------------------------

CREATE TABLE mvf_reservation(
        RESERVATIONID       Int  Auto_increment  NOT NULL ,
        NOMBRE_RESERVATIONS Int NOT NULL ,
        PRIX_TOTAL          Integer NOT NULL ,
        UTILISATEURID       Int NOT NULL
	,CONSTRAINT PK_mvf_reservation PRIMARY KEY (RESERVATIONID)

	,CONSTRAINT FK_mvf_reservation_mvf_utilisateur FOREIGN KEY (UTILISATEURID) REFERENCES mvf_utilisateur(UTILISATEURID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reservation_pass
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
# Table: Reservation_nuitee
#------------------------------------------------------------

CREATE TABLE mvf_relation_reservation_nuitee(
        NUITEEID      Int NOT NULL ,
        RESERVATIONID Int NOT NULL ,
        DATE          Date NOT NULL
	,CONSTRAINT PK_RESERVATION_NUITEE PRIMARY KEY (NUITEEID,RESERVATIONID)

	,CONSTRAINT FK_RESERVATION_NUITEE_mvf_nuitee FOREIGN KEY (NUITEEID) REFERENCES mvf_nuitee(NUITEEID)
	,CONSTRAINT FK_RESERVATION_NUITEE_mvf_reservation0 FOREIGN KEY (RESERVATIONID) REFERENCES mvf_reservation(RESERVATIONID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reservation_option
#------------------------------------------------------------

CREATE TABLE mvf_relation_reservation_option(
        OPTIONID      Int NOT NULL ,
        RESERVATIONID Int NOT NULL
	,CONSTRAINT PK_RESERVATION_OPTION PRIMARY KEY (OPTIONID,RESERVATIONID)

	,CONSTRAINT FK_RESERVATION_OPTION_mvf_option FOREIGN KEY (OPTIONID) REFERENCES mvf_option(OPTIONID)
	,CONSTRAINT FK_RESERVATION_OPTION_mvf_reservation0 FOREIGN KEY (RESERVATIONID) REFERENCES mvf_reservation(RESERVATIONID)
)ENGINE=InnoDB;

