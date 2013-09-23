TYPE=VIEW
query=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`p`.`gestion` AS `gestion`,`p`.`TES-100` AS `TES-100`,`p`.`FIS-101` AS `FIS-101`,`p`.`GEO-102` AS `GEO-102`,`p`.`QUI-103` AS `QUI-103`,`p`.`ALG-104` AS `ALG-104`,`p`.`CCO-105` AS `CCO-105`,`p`.`REG-106` AS `REG-106`,`p`.`CAL-107` AS `CAL-107`,`p`.`DHH-108` AS `DHH-108`,`p`.`GRN-109` AS `GRN-109` from (`emte`.`alumno` `a` join `emte`.`primero` `p`) where ((`a`.`ci` = `p`.`ci`) and (`a`.`gestion` = `p`.`gestion`))
md5=058efe02aacc8c61b5c246ed5242d9d6
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
revision=1
timestamp=2013-08-11 12:25:32
create-version=1
source=select `a`.`ci` AS `ci`,`a`.`grado` AS `grado`,`a`.`espe` AS `espe`,`a`.`nombres` AS `nombres`,`a`.`paterno` AS `paterno`,`a`.`materno` AS `materno`,`a`.`curso` AS `curso`,`p`.`gestion` AS `gestion`,`p`.`TES-100` AS `TES-100`,`p`.`FIS-101` AS `FIS-101`,`p`.`GEO-102` AS `GEO-102`,`p`.`QUI-103` AS `QUI-103`,`p`.`ALG-104` AS `ALG-104`,`p`.`CCO-105` AS `CCO-105`,`p`.`REG-106` AS `REG-106`,`p`.`CAL-107` AS `CAL-107`,`p`.`DHH-108` AS `DHH-108`,`p`.`GRN-109` AS `GRN-109` from (`alumno` `a` JOIN `primero` `p`) where (`a`.`ci` = `p`.`ci` AND `a`.`gestion` = `p`.`gestion`)
