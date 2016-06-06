DROP TYPE farmacie force;
/
Create TYPE farmacie UNDER resursa
(telefon varchar2(15),
 prog varchar2(100),

Constructor Function farmacie( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2)
  RETURN SELF as RESULT ,
Constructor Function farmacie( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2, descrier varchar2 )
  RETURN SELF as RESULT ,

OVERRIDING member procedure afiseaza_informatii
);
/
------------------------------------------------------
Create or replace TYPE BODY farmacie AS
Constructor Function farmacie( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='farmacie';
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
  Return;
  End;
  
  Constructor Function farmacie( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2, descrier varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='farmacie';
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
  
  
  Return;
  End;
  
OVERRIDING MEMBER PROCEDURE afiseaza_informatii IS
Begin
dbms_output.put_line('Farmacia: '|| self.nume);
self.afiseaza_locatie();
dbms_output.put_line('Telefon: '||self.telefon);
if(descriere is not null) then
dbms_output.put_line('Descriere: '|| self.descriere);
end if;
dbms_output.put_line('');
End afiseaza_informatii;

END;

