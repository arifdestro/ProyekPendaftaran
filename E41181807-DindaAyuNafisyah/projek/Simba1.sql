/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     11/14/2019 7:13:00 AM                        */
/*==============================================================*/


drop table if exists ADMIN;

drop table if exists BAYAR;

drop table if exists DAFTAR;

drop table if exists JENIS_LOMBA;

drop table if exists MELAKUKAN;

drop table if exists RAYON;

drop table if exists SEKOLAH;

drop table if exists SISWA;

drop table if exists USER;

/*==============================================================*/
/* Table: ADMIN                                                 */
/*==============================================================*/
create table ADMIN
(
   ID_ADMIN             varchar(2) not null,
   NAMA_ADMIN           varchar(40) not null,
   PASSWORD_ADMIN       varchar(8) not null,
   primary key (ID_ADMIN)
);

/*==============================================================*/
/* Table: BAYAR                                                 */
/*==============================================================*/
create table BAYAR
(
   ID_BAYAR             char(21) not null,
   TGL_BAYAR            datetime not null,
   primary key (ID_BAYAR)
);

/*==============================================================*/
/* Table: DAFTAR                                                */
/*==============================================================*/
create table DAFTAR
(
   ID_DAFTAR            char(20) not null,
   ID_BAYAR             char(21) not null,
   ID_JENIS_LOMBA       varchar(3) not null,
   ID_RAYON             varchar(3) not null,
   ID_USER              varchar(5) not null,
   ID_ADMIN             varchar(2) not null,
   TGL                  date not null,
   STATUS               varchar(10),
   primary key (ID_DAFTAR)
);

/*==============================================================*/
/* Table: JENIS_LOMBA                                           */
/*==============================================================*/
create table JENIS_LOMBA
(
   ID_JENIS_LOMBA       varchar(3) not null,
   NAMA_LOMBA           varchar(15) not null,
   BIAYA                int not null,
   primary key (ID_JENIS_LOMBA)
);

/*==============================================================*/
/* Table: MELAKUKAN                                             */
/*==============================================================*/
create table MELAKUKAN
(
   ID_DAFTAR            char(20) not null,
   NISN                 char(10) not null,
   primary key (ID_DAFTAR, NISN)
);

/*==============================================================*/
/* Table: RAYON                                                 */
/*==============================================================*/
create table RAYON
(
   ID_RAYON             varchar(3) not null,
   NAMA_RAYON           varchar(11) not null,
   primary key (ID_RAYON)
);

/*==============================================================*/
/* Table: SEKOLAH                                               */
/*==============================================================*/
create table SEKOLAH
(
   NPSN                 char(8) not null,
   NAMA_SEKOLAH         varchar(30) not null,
   KOTA                 varchar(11) not null,
   primary key (NPSN)
);

/*==============================================================*/
/* Table: SISWA                                                 */
/*==============================================================*/
create table SISWA
(
   NISN                 char(10) not null,
   NPSN                 char(8) not null,
   NAMA_SISWA           varchar(40) not null,
   TEMPAT_LAHIR         varchar(20) not null,
   TANGGAL_LAHIR        date not null,
   ALAMAT               varchar(50) not null,
   SURAT_REKOM          longblob not null,
   FILE_ABSTRAK         longblob,
   FOTO                 longblob not null,
   primary key (NISN)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   ID_USER              varchar(5) not null,
   NAMA_USER            varchar(40) not null,
   _EMAIL_USER          varchar(30) not null,
   PASSWORD_USER        varchar(8) not null,
   primary key (ID_USER)
);

alter table DAFTAR add constraint FK_MEMBAYAR foreign key (ID_BAYAR)
      references BAYAR (ID_BAYAR) on delete restrict on update restrict;

alter table DAFTAR add constraint FK_MEMILIH_JENIS_LOMBA foreign key (ID_JENIS_LOMBA)
      references JENIS_LOMBA (ID_JENIS_LOMBA) on delete restrict on update restrict;

alter table DAFTAR add constraint FK_MEMILIH_RAYON foreign key (ID_RAYON)
      references RAYON (ID_RAYON) on delete restrict on update restrict;

alter table DAFTAR add constraint FK_MEMVERIVIKASI foreign key (ID_ADMIN)
      references ADMIN (ID_ADMIN) on delete restrict on update restrict;

alter table DAFTAR add constraint FK_MENDAFTAR foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table MELAKUKAN add constraint FK_MELAKUKAN foreign key (ID_DAFTAR)
      references DAFTAR (ID_DAFTAR) on delete restrict on update restrict;

alter table MELAKUKAN add constraint FK_MELAKUKAN2 foreign key (NISN)
      references SISWA (NISN) on delete restrict on update restrict;

alter table SISWA add constraint FK_MEMILIKI foreign key (NPSN)
      references SEKOLAH (NPSN) on delete restrict on update restrict;

