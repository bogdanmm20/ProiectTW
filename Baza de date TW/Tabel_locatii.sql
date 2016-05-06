
CREATE TABLE locatii(
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
  id_user INTEGER,
  id_res INTEGER
  )
/
show errors;
COMMIT;