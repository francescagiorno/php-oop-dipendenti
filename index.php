<?php
   require_once('dipendenti.php');

   try {
      $impiegato_1_salariato = new ImpiegatoSalariato('Francesca','Giorno','FNC98R60L501B',1,1,85); 
      echo
      $impiegato_1_salariato->to_string() .
      "<br>" .
      "Compenso:" .
      $impiegato_1_salariato->calcola_compenso() .
      "€" .
      "<br><br>";
   } catch (Exception $e) {
      echo 'Attenzione: ' . $e->getMessage() . "<br>";
   }

   echo
    $impiegato_1_commissione->to_string() . "<br> . <br>";

   echo
   $impiegato_1_AOre->to_string() .
   "<br>" .
   "Compenso:" .
   $impiegato_1_AOre->calcola_compenso() .
   "€";
?>
