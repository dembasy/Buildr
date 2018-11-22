#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE IF NOT EXISTS DATABASE `buildr`;
USE `buildr`;
#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
#------------------------------------------------------------
# Table: d27PH_usersType
#------------------------------------------------------------

CREATE TABLE `d27PH_usersType`(
        `id`   Int  Auto_increment  NOT NULL ,
        `type` Varchar (50) NOT NULL
	,CONSTRAINT `d27PH_usersType_PK` PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: d27PF_propertyTypes
#------------------------------------------------------------

CREATE TABLE `d27PF_propertyTypes`(
        `id`   Int  Auto_increment  NOT NULL ,
        `type` Varchar (50) NOT NULL
	,CONSTRAINT `d27PF_propertyTypes_PK` PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: d27PI_department
#------------------------------------------------------------

CREATE TABLE `d27PI_department`(
        `id`             Int  Auto_increment  NOT NULL ,
        `code` Varchar (3) NOT NULL ,
        `name` Varchar (50) NOT NULL
	,CONSTRAINT `d27PI_department_PK` PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: d27PJ_city
#------------------------------------------------------------

CREATE TABLE `d27PJ_city`(
        `id`                  Int  Auto_increment  NOT NULL ,
        `cityName`            Varchar (45) NOT NULL ,
        `postalCode`          Varchar (255) NOT NULL ,
        `idDepartment` Int NOT NULL
	,CONSTRAINT `d27PJ_city_PK` PRIMARY KEY (`id`)

	,CONSTRAINT `d27PJ_city_d27PI_department_FK` FOREIGN KEY (`idDepartment`) REFERENCES `d27PI_department`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: d27PG_users
#------------------------------------------------------------

CREATE TABLE `d27PG_users`(
        `id`                 Int  Auto_increment  NOT NULL ,
        `lastname`           Varchar (50) NOT NULL ,
        `firstname`          Varchar (50) NOT NULL ,
        `email`              Varchar (255) NOT NULL ,
        `password`           Char (255) NOT NULL ,
        `company`            Varchar (50) ,
        `address`            Varchar (255) NOT NULL ,
        `phoneNumber`        Int NOT NULL ,
        `idUsersType`        Int NOT NULL ,
        `idCity`      Int NOT NULL
	,CONSTRAINT `d27PG_users_PK` PRIMARY KEY (`id`)

	,CONSTRAINT `d27PG_users_d27PH_usersType_FK` FOREIGN KEY (`idUsersType`) REFERENCES `d27PH_usersType`(`id`)
	,CONSTRAINT `d27PG_users_d27PJ_city0_FK` FOREIGN KEY (`idCity`) REFERENCES `d27PJ_city`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: d27PD_projects
#------------------------------------------------------------

CREATE TABLE `d27PD_projects`(
        `id`                     Int  Auto_increment  NOT NULL ,
        `name`                   Varchar (255) NOT NULL ,
        `adress`                 Varchar (255) NOT NULL ,
        `cost`                   Varchar (255) ,
        `estimate`               Varchar (255) ,
        `area`                   Varchar (255) NOT NULL ,
        `budget`                 Varchar (255) NOT NULL ,
        `description`            Varchar (255) NOT NULL ,
        `date`                   Date NOT NULL ,
        `idPropertyTypes` Int NOT NULL ,
        `idUsers`         Int NOT NULL
	,CONSTRAINT `d27PD_projects_PK` PRIMARY KEY (`id`)

	,CONSTRAINT `d27PD_projects_d27PF_propertyTypes_FK` FOREIGN KEY (`idPropertyTypes`) REFERENCES `d27PF_propertyTypes`(`id`)
	,CONSTRAINT `d27PD_projects_d27PG_users0_FK` FOREIGN KEY (`idUsers`) REFERENCES `d27PG_users`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: d27PB_projectsPictures
#------------------------------------------------------------

CREATE TABLE `d27PB_projectsPictures`(
        `id`                Int  Auto_increment  NOT NULL ,
        `name`              Varchar (255) NOT NULL ,
        `link`              Varchar (255) NOT NULL ,
        `comments`          Varchar (255) NOT NULL ,
        `idProjects` Int NOT NULL
	,CONSTRAINT `d27PB_projectsPictures_PK` PRIMARY KEY (`id`)

	,CONSTRAINT `d27PB_projectsPictures_d27PD_projects_FK` FOREIGN KEY (`idProjects`) REFERENCES `d27PD_projects`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: d27PE_testimonials
#------------------------------------------------------------

CREATE TABLE `d27PE_testimonials`(
        `id`                Int  Auto_increment  NOT NULL ,
        `testimonials`      Text NOT NULL ,
        `rank`              Float NOT NULL ,
        `idProjects` Int NOT NULL
	,CONSTRAINT `d27PE_testimonials_PK` PRIMARY KEY (`id`)

	,CONSTRAINT `d27PE_testimonials_d27PD_projects_FK` FOREIGN KEY (`idProjects`) REFERENCES `d27PD_projects`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: d27PA_picturesTestimonials
#------------------------------------------------------------

CREATE TABLE `d27PA_picturesTestimonials`(
        `id`                    Int  Auto_increment  NOT NULL ,
        `link`                  Varchar (255) NOT NULL ,
        `idTestimonials` Int NOT NULL
	,CONSTRAINT `d27PA_picturesTestimonials_PK` PRIMARY KEY (`id`)

	,CONSTRAINT `d27PA_picturesTestimonials_d27PE_testimonials_FK` FOREIGN KEY (`idTestimonials`) REFERENCES `d27PE_testimonials`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#------------------------------------------------------------
# Table: d27PC_projectsDocuments
#------------------------------------------------------------

CREATE TABLE `d27PC_projectsDocuments`(
        `id`                Int  Auto_increment  NOT NULL ,
        `name`              Varchar (50) NOT NULL ,
        `link`              Varchar (50) NOT NULL ,
        `idProjects` Int NOT NULL
	,CONSTRAINT `d27PC_projectsDocuments_PK` PRIMARY KEY (`id`)

	,CONSTRAINT `d27PC_projectsDocuments_d27PD_projects_FK` FOREIGN KEY (`idProjects`) REFERENCES `d27PD_projects`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

