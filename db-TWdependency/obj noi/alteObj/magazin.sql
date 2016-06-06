DROP TYPE magazin force;
/
Create TYPE magazin UNDER resursa
(prog varchar2(100),

Constructor Function magazin( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 , program_clienti varchar2)
  RETURN SELF as RESULT ,
Constructor Function magazin( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,descrier varchar2 )
  RETURN SELF as RESULT ,

OVERRIDING member procedure afiseaza_informatii
);
/
------------------------------------------------------
Create or replace TYPE BODY magazin AS
Constructor Function magazin( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 , program_clienti varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='magazin';
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
  self.prog:=program_clienti;
  Return;
  End;
  
  Constructor Function magazin( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 , descrier varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='magazin';
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
  
  Return;
  End;
  
OVERRIDING MEMBER PROCEDURE afiseaza_informatii IS
Begin
dbms_output.put_line('magazin: '|| self.nume);
self.afiseaza_locatie();
if(descriere is not null) then
dbms_output.put_line('Descriere: '|| self.descriere);
end if;
if(prog is not null) then
dbms_output.put_line('Program: '|| self.prog);
end if;
dbms_output.put_line('');
End afiseaza_informatii;

END;

