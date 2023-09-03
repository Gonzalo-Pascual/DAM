create or replace package mis_triggers is 
procedure add_loc(p_locid locations.location_id%type) ;
procedure del_loc(p_locid locations.location_id%type);
end mis_triggers;


create or replace package body mis_triggers is 
procedure add_loc(p_locid locations.location_id%type) is 
begin
  insert into locations(location_id)
  values (p_locid);
exception when others then
    DBMS_OUTPUT.PUT_LINE('Err: adding dept');
end add_loc;
procedure del_loc(p_locid locations.location_id%type) is 
begin
    delete locations
    where location_id = p_locid;
    if sql%notfound then
        RAISE_APPLICATION_ERROR(20203, 'No locations deleted');
    end if;
  commit;
end;

end mis_triggers;


CREATE TABLE aud_loc (
old_location_id NUMBER(6),
new_location_id NUMBER(6));

CREATE OR REPLACE TRIGGER insertar_loc
BEFORE INSERT ON locations
FOR EACH ROW
BEGIN
INSERT INTO aud_loc(old_location_id, new_location_id)
VALUES (:OLD.location_id,:NEW.location_id);
END;


