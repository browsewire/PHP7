Instruction steps to install this application on our PC/server:
1. Install wamp on you PC/Server
2. Copy the testjob.zip file to wanp https docs dir.
3. unzip the testjob.zip file.
4. Open phomyadmin and create new database.
5. open the testjob/index.php in browser.
6. Follow complete database setup process by entering the: 
  a. database hostname (servername)
  b. data base user name
  c. data base password if required
  d. databse name.

7. Import sample data.

File Sturcture:
--testjob

----Instruction-Steps.txt (Instruction steps to install this application on our PC/server)

----assets(include all css/js)

----includes

--------config.php(database configuration related function ie create new table, import sample data)

--------footer.php (footer section to include js files)

--------header.php (header section to include css files)

--------function.php(includes function to read data from database table)

--------connection.php (includes database connection setting, this file will be generated dynamically)

----index.php (main file to list data)

----setup.php (database configuration setup screen)




