--sequence e un iteraror si se acceseaza cu:
--seq_resurse.currval , seq_resurse.nextval
update resurse_oop set popularitate = 0;
delete from resurse_oop ;
delete from resursefav ;
/
insert into resursefav ( id_user, id_res ) values (14, 4015);
/
delete from resursefav where  id_user=14 and id_res=4015;
/
update resursefav set id_res= 4016 where  id_user=14 and id_res=4015;
/
DROP SEQUENCE seq_resurse;
/
CREATE SEQUENCE seq_resurse
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 10;
/
DROP TABLE resurse_oop cascade constraints;
/
Create Table resurse_oop
(
 id_res NUMBER(10), 
 obiect RESURSA,
 id_user NUMBER(10) Default null, 
 popularitate Number(10) Default 0
, PRIMARY KEY ( ID_RES ) );
/
ALTER TABLE resurse_oop
ADD CONSTRAINT fkSN_user
  FOREIGN KEY (id_user)
  REFERENCES cont_useri(id_user)
   ON DELETE SET NULL;
/
alter table resurse_oop
   add constraint FK_tip_res
      foreign key (obiect.tip_res) references categ (tip_res);
/
Drop table Tari;
/
CREATE TABLE TARI 
(
  id_tara CHAR(2 BYTE) NOT NULL 
, nume_tara VARCHAR2(40 BYTE)  
, CONSTRAINT ID_TARA_PK PRIMARY KEY 
  (  ID_TARA   ) ENABLE 
);
/
alter table resurse_oop
   add constraint FK_id_tara
      foreign key (obiect.id_tara) references tari(id_tara);
/