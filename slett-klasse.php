<?php  /* slett-klasse */
/*
/*  Programmet lager et skjema for å velge et poststed som skal slettes  
/*  Programmet sletter det valgte poststedet
*/
?> 


<h3>Slett klasser</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" >
  Klasse <input type="text" id="slettKlasseSkjema" name="slettKlasseSkjema" required /> <br/>
  <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettKlasseKnapp"]))
    {	
      $slettKlasseSkjema=$_POST ["slettKlasseSkjema"];

          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM klasse WHERE klassekode='$slettKlasseSkjema';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader==0)  /* poststedet er ikke registrert */
            {
              print ("Klassen finnes ikke");
            }
          else
            {	  
              $sqlSetning="DELETE FROM klasse WHERE klassekode='$slettKlasseSkjema';";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
                /* SQL-setning sendt til database-serveren */
		
              print ("F&oslash;lgende klasse er n&aring; slettet: $slettKlasseSkjema  <br />");
            }

    }
?> 