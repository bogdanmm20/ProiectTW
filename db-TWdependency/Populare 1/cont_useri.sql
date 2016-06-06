DROP TABLE cont_useri cascade constraints;
/
CREATE TABLE cont_useri
  (
    id_user  NUMBER(10) ,
    username VARCHAR2(50) UNIQUE,
    email    VARCHAR2(50),
    pass     VARCHAR2(255),
    PRIMARY KEY(id_user)
  );
/
DROP SEQUENCE seq_useri;
/
CREATE SEQUENCE seq_useri
MINVALUE 1
START WITH 16
INCREMENT BY 1
CACHE 10;
/
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (1,'SirAlex','alex@yahoo.com','pass');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (2,'bogdanpopescu','bogdanpopescu@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (3,'raduprelipcean','raduprelipcean@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (4,'ioanaantonie','ioanaantonie@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (5,'ralucaarhire','ralucaarhire@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (6,'alexandrupanaite','alexandrupanaite@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (7,'ioanabodnar','ioanabodnar@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (8,'andradaarchip','andradaarchip@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (9,'ciprianciobotariu','ciprianciobotariu@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (10,'andreipintescu','andreipintescu@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (11,'alexandraarhire','alexandraarhire@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (12,'georgecobzaru','georgecobzaru@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (13,'andreeabucur','andreeabucur@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (14,'catalinjecu','catalinjecu@info.uaic.ro','student');
Insert into CONT_USERI (ID_USER,USERNAME,EMAIL,PASS) values (15,'cataje','cataje@info.uaic.ro','student');
COMMIT;
/
--de la generarea automata
--INSERT INTO cont_useri c(c.id_user , c.username, c.email, c.pass)
--SELECT seq_useri.NEXTVAL, lower(prenume||nume) , lower(prenume||nume)||'@'||'info.uaic.ro' , 'student' FROM studenti s;




