/* Testé sous MySQL 5.x */

drop table if exists tBillet;
drop table if exists tBillet;

create table tBillet (
  idBillet integer primary key auto_increment,
  dateCrea datetime not null,
  titre varchar(100) not null,
  contenu varchar(400) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table tCommentaire (
  idCom integer primary key auto_increment,
  dateCrea datetime not null,
  auteur varchar(100) not null,
  contenu varchar(200) not null,
  idbillet integer not null,
  constraint fk_com_bil foreign key(idBillet) references tBillet(idBillet)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;
