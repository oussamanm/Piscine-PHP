SELECT COUNT(*) as `movies` FROM `member_history` WHERE  (MONTH(`date`) = 12 AND DAY(`date`) = 24) OR (`date` BETWEEN '2006/10/30' AND '2007/07/27');
