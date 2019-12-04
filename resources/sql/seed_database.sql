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
INSERT INTO languages(code, label) VALUES
    ('en', 'Engleski'),
    ('de', 'Njemacki');

# Dictionaries
INSERT INTO dictionaries(name, language_code) VALUES
    ('Srpsko-engleski', 'en'),
    ('Srpsko-njemacki', 'de');

# Word Types
INSERT INTO word_types (name, label) VALUES
    ('imenica', 'Imenica'),
    ('pridjev', 'Pridjev'),
    ('glagol', 'Glagol'),
    ('zamjenica', 'Zamjenica'),
    ('brojevi', 'Brojevi'),
    ('prilozi', 'Prilozi'),
    ('prijedlozi', 'Prijedlozi'),
    ('veznici', 'Veznici'),
    ('uzvici', 'Uzvici');

# Words
INSERT INTO words (slug, value, type_name) VALUES
    ('kuca', 'Kuca', 'imenica'),
    ('stolica', 'Stolica', 'imenica'),
    ('nebo', 'Nebo', 'imenica'),
    ('jak', 'Jak', 'pridjev'),
    ('visok', 'Visok', 'pridjev'),
    ('biti', 'Biti', 'glagol'),
    ('raditi', 'Raditi', 'glagol');

# Word Translations
INSERT INTO word_translations (word_slug, language_code, value) VALUES
    ('kuca', 'en', 'House'),
    ('stolica', 'en', 'Chair'),
    ('nebo', 'en', 'Sky'),
    ('jak', 'en', 'Strong'),
    ('visok', 'en', 'Tall'),
    ('biti', 'en', 'To be'),
    ('raditi', 'en', 'Work');

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
INSERT INTO word_forms (type_id, state_id, word_slug, language_code, value) VALUES
    (1, 1, 'biti', 'en', 'I am'),
    (1, 2, 'biti', 'en', 'You are'),
    (1, 3, 'biti', 'en', 'He/She/It is'),
    (1, 4, 'biti', 'en', 'We are'),
    (1, 5, 'biti', 'en', 'You are'),
    (1, 6, 'biti', 'en', 'They are'),

    (2, 1, 'biti', 'en', 'I was'),
    (2, 2, 'biti', 'en', 'You were'),
    (2, 3, 'biti', 'en', 'He/She/It was'),
    (2, 4, 'biti', 'en', 'We were'),
    (2, 5, 'biti', 'en', 'You were'),
    (2, 6, 'biti', 'en', 'They were'),

    (3, 1, 'biti', 'en', 'I will'),
    (3, 2, 'biti', 'en', 'You will'),
    (3, 3, 'biti', 'en', 'He/She/It will'),
    (3, 4, 'biti', 'en', 'We will'),
    (3, 5, 'biti', 'en', 'You will'),
    (3, 6, 'biti', 'en', 'They will');