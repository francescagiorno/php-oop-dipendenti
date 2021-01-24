<?php

class Persona{
   public $nome;
   public $cognome;
   public $codice_fiscale;

   public function __construct($nome, $cognome, $codice_fiscale){
      $this->nome = $nome;
      $this->cognome = $cognome;
      $this->codice_fiscale = $codice_fiscale;
   }
}

class Impiegato extends Persona{
   public $codice_impiegato;
   protected $compenso;

   public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso){
      parent::__construct($nome, $cognome, $codice_fiscale);
      $this->codice_impiegato = $codice_impiegato;
      $this->compenso = $compenso;
   }

   public function to_string(){
      return "Nome: " . $this->nome . "<br>" . " Cognome: " . $this->cognome . "<br>" . "Codice Fiscale: " .  $this->codice_fiscale . "<br>" . "Identificativo: " . $this->codice_impiegato;
   }

   public function calcola_compenso(){
      return $this->compenso;
   }
}

class ImpiegatoSalariato extends Impiegato{

   public $giorni_lavorati;

   public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $giorni_lavorati, $compenso_giornaliero){
      if ($giorni_lavorati < 1){
         throw new Exception("Deve essere presente almeno un giorno lavorato");
      }
      parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso_giornaliero);
      $this->giorni_lavorati = $giorni_lavorati;
   }

   public function calcola_compenso(){
      return $this->giorni_lavorati * $this->compenso;
   }

}

class ImpiegatoAOre extends Impiegato{

   public $ore_lavorate;

   public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $ore_lavorate, $compenso_orario){
      parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso_orario);
      $this->ore_lavorate = $ore_lavorate;
      $this->compenso_orario = $compenso_orario;
   }

   public function calcola_compenso(){
      return $this->ore_lavorate * $this->compenso_orario;
   }

}

trait Progetto{

   public $nome_progetto;
   public $commissione;
}

class ImpiegatoSuCommissione extends Impiegato{
   use Progetto;

   public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $nome_progetto, $commissione){
      parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $commissione );
      $this->nome_progetto = $nome_progetto;
      $this->commissione = $commissione;
   }

   public function calcola_compenso(){
      echo $this->commissione;
   }

   public function to_string(){
      echo parent::to_string();
      echo "<br>" . "Nome progetto: " . $this->nome_progetto;
      echo "<br>" . "Compenso: " . $this->commissione . "€";
   }


}


$impiegato_1_commissione = new ImpiegatoSuCommissione('Tizio','Tizi','TZZTZZZ01E01E000E',2,"Boolean Project",2000);
$impiegato_1_AOre = new ImpiegatoAOre('Caio','Decai','CAIDCA01E01E000E',3,100,12)
?>
