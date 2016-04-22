set serveroutput on;
CREATE OR REPLACE PROCEDURE 
        id_user_maxim (id_user OUT int) 
    AS
        BEGIN
            select max(id_user) into id_user from cont_useri;
            id_user := id_user + 1;
        END id_user_maxim;
/

CREATE OR REPLACE PROCEDURE
        inserare_cont (p_id_user IN varchar2, p_username IN varchar2, p_email IN varchar2, p_pass IN varchar2)
    AS
        BEGIN
            EXECUTE IMMEDIATE 
                    'insert into cont_useri(id_user, username, email, pass) values(:p_id_user, :p_username, :p_email, :p_pass)' 
                using
                    p_id_user, p_username, p_email, p_pass;
        END inserare_cont;

/
set serveroutput on;
CREATE OR REPLACE PROCEDURE 
        verifica_email (p_email IN varchar2, p_ok OUT int)
    AS
        caracter varchar2(1);
        lungime_email int;
        nr_apar_yahoo int := 0; -- apare @yahoo.com de mai multe ori
        nr_apar_gmail int := 0; -- apare @gmail.com de mai multe ori
        nr_apar_hotmail int := 0; -- apare @hotmail.com de mai multe ori
        apare_ayahoocom int := 0; -- apare macar macar o data @yahoo.com
        apare_agmailcom int := 0; -- apare macar macar o data @gmail.com
        apare_ahotmailcom int := 0; -- apare macar macar o data @hotmail.com
        apar_multe_a int := 0; -- apar cel putin 2 @
        apar_multe_com int := 0; -- apar cel putin 2 .com
        
        BEGIN
            p_ok := 1;
            select instr(p_email, '@yahoo.com', 1, 2), instr(p_email, '@yahoo.com') into nr_apar_yahoo, apare_ayahoocom from dual;
            select instr(p_email, '@gmail.com', 1, 2), instr(p_email, '@gmail.com') into nr_apar_gmail, apare_agmailcom from dual;
            select instr(p_email, '@hotmail.com', 1, 2), instr(p_email, '@hotmail.com') into nr_apar_hotmail, apare_ahotmailcom from dual;
            select instr(p_email, '@', 1, 2), instr(p_email, '.com', 1, 2) into apar_multe_a, apar_multe_com from dual;
            
            if( nr_apar_yahoo != 0 OR nr_apar_hotmail != 0 OR nr_apar_gmail != 0) -- apar 2 la fel
                THEN
                    dbms_output.put_line('apar 2 la fel');
                    p_ok := 0; -- adresa invalida
            END IF;
            
            if( (apare_ayahoocom != 0 AND apare_agmailcom != 0) OR (apare_ayahoocom != 0 AND apare_ahotmailcom != 0) OR (apare_agmailcom != 0 AND apare_ahotmailcom != 0) )
                THEN  -- apar 2 diferite
                    dbms_output.put_line('apar 2 diferite');
                    p_ok := 0; -- adresa invalida    
            END IF;
            
            if( apare_ayahoocom = 0 AND apare_agmailcom = 0 AND apare_ahotmailcom = 0 ) -- adresa nu contine @yahoo.com/@hotmail.com/@gmail.com
                THEN
                    dbms_output.put_line('adresa nu contine @yahoo.com/@hotmail.com/@gmail.com');
                    p_ok := 0; -- adresa invalida 
            END IF;
            
            if( apar_multe_a != 0 OR apar_multe_com != 0) -- cel putin 2 @ sau 2 .com
                THEN
                    dbms_output.put_line('apar cel putin 2 @ sau .com');
                    p_ok := 0;
            END IF;
            
        END verifica_email;
/
DECLARE
  init int;
BEGIN
  verifica_email('alex@yahoo.com',init);
  dbms_output.put_line(init||'alex');
END;
/
show errors;
COMMIT;