# Teacher Management System

## Requirements
- PHP 7.0.1
- Apache 2.4.3
- MySQL 5.7.14
- Composer dependency manager
- Laravel 5.5 framework (Already exists in the project)
- Bash / command line

## Database Setup
Database needs to be build Using php artisan migrate.
- Go to command line
- locate to the project folder
- execute the command **php artisan migrate**
- if any error occured during the migrate following needs to be executed 
  **php artisan migrate:fresh**

- To restore sample data, use the following command
  **php artisan db:seed**

- In case the above fails for any reason, db.sql file is added on /sample_db folder which has
  a full dump of the app with the schema and data both.

## Application Setup

- Uncompressed source code must be put on a document root which has a virtual host setup.
   Or it could be run on using executing **php artisan serve** command.

- If any issue occurres issue the follwoing commands,
  **composer update**
  **composer dump-autoload**

## Case
Manage teachers and students along with the classes they take. Students can be assigned and removed from the classes.

## Assumptions:  
1.	System has one administrator login to operate.
2.	A week is from Monday to Friday.
3.	Created time schedule is repeated in every week.
4.	There is only one hall in the institute. (No parallel classes)
5.	Instructor can teach one or many subjects.
6.	Admin has to create the definitions first in order to proceed. Definitions are time frames, subjects, instructors, students. Sample data is given in the installation.

## Features
1.	User can login
2.	User will be directed to home page
3.	User can logout
4.	User has to define timeframes. (add, edit, delete)
5.	User has to define subjects. Subject code is unique. (add, edit, delete)
6.	User has to add instructors.  (add, edit, delete)
7.	User has to add students. (add, edit, delete) 
8.	User has to create a class. When creating the data will be loaded as the availability of each component. 
9.	User has to assign students to a class. When adding data will be loaded as the availability of each component. Ex: When selecting a timeframe, only applicable subjects are loaded in the next element. This will prevent the duplication and make the usability.
10.	User can remove students.
11.	A class cannot be deleted if students are assigned already.
12.	Timeframe, subject, instructors are not to be deleted if it is used for a class already.

## Features to be implemented in the next phase
1.	Class room to be added as a definition. When creating a class schedule, the class room attribute also stored to provide the support of multiple classes at the same time.

2.	Admin option will be added to choose the schedule method. This offers a fixed schedule as well as a calendar based schedule. So the date factor is to be considered. A calendar control will be added apart from the time frame.

