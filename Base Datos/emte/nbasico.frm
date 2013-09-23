TYPE=VIEW
query=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`b`.`gestion` AS `gestion`,`b`.`GEO-401` AS `GEO-401`,`b`.`FOT-402` AS `FOT-402`,`b`.`CAR-403` AS `CAR-403`,`b`.`IST-404` AS `IST-404`,`b`.`INS-405` AS `INS-405`,`b`.`MAP-406` AS `MAP-406` from (`emte`.`alumno` `a` join `emte`.`basico` `b`) where ((`a`.`ci` = `b`.`ci`) and (`a`.`gestion` = `b`.`gestion`))
md5=79cef2c17baed11614d417409570283e
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
revision=1
timestamp=2013-08-25 15:43:52
create-version=1
source=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`b`.`gestion` AS `gestion`,`b`.`GEO-401` AS `GEO-401`,`b`.`FOT-402` AS `FOT-402`,`b`.`CAR-403` AS `CAR-403`,`b`.`IST-404` AS `IST-404`,`b`.`INS-405` AS `INS-405`,`b`.`MAP-406` AS `MAP-406` from (`alumno` `a` JOIN `basico` `b`) where (`a`.`ci` = `b`.`ci` AND `a`.`gestion` = `b`.`gestion`)
