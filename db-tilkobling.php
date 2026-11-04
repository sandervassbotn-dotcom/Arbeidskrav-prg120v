<?php  /* db-tilkobling */
/*
/*  Programmet foretar tilkobling til database-server og valg av database
*/
/*getenv = "get environment" (hent fra omgivelsene).
Henter innstillinger som ligger på serveren (Dokploy) i stedet for i koden.
Da trenger vi ikke ha passord i koden.
*/

$host = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

 $db=mysqli_connect($host,$username,$password,$database) or die ("ikke kontakt med database-server");
    /* tilkobling til database-serveren utført */
 


