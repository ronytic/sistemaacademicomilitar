TYPE=VIEW
query=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`s`.`gestion` AS `gestion`,`s`.`GEO-201` AS `GEO-201`,`s`.`EDI-202` AS `EDI-202`,`s`.`CAR-203` AS `CAR-203`,`s`.`TER-204` AS `TER-204`,`s`.`FOT-205` AS `FOT-205`,`s`.`CSU-206` AS `CSU-206`,`s`.`TGR-207` AS `TGR-207`,`s`.`DTT-208` AS `DTT-208`,`s`.`TOP-209` AS `TOP-209`,`s`.`FIS-210` AS `FIS-210`,`s`.`ING-211` AS `ING-211`,`s`.`HMI-212` AS `HMI-212` from (`emte`.`alumno` `a` join `emte`.`segundo` `s`) where ((`a`.`ci` = `s`.`CI`) and (`a`.`gestion` = `s`.`gestion`))
md5=15dbb91cd60f5127ecb2936f5a1349a0
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
revision=1
timestamp=2013-08-25 15:02:55
create-version=1
source=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`s`.`gestion` AS `gestion`,`s`.`GEO-201` AS `GEO-201`,`s`.`EDI-202` AS `EDI-202`,`s`.`CAR-203` AS `CAR-203`,`S`.`TER-204` AS `TER-204`,`S`.`FOT-205` AS `FOT-205`,`S`.`CSU-206` AS `CSU-206`,`S`.`TGR-207` AS `TGR-207`,`S`.`DTT-208` AS `DTT-208`,`S`.`TOP-209` AS `TOP-209`,`S`.`FIS-210` AS `FIS-210`,`S`.`ING-211` AS `ING-211`,`S`.`HMI-212` AS `HMI-212` from (`alumno` `a` JOIN `segundo` `s`) where (`a`.`ci` = `s`.`ci` AND `a`.`gestion` = `s`.`gestion`)
