SELECT `title` as `Title`, `summary` as `SUMMARY`, `prod_year`
FROM `film` INNER JOIN `genre` ON film.id_genre LIKE genre.id_genre
WHERE genre.name LIKE 'erotic'
ORDER BY `prod_year` DESC;