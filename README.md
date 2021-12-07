# Library

This simple project uses Laravel 7 and describes an application which fetches data from an API and uses this data to populate the tables created using migrations.

There are two controllers created to manage the business logic. The first one is called 'Populate' and it is used to fetch the data from the API and populate the database accordingly. The second controller, 'listAuthors' is merely used to return the top three authors by publications along with the number of their books

All the necessary tables will be created from migrations.
