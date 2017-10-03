# Admin Panel - User Management using CodeIgniter
#####Admin Panel - User Management Demo using CodeIgniter + AdminLTE Bootstrap Theme

The code is uploaded to demonstrate the simple role based Admin Panel application using CodeIgniter(MVC Framework)

## Installation

Download the code from repository.
Unzip the zip file.

Open browser; goto [localhost/phpmyadmin](http://localhost/phpmyadmin).

Create a database with name "cias" and import the file "cias.sql" in that database.

Copy the remaining code into your root directory:

for example, for windows

**WAMP : c:/wamp/www/cias**

OR

**XAMPP : c:/xampp/htdocs/cias**

Open browser; goto [localhost/cias](http://localhost/cias) and press enter:

The login screen will appear.

To login, I am going to provide the user-email ids and password below.

**System Administrator Account :**

email : admin@codeinsect.com

password : codeinsect

**Manager Account :**

email :  manager@codeinsect.com

password : codeinsect

**Employee Account :**

email : employee@codeinsect.com

password : codeinsect

Once you logged in with System Administrator account, you can create user or edit previous user if you want.

**Youtube Links :**

[CodeIgniter Admin Panel Demo](https://youtu.be/RFRXUd8LHUM) : This video contain the demo of CodeIgniter Admin Panel.

[How to setup CodeIgniter Admin Panel](https://youtu.be/tU1PbcRj7ww) : This video contain the procedure of setting up CodeIgniter Admin Panel.


**ISSUE # 1 : After login "loginMe" controller is not found :**

Lot of people raising this issue, I resolved it 4-5 times for every user. People are not searching for closed issues. Thats why I am going to put this here.

How to get over this issue?

1) enable mod_rewrite.dll (or mod_rewrite.so) by removing leading # in httpd.conf.
2) After that, follow this solution https://stackoverflow.com/questions/24472349/htaccess-doesnt-work-on-xampp-windows-7

**ISSUE # 2 : Call to undefined function password_verify() :**

Solution is here : [Call to undefined function password_verify()](https://github.com/kishor10d/Admin-Panel-User-Management-using-CodeIgniter/issues/1)
