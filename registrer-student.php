<head>
  <meta charset="UTF-8">
</head>

<?php  /* registrer-student */
/*
   Programmet lager et html-skjema for å registrere en student
   Programmet registrerer data (brukernavn, fornavn, etternavn og klassekode) i databasen
*/
?>

<h3>Registrer student</h3>

<form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">
  Brukernavn <input type="text" id="brukernavn" name="brukernavn" required> <br/>
  Fornavn <input type="text" id="fornavn" name="fornavn" required> <br/>
  Etternavn <input type="text" id="etternavn" name="etternavn" required> <br/>
  Klasse
  <select name="klassekode" id="klassekode" required>
    <option value="">velg klasse</option>
    <?php
      include("db-tilkobling.php");  /* tilkobling til database-serveren */

      $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat);

      for ($r=1;$r<=$antallRader;$r++)
        {
          $rad=mysqli_fetch_array($sqlResultat);
          $valgKode=$rad["klassekode"];
          $valgNavn=$rad["klassenavn"];

          print("<option value='$valgKode'>$valgKode $valgNavn</option>");
        }
    ?>
  </select> <br/>
  <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
  if (isset($_POST["registrerStudentKnapp"]))
    {
      $brukernavn=$_POST["brukernavn"];
      $fornavn=$_POST["fornavn"];
      $etternavn=$_POST["etternavn"];
      $klassekode=$_POST["klassekode"];

      if ($brukernavn=="" || $fornavn=="" || $etternavn=="" || $klassekode=="" || strpos ($brukernavn, " ") !== false)
        {
          print ("brukernavnet kan ikke ha mellomrom");
        }
      else
        {
          $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat);

          if ($antallRader!=0)  /* studenten er registrert fra før */
            {
              print ("Studenten er registrert fra f&oslash;r");
            }
          else
            {
              $sqlSetning="INSERT INTO student VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");

              print ("F&oslash;lgende student er n&aring; registrert: $brukernavn $fornavn $etternavn $klassekode");
            }
        }
    }
?>