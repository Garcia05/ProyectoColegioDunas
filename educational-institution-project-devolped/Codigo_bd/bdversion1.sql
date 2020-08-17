create database if not exists proyecto
	character set utf8
    collate utf8_general_ci;

use proyecto;

create table alumno(
	DNI_a integer not null,
    nombres varchar(60) not null,
    apellidos varchar(60) not null,
    direccion varchar(100) not null,
    sexo char not null,
    primary key (DNI_a)
    ) Engine = InnoDB;

create table secretaria(
	DNI_s integer not null,
    nombres varchar(60) not null,
    apellidos varchar(60) not null,
    direccion varchar(60) not null,
    sexo char not null,
    primary key(DNI_s)
    ) engine = InnoDB;

create table pension(
	cod_p integer not null auto_increment,
    DNI_alu integer not null,
    fecha_pago date,
    monto float,
    primary key (cod_p, DNI_alu)
    ) engine = InnoDB;

create table boleta(
	id_boleta bigint not null auto_increment,
    cod_pen integer not null,
    DNI_se integer not null,
    fecha_boleto date,
    primary key(id_boleta)
    ) engine = InnoDB;
    
alter table pension auto_increment = 111;
alter table boleta auto_increment = 111111;

alter table pension add constraint CO_ALUMNOP foreign key FK_ALUMNO(DNI_alu) references alumno(DNI_a)
on delete no action
on update no action;

alter table boleta add constraint CO_PENSION_BOLETA foreign key FK_PENSION_BOLETA(cod_pen) references pension(cod_p)
on delete no action
on update cascade;

alter table boleta add constraint CO_SECRETARIA_BOLETA foreign key FK_SECRETARIA_BOLETA(DNI_se) references secretaria(DNI_s)
on delete no action
on update cascade;
