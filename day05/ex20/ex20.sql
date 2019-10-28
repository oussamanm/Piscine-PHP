SELECT `gnr`.`id_genre` AS `id_genre`,`gnr`.`name` AS `name_genre`,`dstr`.`id_distrib` AS `id_distrib`,`dstr`.`name` AS `name_distrib`,`flm`.`title` AS `title_film` FROM `film` AS `flm` LEFT JOIN `distrib` AS `dstr` ON  `dstr`.`id_distrib`= `flm`.`id_distrib` LEFT JOIN `genre` AS `gnr` ON  `gnr`.`id_genre`= `flm`.`id_genre` WHERE `gnr`.`id_genre` BETWEEN 4 AND 8;