USE dictionary;

# Truncate (remove) previous data
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE languages; 
TRUNCATE dictionaries;
TRUNCATE word_types;
TRUNCATE words;
TRUNCATE word_translations;
TRUNCATE word_form_types;
TRUNCATE word_form_states;
TRUNCATE word_forms;
SET FOREIGN_KEY_CHECKS = 1;

# Languages
INSERT INTO languages(id, code, label) VALUES
    (1, 'en', 'Engleski'),
    (2, 'de', 'Njemacki');

# Dictionaries
INSERT INTO dictionaries(id, name, language_id) VALUES
    (1, 'Srpsko-engleski', 1),
    (2, 'Srpsko-njemacki', 2);

# Word Types
INSERT INTO word_types (id, label) VALUES
    (1, 'Imenica'),
    (2, 'Pridjev'),
    (3, 'Glagol'),
    (4, 'Zamjenica'),
    (5, 'Brojevi'),
    (6, 'Prilozi'),
    (7, 'Prijedlozi'),
    (8, 'Veznici'),
    (9, 'Uzvici');

# Words
INSERT INTO words (id, slug, value, type_id) VALUES
    (1, 'kuca', 'Kuca', 1),
    (2, 'stolica', 'Stolica', 1),
    (3, 'nebo', 'Nebo', 1),
    (4, 'jak', 'Jak', 2),
    (5, 'visok', 'Visok', 2),
    (6, 'biti', 'Biti', 3),
    (7, 'raditi', 'Raditi', 3);

# Word Translations
INSERT INTO word_translations (id, word_id, language_id, value) VALUES
    (1, 1, 1, 'House'),
    (2, 2, 1, 'Chair'),
    (3, 3, 1, 'Sky'),
    (4, 4, 1, 'Strong'),
    (5, 5, 1, 'Tall'),
    (6, 6, 1, 'To be'),
    (7, 7, 1, 'Work');

# Word form types
INSERT INTO word_form_types (value) VALUES
    ('Prezent'),
    ('Perfekat'),
    ('Futur');

# Word form states
INSERT INTO word_form_states (value) VALUES
    ('Prvo lice jednine'),
    ('Drugi lice jednine'),
    ('Trece lice jednine'),
    ('Prvo lice mnozine'),
    ('Drugi lice mnozine'),
    ('Trece lice mnozine');

# Word forms
INSERT INTO word_forms (type_id, state_id, word_translation_id, value) VALUES
    (1, 1, 6, 'I am'),
    (1, 2, 6, 'You are'),
    (1, 3, 6, 'He/She/It is'),
    (1, 4, 6, 'We are'),
    (1, 5, 6, 'You are'),
    (1, 6, 6, 'They are'),

    (2, 1, 6, 'I was'),
    (2, 2, 6, 'You were'),
    (2, 3, 6, 'He/She/It was'),
    (2, 4, 6, 'We were'),
    (2, 5, 6, 'You were'),
    (2, 6, 6, 'They were'),

    (3, 1, 6, 'I will'),
    (3, 2, 6, 'You will'),
    (3, 3, 6, 'He/She/It will'),
    (3, 4, 6, 'We will'),
    (3, 5, 6, 'You will'),
    (3, 6, 6, 'They will');
