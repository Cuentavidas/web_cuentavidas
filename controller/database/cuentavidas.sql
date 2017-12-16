create table HISTORIA
(
	ID_HISTORIA int auto_increment
		primary key,
	ID_RECUERDO int not null,
	TITULO varchar(500) not null,
	AUTOR varchar(1000) not null,
	TEXTO text not null,
	FECHA_ALTA date not null,
	ULTIMA_ACTUALIZACION date not null,
	VISIBLE tinyint(1) default '0' null
)
;

create index HISTORIA_RECUERDO_ID_RECUERDO_fk
	on HISTORIA (ID_RECUERDO)
;

create table PROVINCIA
(
	ID_PROVINCIA int auto_increment
		primary key,
	NOMBRE varchar(250) not null,
	ENLACE varchar(500) null
)
;

create table RECUERDO
(
	ID_RECUERDO int auto_increment
		primary key,
	AUTOR varchar(500) not null,
	TITULO varchar(500) not null,
	DESCRIPCION text not null,
	ID_PROVINCIA int not null,
	URL_VIDEO text not null,
	URL_POSTER varchar(600) null,
	FECHA_ALTA date null,
	FECHA_ACTUALIZACION date null,
	VISIBLE tinyint(1) default '0' null,
	constraint RECUERDO_PROVINCIA_ID_PROVINCIA_fk
		foreign key (ID_PROVINCIA) references cuentavidas.PROVINCIA (ID_PROVINCIA)
)
;

create index RECUERDO_PROVINCIA_ID_PROVINCIA_fk
	on RECUERDO (ID_PROVINCIA)
;

alter table HISTORIA
	add constraint HISTORIA_RECUERDO_ID_RECUERDO_fk
		foreign key (ID_RECUERDO) references cuentavidas.RECUERDO (ID_RECUERDO)
;