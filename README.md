# TS3 PHP UserInterface

> # Warning, this Project is more than deprecated

### Version 0.1.1

This PHP UserInterface based on the "TS3 PHP Framework" from [Planet TeamSpeak]


### Discription

This is a little side Project and I will work on whenever I have time for it. 
In this version you are able to:
  - Send Privat Message to People
  - Poke User
  - Kick User
  - Move User


### plans for the future
some features I want to add:
 - Login
 - User Menagment
 - Log view
 - Seperated Taps for different functions
 - Webchat for Communication between Clients and Web


### Your Work
#### If you would use this UserInterface

Download the "[TS3 PHP Framework from Github]" and change the "libaries" folder to "inc" and add the [conn.php]

You also need to download [Bootstrap], because the design is based on Bootstrap 3.3.7 and some personal changes

In the [conn.php] you need to change some values:
 ```php
 <?php
  $Vserver = TeamSpeak3::factory('serverquery://username:password@ip:queryport/?server_port=port&nickname=name&no_query_clients=1');
 ?>
 ```
 If you use the TSViewer it is recommend to use the variable "no_query_clients" and set it to "1"


[Planet TeamSpeak]: <https://www.planetteamspeak.com/>
[conn.php]: <https://github.com/Spirit-act/ts3phpui/blob/master/inc/conn.php>
[TS3 PHP Framework from Github]: <https://github.com/planetteamspeak/ts3phpframework>
[Bootstrap]: <https://getbootstrap.com>
