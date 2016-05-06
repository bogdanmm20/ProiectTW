
CREATE TABLE locatii_personale(
  proprietar VARCHAR2(30),
  nume VARCHAR2(20),
  latitudine NUMBER(20,10),
  longitudine NUMBER(20,10),
  oras VARCHAR2(20),
  descriere VARCHAR2(30),
  tip_res VARCHAR2(15),
  id_res INTEGER
  )
/
CREATE TABLE locatii_favorite(
  proprietar VARCHAR2(30),
  nume VARCHAR2(20),
  latitudine NUMBER(20,10),
  longitudine NUMBER(20,10),
  oras VARCHAR2(20),
  descriere VARCHAR2(30),
  tip_res VARCHAR2(15),
  id_res INTEGER
  )
/
show errors;
COMMIT;