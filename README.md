# Logo Contest WIP
If you host this yourself, make sure to create a .env file with the following contents:
```
DB_HOST="YOUR_HOST"
DB_PASS="YOUR_PASSWORD"
DB_USER="YOUR_DATABASE"
DB_NAME="logocontest"
DB_PORT="YOUR_PORT"
```
Also install the dependencies via `composer install`.

## Usage
Staff can upload logos via the upload.php site. On the main page, there's a link to the voting page and to the dynamic results page.
There, the logos are ranked by their percentage of won matchups.

## To-Do
* Build a non-ugly frontend
* Alter collected data as needed
* Automatically resize logos
