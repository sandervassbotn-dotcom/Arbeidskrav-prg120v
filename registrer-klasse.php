php
<?php  /* registrer-klasse */
/*
   Programmet lager et html-skjema for å registrere en klasse
   Programmet registrerer data (klassekode, klassenavn og studiumkode) i databasen
*/
?>

<h3>Registrer klasse</h3>

<form method="post" action="" id="registrerKlasseSkjema" name="registrerKlasseSkjema">
  Klassekode <input type="text" id="klassekode" name="klassekode" maxlength="5" required /> <br/>
  Klassenavn <input type="text" id="klassenavn" name="klassenavn" maxlength="50" required /> <br/>
  Studiumkode <input type="text" id="studiumkode" name="studiumkode" maxlength="50" required /> <br/>
  <input type="submit" value="Registrer klasse" id="registrerKlasseKnapp" name="registrerKlasseKnapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>