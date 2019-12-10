SELECT DISTINCT type_name FROM words;

SELECT *
FROM word_types WT
WHERE WT.name = 'imenica'
   OR WT.name = 'glagol'
   OR WT.name = 'pridjev';

SELECT *
FROM word_types WT
WHERE WT.name IN ('imenica', 'glagol', 'pridjev');

SELECT *
FROM word_types WT
WHERE WT.name IN (
    SELECT DISTINCT word_type FROM words
);

SELECT *
FROM word_types WT
WHERE EXISTS (
    SELECT * FROM words W WHERE W.type_name = WT.name
);

SELECT *
FROM word_forms;

SELECT *
FROM words W
WHERE EXISTS (
    SELECT * FROM word_translations WT
    WHERE WT.language_code = 'en' AND W.slug = WT.word_slug
);

SELECT *
FROM words W, word_types WT
WHERE W.type_name = WT.name

SELECT *
FROM words W INNER JOIN word_types WT ON W.type_name = WT.name
;

SELECT *
FROM word_types WT, words W
WHERE WT.name = W.type_name;

SELECT *
FROM word_types WT LEFT JOIN words W ON WT.name = W.type_name;





























