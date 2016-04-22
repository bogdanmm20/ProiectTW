DROP TABLE cont_useri;
/

CREATE TABLE cont_useri (id_user VARCHAR2(4),
                        username VARCHAR2(15),
                        email VARCHAR2(20),
                        pass VARCHAR2(15));
/

--insert into cont_useri(id_user,username,email,pass) values('2','SirAlex','alex@yahoo.com','pass');

COMMIT;