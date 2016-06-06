DROP TYPE banca force;
/
Create TYPE banca UNDER resursa
(telefon varchar2(15),
 program_de_lucru varchar2(100),

Constructor Function banca( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,
tel varchar2 , program_clienti varchar2)
  RETURN SELF as RESULT ,
Constructor Function banca( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,
tel varchar2 , program_clienti varchar2, descrier varchar2)
  RETURN SELF as RESULT ,

OVERRIDING member procedure afiseaza_informatii
)
/
------------------------------------------------------
Create or replace TYPE BODY banca AS
Constructor Function banca( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,
tel varchar2 , program_clienti varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='banca';
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
  self.program_de_lucru:=program_clienti;
  Return;
  End;
  
  Constructor Function banca( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,
  tel varchar2,program_clienti varchar2, descrier varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='banca';
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
   self.program_de_lucru:=program_clienti;
  
  
  Return;
  End;
  
OVERRIDING MEMBER PROCEDURE afiseaza_informatii IS
Begin
dbms_output.put_line('Banca: '|| self.nume);
self.afiseaza_locatie();
dbms_output.put_line('Telefon: '||self.telefon);
if(program_de_lucru is not null) then
dbms_output.put_line('Program: '|| self.descriere);
end if;
if(descriere is not null) then
dbms_output.put_line('Descriere: '|| self.descriere);
end if;
dbms_output.put_line('');
End afiseaza_informatii;

END;

