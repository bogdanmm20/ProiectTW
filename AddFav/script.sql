DROP TABLE cont_useri;
/

CREATE TABLE cont_useri (id_user VARCHAR2(4),
                        username VARCHAR2(15),
                        email VARCHAR2(20),
                        pass VARCHAR2(15));
/

insert into cont_useri(id_user,username,email,pass) values('2','SirAlex','alex@yahoo.com','pass');
/
COMMIT;


DROP TABLE resurse;
/
Create TABLE resurse(
tip_res varchar2(20),
nume varchar2(20),
latitudine number(8,4),-- float cu 4 zecimale de obicei
longitudine number(8,4), --float cu 4 zecimale de obicei
oras varchar2(20),
descriere varchar2(140)
);
/

Insert into resurse(tip_res, nume, latitudine, longitudine, oras, descriere) values 
( 'pizzerie','Serafin', 45.001 , 25.001 , 'Galati', 'Vindem cea mai mare pizza!');
Insert into resurse(tip_res, nume, latitudine, longitudine, oras, descriere) values
( 'pizzerie','FullHouse', 45.002 ,25.002,  'Galati' , 'Descriere');

Insert into resurse(tip_res, nume, latitudine, longitudine, oras ) values
('pizzerie', 'MamaMia', 45.200 ,25.200,'Iasi'); 
Insert into resurse(tip_res, nume, latitudine, longitudine, oras ) values
('pizzerie','DopoPoco', 45.201 ,25.201,'Iasi');

COMMIT;


Drop Table resursefav;
/
Create Table resursefav(
id_user VARCHAR2(4),
nume varchar2(20)
);
/
COMMIT;