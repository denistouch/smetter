UPDATE laureates
SET deleted = 1
WHERE id LIKE ':id';