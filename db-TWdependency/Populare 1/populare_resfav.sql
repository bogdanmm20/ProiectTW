--CREATE TABLE test_csv(
--  oras VARCHAR2(30),
--  latitudine number(12,10),
--  longitudine number(12,10),
--  cod_postal integer
--  )
--  /
---- drop table test_csv
--CREATE TABLE localitate(
--  localit varchar2(30)
--  )
--  /
---- drop table localitate
--CREATE TABLE nume_resursa(
--  resursa varchar2(30)
--  )
--/
-- dbms_random.value(43.50,48.49) - longitudine
-- dbms_random.value(20.50,29.49) - latitudine
-- dbms_random.value(19.5,99999.49) - cod postal

--id_user=nextval, user = random 
  --100 fav/cont
set serveroutput on;
DECLARE
  localitat varchar2(30);
  v_nume varchar2(30);
  v_latitudine number(8,4);
  v_latitudine number(8,4);
  
  CURSOR c_id_useri IS
      SELECT id_user FROM cont_useri;
  v_linie c_id_useri%rowtype;
  
BEGIN
  for v_linie IN c_id_useri LOOP
  
	  ---pt toti useri cursor adaugi resurse fav
      --v_id_user:= dbms_random.value(1,5000);
	  ------------------
      insert into resursefav ( id_user, id_res )
	  SELECT v_linie.id_user, id_res FROM resurse_oop r
	  where r.obiect.tip_res='pizzerie' and rownum<=10
	  order by dbms_random.value;
	  ------------------
     insert into resursefav ( id_user, id_res )
	  SELECT v_linie.id_user, id_res FROM resurse_oop r
	  where r.obiect.tip_res='banca' and rownum<=10
	  order by dbms_random.value;
    -------------------
  END LOOP;
END;
/
show errors;