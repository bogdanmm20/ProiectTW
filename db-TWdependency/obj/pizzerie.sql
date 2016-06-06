DROP TYPE pizzerie force;
/
Create TYPE pizzerie UNDER resursa
(telefon varchar2(15),
website varchar2(30),

Constructor Function pizzerie( p_nume varchar2 ,lat number, longit number, oras varchar2,tel varchar2)
  RETURN SELF as RESULT ,
Constructor Function pizzerie( p_nume varchar2 ,lat number, longit number, oras varchar2,tel varchar2, descrier varchar2)
  RETURN SELF as RESULT ,

OVERRIDING member procedure afiseaza_informatii
);
/
-------------------------------------------------
Create or replace TYPE BODY pizzerie AS
Constructor Function pizzerie( p_nume varchar2 ,lat number, longit number, oras varchar2,tel varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='pizzerie';
  self.nume:=p_nume;
 --------------------------  
  self.latitudine:=lat;
  self.longitudine:=longit;
  self.adresa_strazii:= null;
  self.cod_postal := null;
  self.oras:=oras;
  self.id_tara:='RO';
  self.descriere:=null;
---------------------------
  self.telefon:=tel;
  self.website:=null;
  Return;
  End;
  
  Constructor Function pizzerie( p_nume varchar2 ,lat number, longit number, oras varchar2,tel varchar2, descrier varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='pizzerie';
  self.nume:=p_nume;
 --------------------------
  self.latitudine:=lat;
  self.longitudine:=longit;
  self.adresa_strazii:= null;
  self.cod_postal := null;
  self.oras:=oras;
  self.id_tara:='RO';
----------------------------
   self.descriere:=descrier;
-----------------------------
  self.telefon:=tel;
  self.website:=null;
  
  Return;
  End;
  
OVERRIDING MEMBER PROCEDURE afiseaza_informatii IS
Begin
dbms_output.put_line('Pizzeria: '|| self.nume);
self.afiseaza_locatie();
dbms_output.put_line('Telefon: '||self.telefon);
if (website is not null)then
dbms_output.put_line('Website '||website);
end if;
if(descriere is not null) then
dbms_output.put_line('Descriere: '|| self.descriere);
end if;
dbms_output.put_line('');
End afiseaza_informatii;

END;
/
