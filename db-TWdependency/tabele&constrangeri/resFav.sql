
-------------------------------------------
DROP TABLE resursefav;
/
CREATE TABLE resursefav
  (
    id_user NUMBER(10) not null,
    id_res  NUMBER(10) ,
    PRIMARY KEY(id_user,id_res) --index (id_user,id_res)
  );
/
ALTER TABLE resursefav
ADD CONSTRAINT fkDC_resurse
  FOREIGN KEY (id_res)
  REFERENCES resurse_oop(id_res)
  ON DELETE CASCADE;
 /
ALTER TABLE resursefav
ADD CONSTRAINT fkDC_user
  FOREIGN KEY (id_user)
  REFERENCES cont_useri(id_user)
   ON DELETE CASCADE;
 /