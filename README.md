This is a Project about Class check-in with QRCode.

Before using this project. Please follow these instruction below.

--- user/pass ---

1. student : 5610450080/0080
2. Teacher : 5610400091/0091
3. Admin   : 5610450063/0063

--- ### ---

--- System Requirement ---

1. Apache/2.4.18
2. PHP/7.0.8
3. MariaDB

--- ### ---

--- Database setup Instructions ---

1. Create a Database <'project_webtech_csslnw'>
or with your custom Database name but you have to edit the 'dbconfig.php' files.

2. Import 'files/db/project_webtech_csslnw.sql' to the Database

That's all about the database. 

--- ### ---

--- User for the Database --- 

    By default it's user 'root' with no password in localhost,
if you want to use another user please edit the 'dbconfig.php' files.

--- ### ---

--- CSV Files Layout for Import ---

    Administrator of this project can upload data to Database with CSV files which
have 3 layout to follow.

1. CSV for upload a user in system at admin_user.php page.
It's compose of 4 value seperate by ','(comma) 
    -- ex. 5510012345, Firstname, Lastname, 2
    1.1 5510012345 is a username which is a primary key of user table
    1.2 Firstname of the user.
    1.3 Lastname of the user.
    1.4 role of this user in this Project
        1.4.1 role Student = 1
        1.4.2 role Teacher = 2
        1.4.2 role Laboratory-Teacher = 3
        1.4.2 role Administrator = 4
example file is at 'files/exampleCSV/User1.csv , User2.csv

2. CSV for upload a Subject to Database.
    First line of the find is '#AddSubject' to let the server know how to read this file.
after the first line is a subject details one subject per line.
    -- ex. 01418131,Digital Computer Logic,3
    2.1 01418131 is a subjectID which is a primary key of subject table
    2.2 Subject name
    2.3 credit of this subject
example file is at 'files/exampleCSV/Subject1.csv, Subject2.csv

3. CSV for assign a user to take or teach in subject One file per One subject.
    First line of the find is '#AddSem' to let the server know how to read this file.
after the first line is '@' to start read teacher_id who teach this session and close with '@' to change to read student_id who take this session. One user per line

example file is at 'files/exampleCSV/AddSem1.csv, AddSem2.csv

--- ### ---

Created by: 01418443 CS KU
            5610404452 Boonyaporn Narkjumrussri 
            5610450063 Jompol Sermsook 
            5610450993 Pannawat Kanyawutthiphat 
            5710404357 Nattaya Thitipimolpran 
            5710404446 Poramain keawpan 
            5710404624 Waranya Thamsritip