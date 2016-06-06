DROP TYPE resursa force;
/
CREATE or REPLACE TYPE resursa as OBJECT
(
    tip_res     VARCHAR2(20),-- REFERENCES categ(tip_res)
    nume        VARCHAR2(50),
    -------------------------------------
    latitudine  NUMBER(8,4) , -- float cu 4 zecimale de obicei
    longitudine NUMBER(8,4), --float cu 4 zecimale de obicei
    adresa_strazii VARCHAR2(100 BYTE) ,
    cod_postal VARCHAR2(12 BYTE) ,
    oras       VARCHAR2(30 BYTE) , --Not Null
    id_tara    CHAR(2 BYTE) , -- REFERENCES tari(id_tara)
    --------------------------------------
    descriere   VARCHAR2(140),
    
member procedure afiseaza_locatie,
NOT FINAL member procedure afiseaza_informatii,

MAP member function alfabet RETURN varchar2,

Constructor function resursa(tip_res varchar2,  p_nume varchar2, lat number, longit number,  p_oras varchar2 DEFAULT 'Iasi')
  RETURN SELF as RESULT
)NOT FINAL;
/
--------------------------------------------------
CREATE or REPLACE TYPE BODY resursa AS
MAP member function alfabet RETURN varchar2 is
Begin
    Return self.tip_res||self.nume;
End;

Constructor Function resursa(tip_res varchar2,  p_nume varchar2, lat number, longit number,  p_oras varchar2 DEFAULT 'Iasi')
  RETURN SELF as RESULT 
  as 
  Begin
  self.tip_res:=tip_res;
  self.nume:=p_nume;
  self.descriere:=null;
  
  self.latitudine:=lat;
  self.longitudine:=longit;
  self.adresa_strazii:= null;
  self.cod_postal := null;
  self.oras:=p_oras;
  self.id_tara:='RO';
  Return;
  End;
  

Member Procedure afiseaza_locatie IS
  Begin 
  dbms_output.put_line('Adresa: '||latitudine||' '||longitudine||', '||adresa_strazii);
  DBMS_OUTPUT.PUT_LINE(oras||', '|| id_tara || ' ' ||cod_postal);   
  End afiseaza_locatie;
  
member procedure afiseaza_informatii Is
Begin
dbms_output.put_line('Tip Resursa '|| upper(self.tip_res)||' : '|| self.nume);
self.afiseaza_locatie();
if(self.descriere is not null) then
dbms_output.put_line('Descriere: '|| self.descriere);
end if;
dbms_output.put_line('');
End afiseaza_informatii;
END;
