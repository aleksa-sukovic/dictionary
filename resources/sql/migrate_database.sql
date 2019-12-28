DROP DATABASE IF EXISTS dictionary;
CREATE DATABASE dictionary;
USE dictionary;

CREATE TABLE languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(10),
    label VARCHAR(255) NOT NULL
);

CREATE TABLE dictionaries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NULL,

    language_id INT NULL,

    CONSTRAINT FK_DICTIONARIES_LANGUAGE FOREIGN KEY (language_id)
        REFERENCES languages(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

CREATE TABLE word_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL
);

CREATE TABLE words (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(255),
    value VARCHAR(255) NOT NULL,

    type_id INT,

    CONSTRAINT FK_WORDS_TYPES FOREIGN KEY (type_id)
        REFERENCES word_types(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE word_translations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    value VARCHAR(255) NOT NULL,

    word_id INT NOT NULL,
    language_id INT NOT NULL,

    CONSTRAINT FK_WORD_TRANSLATIONS_WORD FOREIGN KEY (word_id)
        REFERENCES words(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT FK_WORD_TRANSLATIONS_LANGUAGE FOREIGN KEY (language_id)
        REFERENCES languages(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE word_form_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    value VARCHAR(255) NOT NULL
);

CREATE TABLE word_form_states (
    id INT AUTO_INCREMENT PRIMARY KEY,
    value VARCHAR(255) NOT NULL
);

CREATE TABLE word_forms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    value VARCHAR(255),

    type_id INT NULL,
    state_id INT NULL,
    word_translation_id INT,

    CONSTRAINT FK_WORD_FORMS_TYPE FOREIGN KEY (type_id)
        REFERENCES word_form_types(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    CONSTRAINT FK_WORD_FORMS_STATES FOREIGN KEY (state_id)
        REFERENCES word_form_states(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    CONSTRAINT FK_WORD_FORMS_WORD_TRANSLATION FOREIGN KEY (word_translation_id)
        REFERENCES word_translations(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
