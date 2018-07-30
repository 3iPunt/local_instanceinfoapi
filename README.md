# Instance information API #

1. Enable web services authentication @ admin/settings.php?section=manageauths  
  
2. Create new web services user @ user/editadvanced.php?id=-1  
Eg. siteinfoconsumer  

3. Create new role @ roles/define.php
Eg.  
shortname = instanceinfoconsumer  
fullname = Instance Information Consumer  
archetype = auth user  
assignable context = system  
capabilities = Allow -> webservice/rest:use  

4. Assign new role to previous consumer user @ roles/assign.php?contextid=1  

5. If the built-in service is properly declared, now add user to the authorized users for the services @ admin/settings.php?section=externalservices > Built-in Services > the service row - Users column - Authorised users  

6. Create a token for the service (optionally user-service) @ admin/webservice/tokens.php?sesskey=pb4TWOvw2K&action=create  
Eg. 24a21bfd4211dcbac87df901215e2c1f  

7. Now its possible to communicate with Moodle from an external app using that token  


## License ##

2018 3iPunt Mitxel Moriana <mitxel@tresipunt.com>

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <http://www.gnu.org/licenses/>.
