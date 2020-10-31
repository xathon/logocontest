# Logo Contest v1.0
If you host this yourself, make sure to create a .env file with the following contents:
```
DB_HOST="YOUR_HOST"
DB_PASS="YOUR_PASSWORD"
DB_USER="YOUR_DATABASE"
DB_NAME="logocontest"
DB_PORT="YOUR_PORT"
```
Also install the dependencies via `composer install`.
To setup the database, create a database called `logocontest`, edit the database.sql file with the filepath to your local copy of GGS6 Teams.csv (you might need to move it to a path mysql has access to) and enter it with `mysql < database.sql`.

## Usage
On the main page, there's a link to the voting page. There is also a dynamic results page, where the logos are ranked by their percentage of won matchups.

## To-Do
All done!
