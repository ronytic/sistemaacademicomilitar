TYPE=VIEW
query=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`t`.`gestion` AS `gestion`,`t`.`TOP-301` AS `TOP-301`,`t`.`TEL-302` AS `TEL-302`,`t`.`TCC-303` AS `TCC-303`,`t`.`SIG-304` AS `SIG-304`,`t`.`TCO-305` AS `TCO-305`,`t`.`PCU-306` AS `PCU-306`,`t`.`CAT-307` AS `CAT-307`,`t`.`ING-308` AS `ING-308`,`t`.`GEO-309` AS `GEO-309` from (`emte`.`alumno` `a` join `emte`.`tercero` `t`) where ((`a`.`ci` = `t`.`ci`) and (`a`.`gestion` = `t`.`gestion`))
md5=e36b4f506c1d43ba5512fbc4bb891e1c
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
revision=1
timestamp=2013-08-25 15:08:32
create-version=1
source=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`t`.`gestion` AS `gestion`,`t`.`TOP-301` AS `TOP-301`,`t`.`TEL-302` AS `TEL-302`,`t`.`TCC-303` AS `TCC-303`,`t`.`SIG-304` AS `SIG-304`,`t`.`TCO-305` AS `TCO-305`,`t`.`PCU-306` AS `PCU-306`,`t`.`CAT-307` AS `CAT-307`,`t`.`ING-308` AS `ING-308`,`t`.`GEO-309` AS `GEO-309` from (`alumno` `a` JOIN `tercero` `t`) where (`a`.`ci` = `t`.`ci` AND `a`.`gestion` = `t`.`gestion`)
