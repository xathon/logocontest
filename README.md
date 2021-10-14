# Logo Contest v2.0
If you host this yourself, make sure to create a .env file with the following contents:
```
DB_HOST="YOUR_HOST"
DB_PASS="YOUR_PASSWORD"
DB_USER="YOUR_DATABASE"
DB_NAME="logocontest"
DB_PORT="YOUR_PORT"
```
Also install the dependencies via `composer install`.
To setup the database, create a database called `logocontest`, edit the database.sql file with the filepath to your local copy of GGS8 Teams.csv (you might need to move it to a path mysql has access to) and enter it with `mysql < database.sql`.

## Usage
On the main page, there's a link to the voting page. There is also a dynamic results page, where the logos are ranked by their percentage of won matchups.

## Screenshots


![desktopstart](https://user-images.githubusercontent.com/36819668/137232498-115f56ab-ffc6-46c6-beb4-c621c3dc1348.png)
![desktopvote](https://user-images.githubusercontent.com/36819668/137232897-5d08a6c9-d51a-4b13-84c7-1c2725c6923b.png)
![mobilestart](https://user-images.githubusercontent.com/36819668/137232508-112e8430-00ef-4954-bdf1-850466993b1f.png)
![mobilevote](https://user-images.githubusercontent.com/36819668/137232908-9eac379c-d4fc-4305-8b03-4827dd3e9898.png)


## To-Do
Rewrite post-season awards and landing page
