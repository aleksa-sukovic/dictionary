# Dictionary

Dictionary is application that allows you to keep track of words, organize them in dictionaries, translate them into different languages and much more.

This application was built as part of lectures I held as an instructor of 3-month bootcamp organized by [Amplitudo](https://www.amplitudo.me/).

## Technologies
- PHP 7.4
- HTML
- CSS + Bootstrap

## Application Structure

Main idea was to demonstrate principles of PHP web applications trough concrete project. Throughout several lectures, students were introduced to different aspects of PHP applications backed-up with live coding examples.

Some of the concepts that were introduced include database design, SQL queries, forms processing, application architecture (repositories, transformers, models...), HTTP protocol, and much more. 

## Project setup

You can run this project using Docker or any web server supporting PHP 7.4.

#### Docker
1. Clone this repository wherever you see fit.
2. From terminal, navigate to cloned repository.
3. Run `docker-compose build`.
4. Run `docker-compose up`.
5. Execute sql file: `resources/sql/migrate_database.sql` to create database. 
6. Execute sql file: `resources/sql/seed_database.sql` to populate the database with sample data.
7. Navigate to *http://localhost:80*.

#### Other
1. There are no special requirements, you can host this application on any server supporting PHP.

