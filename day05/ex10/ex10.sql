SELECT `title` as `Title`, `summary` as `Summary`, `prod_year` FROM `film`,`genre` WHERE `film`.`id_genre` = `genre`.`id_genre` AND `genre`.`name` = 'erotic' ORDER BY `film`.`prod_year` DESC;
