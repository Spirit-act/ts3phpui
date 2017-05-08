# TS3 PHP UserInterface


### Version 0.1.1

This PHP UserInterface based on the "TS3 PHP Framework" from [Planet TeamSpeak]


### Discription

This is a little side Project and I will work on it whenever I have time for it. 
In this version you can do:
  - Send Privat Message to People
  - Poke User
  - Kick User
  - Move User


### plans for the future
I would add something:
 - Login
 - User Menagment
 - Log view
 - Seperated Taps for different functions


In the [conn.php] you need to change some values:
 ```php
 <?php
  $Vserver = TeamSpeak3::factory('serverquery://username:password@ip:queryport/?server_port=port&nickname=name&no_query_clients=1');
 ?>
 ```
 If you use the TSViewer it is recommend to use the variable "no_query_clients" and set it to "1"


[Planet TeamSpeak]: <https://www.planetteamspeak.com/>
[conn.php]: <https://github.com/Spirit-act/ts3phpui/blob/master/inc/conn.php>
