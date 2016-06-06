drop procedure recalc_popularity;
/
create or replace procedure recalc_popularity
IS
--pocedura se apeleaaza numai din tigger sau cu triggerul disable
   CURSOR c_resurse_oop IS
      SELECT * FROM resurse_oop r FOR UPDATE OF r.popularitate NOWAIT;
BEGIN
   FOR v_linie IN c_resurse_oop LOOP
--pentru fiecare resursa id_res = v_linie.id_res
--se numara de cate ori apare in resurse fav
       dbms_output.put_line(v_linie.popularitate);
      ------------------
      UPDATE resurse_oop r
      SET r.popularitate= (select count(*) from resursefav rf where rf.id_res= v_linie.id_res)
      WHERE CURRENT OF c_resurse_oop;
      -------------------
   END LOOP;
END recalc_popularity;
----------------------------------------------------------
/
BEGIN recalc_popularity ; END;
/
drop trigger trigger_popularity;
/
Create or replace trigger trigger_popularity
After
    INSERT OR
    UPDATE of id_res
    OR DELETE
on resursefav
 FOR EACH ROW
 
DECLARE
v_id number(10);
BEGIN

  CASE      
      WHEN INSERTING THEN
      v_id:= :new.id_res;
      update resurse_oop r 
      set r.popularitate = r.popularitate+1
      where r.id_res= v_id;
      
      WHEN UPDATING('ID_RES') then
       DBMS_OUTPUT.PUT_LINE('Updateing'); 

	--1.Daca fac update pe id_user nu se schimba nimic
	--2.Daca fac update pe id_res se schimba: 
		--a.	popularitate(:new.id_res)+=1
		update resurse_oop r 
		set r.popularitate = r.popularitate+1
		where r.id_res= :new.id_res;
		--b.	popularitate(:old.id_res)-=1
		update resurse_oop r 
		set r.popularitate = r.popularitate-1
		where r.id_res= :old.id_res;    
    
    WHEN DELETING THEN
    v_id:= :old.id_res;
    update resurse_oop r 
      set r.popularitate = r.popularitate-1
      where r.id_res= v_id;
  END CASE;   
END;
/

show errors;

