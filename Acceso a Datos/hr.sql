create or replace package mis_triggers is 
procedure add_job(p_jobid jobs.job_id%type, p_jobtitle jobs.job_title%type);
procedure del_job(p_jobid jobs.job_id%type);
procedure  upd_job(p_jobid jobs.job_id%type, p_jobtitle jobs.job_title%type);
end mis_triggers;
create or replace package body mis_triggers is 
procedure add_job(
  p_jobid jobs.job_id%type,
  p_jobtitle jobs.job_title%type) IS
begin
  insert into jobs(job_id, job_title)
  values (p_jobid, p_jobtitle);
exception when others then
    DBMS_OUTPUT.PUT_LINE('Err: adding dept');
end;
procedure del_job(
    p_jobid jobs.job_id%type) is
begin
    delete jobs
    where job_id = p_jobid;
    if sql%notfound then
        RAISE_APPLICATION_ERROR(20203, 'No jobs deleted');
    end if;
  commit;
end;
procedure upd_job(
  p_jobid jobs.job_id%type,
  p_jobtitle jobs.job_title%type) IS
begin
  update jobs
  set job_title =  p_jobtitle
  where job_id = p_jobid;
  if sql%notfound then
    RAISE_APPLICATION_ERROR(-20202, 'No job updated'); /*el -20202 es un número de error inventado pero el mínimo tiene que ser 20200*/
  end if;
  commit;
end;
end mis_triggers;

