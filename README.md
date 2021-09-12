# PhotoDB
Create a local photo database using a browser inerface to input data into a SQL database. Also use to search through databased photos. 


## Setup
1. Create the directory for the databased files. Name must be DB unless you plan to edit the .php files. 
```
mkdir DB
```
2. Create the SQL database, then exit. Name must be photos.db unless you plan to edit the .php files. 
```
sqlite3 photos.db < sql_setup.sql

(Inside interactive sqlite3)
.exit
```
3. Start a local PHP server.
```
php -S localhost:8000
```
4. Open interface in browser.
http://localhost:8000/index.php
