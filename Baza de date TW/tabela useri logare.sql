DROP TABLE cont_useri;
/

/*tabel: user
coloane: id_user,username, email, password*/

CREATE TABLE cont_useri (id_user char(4) not null,
                        username varchar2(15) not null,
                        email varchar2(20),
                        pass varchar2(15) not null);