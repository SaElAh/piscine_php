SELECT `name_cinema`, ROUND(AVG(`nb_seats`)) as `average` FROM `cinema` GROUP BY `name_cinema`; 
