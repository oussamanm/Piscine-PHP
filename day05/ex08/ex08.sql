SELECT `last_name`,`first_name`,DATE(`birthdate`) as `birthdate` from `user_card` WHERE DATE_FORMAT(`birthdate`, '%Y') = '1989' ORDER BY `last_name` ASC;
