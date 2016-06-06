--Toate locatiile din vecinatate where 

set SERVEROUTPUT on;
DECLARE
--coordonate facultate
   ulat number(8,4) := 47.173926 ; 
   ulong number(8,4) := 27.574707 ; 
--raza e in grade !problem!
   raza number(2) := 1;
---------------------------------------
cursor c_locatii_vecinatate(ulat number, ulong number, raza number) 
is   select r.id_res from resurse_oop r 
where r.obiect.latitudine between  ulat - raza and  ulat + raza
and r.obiect.longitudine between ulong - raza and ulat + raza;
-------------------------------------
v_linie_c c_locatii_vecinatate%rowtype;

BEGIN 
   dbms_output.put_line('Variable ulat: ' || ulat);
   dbms_output.put_line('Variable ulong: ' || ulong);
   dbms_output.put_line('Variable raza: ' || raza);
   
   FOR v_linie_c IN  c_locatii_vecinatate (ulat,ulong, raza) LOOP
   dbms_output.put_line(v_linie_c.id_res);
   END LOOP;
   
END;
/
-- select r.id_res from resurse_oop r 
--where r.obiect.latitudine between  47.173926 - 1 and  47.173926 + 1
--and r.obiect.longitudine between 27.574707 - 1 and 27.574707 + 1;