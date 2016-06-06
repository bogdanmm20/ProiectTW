DROP TYPE dentist force;
/
Create TYPE dentist UNDER resursa
(telefon varchar2(15),
 program varchar2(100),

Constructor Function dentist( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2, program_clienti varchar2)
  RETURN SELF as RESULT ,
 Constructor Function dentist( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2, program_clienti varchar2, descrier varchar2)
  RETURN SELF as RESULT ,

OVERRIDING member procedure afiseaza_informatii
);
/
------------------------------------------------------
Create or replace TYPE BODY dentist AS
Constructor Function dentist( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2, program_clienti varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='dentist';
  self.nume:=p_nume;
 --------------------------
  self.latitudine:=lat;
  self.longitudine:=longit;
  self.adresa_strazii:= adresa;
  self.cod_postal := null;
  self.oras:=oras;
  self.id_tara:='RO';
----------------------------
  self.telefon:=tel;
  self.program:=program_clienti;
  
  Return;
  End;
  
  Constructor Function dentist( p_nume varchar2 ,lat number, longit number, oras varchar2,adresa varchar2 ,tel varchar2, program_clienti varchar2, descrier varchar2)
  RETURN SELF as RESULT 
   as 
  Begin
  self.tip_res:='dentist';
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
  self.program:=program_clienti;
  
  
  Return;
  End;
  
OVERRIDING MEMBER PROCEDURE afiseaza_informatii IS
Begin
dbms_output.put_line('Dentist: '|| self.nume);
self.afiseaza_locatie();
dbms_output.put_line('Telefon: '||self.telefon);
if(descriere is not null) then
dbms_output.put_line('Descriere: '|| self.descriere);
end if;
if(prog is not null) then
dbms_output.put_line('Descriere: '|| self.descriere);
end if;
dbms_output.put_line('');
End afiseaza_informatii;

END;

