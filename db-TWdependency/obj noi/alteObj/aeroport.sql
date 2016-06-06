DROP TYPE aeroport force;
/
Create TYPE aeroport UNDER resursa
(telefon varchar2(15),
 nr_terminale number(5),

Constructor Function aeroport( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2)
  RETURN SELF as RESULT ,
Constructor Function aeroport( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2, descrier varchar2 , nr_termin number)
  RETURN SELF as RESULT ,

OVERRIDING member procedure afiseaza_informatii
);
/
------------------------------------------------------
Create or replace TYPE BODY aeroport AS
Constructor Function aeroport( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='aeroport';
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
  self.nr_terminale:=null;
  
  Return;
  End;
  
  Constructor Function aeroport( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2, descrier varchar2 , nr_termin number)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='aeroport';
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
  self.nr_terminale:=nr_termin;
  
  
  Return;
  End;
  
OVERRIDING MEMBER PROCEDURE afiseaza_informatii IS
Begin
dbms_output.put_line('Aeroportul: '|| self.nume);
self.afiseaza_locatie();
dbms_output.put_line('Telefon: '||self.telefon);
dbms_output.put_line('Nr terminale: '||self.nr_terminale);
if(descriere is not null) then
dbms_output.put_line('Descriere: '|| self.descriere);
end if;
dbms_output.put_line('');
End afiseaza_informatii;

END;


