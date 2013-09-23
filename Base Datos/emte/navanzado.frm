TYPE=VIEW
query=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`x`.`gestion` AS `gestion`,`x`.`GEO-501` AS `GEO-501`,`x`.`FOT-502` AS `FOT-502`,`x`.`CAR-503` AS `CAR-503`,`x`.`IST-504` AS `IST-504`,`x`.`INS-505` AS `INS-505`,`x`.`MAP-506` AS `MAP-506` from (`emte`.`alumno` `a` join `emte`.`avanzado` `x`) where ((`a`.`ci` = `x`.`ci`) and (`a`.`gestion` = `x`.`gestion`))
md5=2bf09bacd4e64fc5e2b9cec4e9130d61
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
revision=1
timestamp=2013-08-25 15:50:10
create-version=1
source=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`x`.`gestion` AS `gestion`,`x`.`GEO-501` AS `GEO-501`,`x`.`FOT-502` AS `FOT-502`,`x`.`CAR-503` AS `CAR-503`,`x`.`IST-504` AS `IST-504`,`x`.`INS-505` AS `INS-505`,`x`.`MAP-506` AS `MAP-506` from (`alumno` `a` JOIN `avanzado` `x`) where (`a`.`ci` = `x`.`ci` AND `a`.`gestion` = `x`.`gestion`)
