# PhotoDB
Create a local photo database using a browser inerface to input data into a SQL database. Also use to search through databased photos. 


## Setup
1. Create the directory for the databased files. Name must be DB unless you plan to edit the .php files. 
```
mkdir DB
```
2. Copy the repo files to the same location.
```
git clone (this repo)
```
3. Create the SQL database, then exit. Name must be photos.db unless you plan to edit the .php files. 
```
sqlite3 photos.db < sql_setup.sql

(Inside interactive sqlite3)
.exit
```
4. Start a local PHP server in the same location as the DB directory. If files won't upload, try increasing the max file size in php.ini
```
php -S localhost:8000 -c php.ini
```
5. Open interface in browser.
http://localhost:8000/index.php

### NOTE: Files will be added in the `DB` in subdirectories with the date uploaded. 
