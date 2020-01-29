/*
Created: 01/10/2014
Modified: 05/10/2014
Model: RE MySQL 5.1
Database: MySQL 5.1
*/

-- Create tables section -------------------------------------------------

-- Table asignacion

CREATE TABLE asignacion
(
  tarea_id Bigint NOT NULL,
  empleado_id Bigint NOT NULL
) ENGINE = InnoDB
  ROW_FORMAT = Compact
;

ALTER TABLE asignacion ADD PRIMARY KEY (tarea_id,empleado_id)
;

-- Table cinta

CREATE TABLE cinta
(
  id Bigint NOT NULL,
  color Varchar(20),
  cant_acum Int(5)
) ENGINE = InnoDB
  ROW_FORMAT = Compact
;

ALTER TABLE cinta ADD PRIMARY KEY (id)
;

-- Table corte

CREATE TABLE corte
(
  id Bigint NOT NULL,
  cant_perdido Int(5),
  cant_recuperado Int(5)
) ENGINE = InnoDB
  ROW_FORMAT = Compact
;

ALTER TABLE corte ADD PRIMARY KEY (id)
;

-- Table empleado

CREATE TABLE empleado
(
  id Bigint NOT NULL,
  telefono Varchar(10)
) ENGINE = InnoDB
  ROW_FORMAT = Compact
;

ALTER TABLE empleado ADD PRIMARY KEY (id)
;

-- Table insumo

CREATE TABLE insumo
(
  id Bigint NOT NULL AUTO_INCREMENT,
  detalle Varchar(50),
  cant_stock Int,
  tipo_insumo Varchar(20),
 PRIMARY KEY (id)
) ENGINE = InnoDB
  ROW_FORMAT = Compact
;

-- Table lote

CREATE TABLE lote
(
  id Bigint NOT NULL AUTO_INCREMENT,
  area Int,
  finca_id Bigint,
 PRIMARY KEY (id)
) ENGINE = InnoDB
  ROW_FORMAT = Compact
;

-- Table persona

CREATE TABLE persona
(
  id Bigint NOT NULL AUTO_INCREMENT,
  nombre Varchar(50),
  apellido Varchar(50),
 PRIMARY KEY (id)
) ENGINE = InnoDB
  ROW_FORMAT = Compact
;

-- Table registro_bodega

CREATE TABLE registro_bodega
(
  id Bigint NOT NULL AUTO_INCREMENT,
  insumo_id Bigint,
  fecha Date,
  cantidad Int,
  tipo_reg Varchar(20),
  detalle Varchar(100),
 PRIMARY KEY (id)
) ENGINE = InnoDB
  ROW_FORMAT = Compact
;

-- Table tarea

CREATE TABLE tarea
(
  id Bigint NOT NULL AUTO_INCREMENT,
  cantidad Int(5),
  fecha Date,
  lote_id Bigint,
  tipo_tarea_id Bigint,
 PRIMARY KEY (id)
) ENGINE = InnoDB
  ROW_FORMAT = Compact
;

-- Table usuario

CREATE TABLE usuario
(
  id Bigint NOT NULL,
  tipo_usuario Varchar(20),
  username Varchar(50),
  password Varchar(50)
) ENGINE = InnoDB
  ROW_FORMAT = Compact
;

ALTER TABLE usuario ADD PRIMARY KEY (id)
;

-- Table suncho

CREATE TABLE suncho
(
  id Bigint NOT NULL,
  cant_acum Int(5)
)
;

ALTER TABLE suncho ADD PRIMARY KEY (id)
;

-- Table tarea_insumo

CREATE TABLE tarea_insumo
(
  id Char(20) NOT NULL,
  cantidad Int(5),
  tarea_id Bigint NOT NULL,
  insumo_id Bigint NOT NULL
)
;

ALTER TABLE tarea_insumo ADD PRIMARY KEY (id)
;

-- Table cajas_prod

CREATE TABLE cajas_prod
(
  id Bigint NOT NULL AUTO_INCREMENT,
  cajas_prod Int(5),
  categoria Varchar(20),
  tipo_caja_id Bigint,
  marca_caja_id Bigint,
  corte_id Bigint,
 PRIMARY KEY (id)
)
;

-- Table finca

CREATE TABLE finca
(
  id Bigint NOT NULL AUTO_INCREMENT,
  nombre Varchar(20),
 PRIMARY KEY (id)
)
;

-- Table marca_caja

CREATE TABLE marca_caja
(
  id Bigint NOT NULL AUTO_INCREMENT,
  detalle Varchar(20),
 PRIMARY KEY (id)
)
;

-- Table tipo_caja

CREATE TABLE tipo_caja
(
  id Bigint NOT NULL AUTO_INCREMENT,
  detalle Varchar(20),
 PRIMARY KEY (id)
)
;

-- Table tipo_tarea

CREATE TABLE tipo_tarea
(
  id Bigint NOT NULL AUTO_INCREMENT,
  detalle Varchar(20),
 PRIMARY KEY (id)
)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE asignacion ADD CONSTRAINT FK_25629271952BE730 FOREIGN KEY (empleado_id) REFERENCES empleado (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE asignacion ADD CONSTRAINT FK_256292716D5BDFE1 FOREIGN KEY (tarea_id) REFERENCES tarea (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE cinta ADD CONSTRAINT FK_6D31491FBF396750 FOREIGN KEY (id) REFERENCES insumo (id) ON DELETE CASCADE ON UPDATE RESTRICT
;

ALTER TABLE corte ADD CONSTRAINT FK_5A0B88CEBF396750 FOREIGN KEY (id) REFERENCES tarea (id) ON DELETE CASCADE ON UPDATE RESTRICT
;

ALTER TABLE empleado ADD CONSTRAINT FK_D9D9BF52BF396750 FOREIGN KEY (id) REFERENCES persona (id) ON DELETE CASCADE ON UPDATE RESTRICT
;

ALTER TABLE registro_bodega ADD CONSTRAINT FK_996259F7CE208F97 FOREIGN KEY (insumo_id) REFERENCES insumo (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE tarea ADD CONSTRAINT FK_3CA05366B172197C FOREIGN KEY (lote_id) REFERENCES lote (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE usuario ADD CONSTRAINT FK_EDD889C1BF396750 FOREIGN KEY (id) REFERENCES persona (id) ON DELETE CASCADE ON UPDATE RESTRICT
;

ALTER TABLE suncho ADD CONSTRAINT Relationship1 FOREIGN KEY (id) REFERENCES insumo (id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE tarea_insumo ADD CONSTRAINT Relationship5 FOREIGN KEY (tarea_id) REFERENCES tarea (id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE tarea_insumo ADD CONSTRAINT Relationship7 FOREIGN KEY (insumo_id) REFERENCES insumo (id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE lote ADD CONSTRAINT Relationship13 FOREIGN KEY (finca_id) REFERENCES finca (id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE cajas_prod ADD CONSTRAINT Relationship15 FOREIGN KEY (tipo_caja_id) REFERENCES tipo_caja (id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE cajas_prod ADD CONSTRAINT Relationship16 FOREIGN KEY (marca_caja_id) REFERENCES marca_caja (id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE cajas_prod ADD CONSTRAINT Relationship17 FOREIGN KEY (corte_id) REFERENCES corte (id) ON DELETE NO ACTION ON UPDATE NO ACTION
;

ALTER TABLE tarea ADD CONSTRAINT Relationship18 FOREIGN KEY (tipo_tarea_id) REFERENCES tipo_tarea (id) ON DELETE NO ACTION ON UPDATE NO ACTION
;


