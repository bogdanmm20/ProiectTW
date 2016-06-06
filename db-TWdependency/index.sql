--------------------
--indecsi PK
--indecsi FK
--------------------
Drop index ix_nume;
Create index ix_nume on resurse_oop (UPPER(obiect.nume));
/
--------------------
--Toate locatiile din vecinatate
Drop index ix_location;
CREATE INDEX ix_location ON resurse_oop (obiect.latitudine, obiect.longitudine);
/
--------------------
-- nu merge pt ca XE , SE, EE

-- Drop index bitmap_tip_res;
-- create bitmap index bitmap_tip_res on resurse_oop(obiect.tip_res);
-- in schimb vom folosi :
Drop index ix_tip_res;
create index ix_tip_res on resurse_oop(obiect.tip_res);
-------------------
