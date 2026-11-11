<head>
  <meta charset="UTF-8">
</head>

<?php  /* slett-student */
/*
/*  Programmet lager et skjema for å velge en student som skal slettes  
/*  Programmet sletter den valgte studenten
*/
?> 

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" >
  Brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
  <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettStudentKnapp"]))
    {	
      $slettStudentKnapp=$_POST ["brukernavn"];

          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM student WHERE brukernavn='$slettStudentKnapp';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader==0)  /* studenten er ikke registrert */
            {
              print ("Studenten finnes ikke");
            }
          else
            {	  
              $sqlSetning="DELETE FROM student WHERE brukernavn='$slettStudentKnapp';";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette data i databasen");
                /* SQL-setning sendt til database-serveren */
		
              print ("Følgende student er nå slettet: $slettStudentKnapp  <br />");
            }

    }
?> 