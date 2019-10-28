SELECT `title`,`summary` FROM `film` WHERE (`summary` LIKE '%42%' OR `title` LIKE '%42%') order by `duration`;
