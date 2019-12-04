USE dictionary;

SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE languages; # DELETE FROM languages
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO languages(code, label) VALUES
    ('en', 'Engleski'),
    ('fr', 'Francuski'),
    ('sr', 'Srpski');
