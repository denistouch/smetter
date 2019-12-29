SELECT laureates.id, laureates.firstname, laureates.surname, prizes.year, prizes.category, laureates.bornCountry
FROM laureates,
     prizes
WHERE laureates.id = prizes.laureate_id
  AND year LIKE ':year'
  AND category LIKE ':category'
  AND bornCountry LIKE ':country'
GROUP BY laureates.id
LIMIT :start , 50