DROP TYPE scoala force;
/
Create TYPE scoala UNDER resursa
(telefon varchar2(15),
 nr_terminale varchar2(20),
 nr_sali varchar2(3),
 nr_prof varchar2(3),

Constructor Function scoala( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2)
  RETURN SELF as RESULT ,
Constructor Function scoala( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2, descrier varchar2 ,nr_s varchar2 , nr_p varchar2)
  RETURN SELF as RESULT ,

OVERRIDING member procedure afiseaza_informatii
);
/
------------------------------------------------------
Create or replace TYPE BODY scoala AS
Constructor Function scoala( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='scoala';
  self.nume:=p_nume;
 --------------------------  
  self.latitudine:=lat;
  self.longitudine:=longit;
  self.adresa_strazii:= adresa;
  self.cod_postal := null;
  self.oras:=oras;
  self.id_tara:='RO';
  self.descriere:=null;
---------------------------
  self.telefon:=tel;
   self.nr_sali:= null;
  self.nr_prof:=null;
  Return;
  End;
  
  Constructor Function scoala( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2, descrier varchar2 , nr_s varchar2 , nr_p varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='scoala';
  self.nume:=p_nume;
 --------------------------
  self.latitudine:=lat;
  self.longitudine:=longit;
  self.adresa_strazii:= adresa;
  self.cod_postal := null;
  self.oras:=oras;
  self.id_tara:='RO';
----------------------------
   self.descriere:=descrier;
-----------------------------
  self.telefon:=tel;
  self.nr_sali:= nr_s;
  self.nr_prof:=nr_p;
  
  
  Return;
  End;
  
OVERRIDING MEMBER PROCEDURE afiseaza_informatii IS
Begin
dbms_output.put_line('Scoala: '|| self.nume);
self.afiseaza_locatie();
dbms_output.put_line('Telefon: '||self.telefon);
if(descriere is not null) then
dbms_output.put_line('Descriere: '|| self.descriere);
end if;
if(nr_sali is not null) then
dbms_output.put_line('Numar sali: '|| self.nr_sali);
end if;
if(nr_prof is not null) then
dbms_output.put_line('Numar profesori: '|| self.nr_prof);
end if;
dbms_output.put_line('');
End afiseaza_informatii;

END;


