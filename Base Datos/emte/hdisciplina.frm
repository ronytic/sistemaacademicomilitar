TYPE=VIEW
query=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`a`.`gestion` AS `gestion`,`d`.`fecha` AS `fecha`,`d`.`memo` AS `memo`,`d`.`tipo` AS `tipo`,`d`.`sancion` AS `sancion`,`d`.`puntaje` AS `puntaje` from `emte`.`alumno` `a` join `emte`.`disciplina` `d` where (`a`.`ci` = `d`.`ci`)
md5=976e246b98a3beadf41ec7e0b29b31fb
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
revision=1
timestamp=2013-07-04 12:12:52
create-version=1
source=SELECT a.ci, a.grado, a.espe, a.nombres, a.paterno, a.materno, a.curso, a.gestion, d.fecha, d.memo, d.tipo, d.sancion, d.puntaje FROM alumno a, disciplina d WHERE a.ci = d.ci
