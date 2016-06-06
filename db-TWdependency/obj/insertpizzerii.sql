set SERVEROUTPUT ON;
DECLARE
v_res1 RESURSA;
v_res2 RESURSA;
v_res3 RESURSA;
v_res4 RESURSA;
v_pi1 PIZZERIE;
v_pi2 PIZZERIE;
v_pi3 PIZZERIE;
v_pi4 PIZZERIE;
v_pi5 PIZZERIE;
v_pi6 PIZZERIE;
BEGIN

v_res1:=resursa( 'pizzerie','Serafin', 45.001 ,25.001,'str. Domneasca nr.1','525111','Galati','RO', 'Vindem cea mai mare pizza!');--constructor implicit
v_res2:=resursa( 'pizzerie','FullHouse', 45.002 ,25.002,'str. Brailei','525222','Galati','RO', 'Descriere');--constructor implicit

--constructor explicit (fara descriere) -- daca nu merge voi initializa descrierea cu '' sau NULL;
v_res3:=resursa('pizzerie', 'MamaMia', 45.200 ,25.200,'Iasi');
v_res4:=resursa('pizzerie','DopoPoco', 45.201 ,25.201,'Iasi');

v_pi1:=pizzerie('pizzerie','Avantage Pizza Fast',45.202 ,25.202,'str. Sararie','707111','Iasi','RO','Descriere','072 222 222','restaurantavanage.ro' );--constructor implicit
v_pi2:=pizzerie('pizzerie','La Dolce Vita', 45.203 ,25.203,'str. Oastei 48','707222','Iasi','RO','Descriere','073 333 333', null);--constructor implicit

----constructor explicit1 (fara tip_res, fara descriere) -- daca nu merge voi initializa descrierea cu '' sau NULL;
v_pi3:=pizzerie('PizzeriaDomneasca', 45.207 ,25.207,'Iasi','118 932');
v_pi4:=pizzerie('MoaraDeFoc', 45.208 ,25.208,'Iasi','074 444 444');
--
----constructor explicit2 (fara tip_res, cu descriere)
v_pi5:=pizzerie('PanoramicRestaurant', 45.209 ,25.209,'Galati','555 555','Cea mai buna pizza din Galati, fara livrare!');
v_pi6:=pizzerie('Pizza Indiana', 45.210 ,25.210,'Iasi','666 666','Descriere');

--
--insert into resurse_oop(id_res,obiect) values(100,v_res1);
--insert into resurse_oop(id_res,obiect) values(101,v_res2);
insert into resurse_oop(id_res,obiect) values(200, v_res3);
insert into resurse_oop(id_res,obiect) values(201, v_res4);
insert into resurse_oop(id_res,obiect) values('202', v_pi1);
insert into resurse_oop(id_res,obiect) values('203', v_pi2);
insert into resurse_oop(id_res,obiect) values('204', v_pi3);
insert into resurse_oop(id_res,obiect) values('205', v_pi4);
insert into resurse_oop(id_res,obiect) values('206', v_pi5);
insert into resurse_oop(id_res,obiect) values('207', v_pi6);

v_res1.afiseaza_informatii;
v_res2.afiseaza_informatii;

END;
/
--select id_res, resursa from resurse_oop order by resursa;
--
--/