
CREATE TABLE locatii(
  nume VARCHAR2(20),
  latitudine NUMBER(20,10),
  longitudine NUMBER(20,10),
  oras VARCHAR2(20),
  descriere VARCHAR2(30),
  tip_res VARCHAR2(15),
  id_loc VARCHAR(5)
  )
/
CREATE TABLE locatii_favorite(
  id_user VARCHAR2(5),
  id_loc VARCHAR(5)
  )
/
show errors;
COMMIT;