<?php

/*
 */
class Schtroumpf
{
  public $color = "Bleu"; //une propriété public est accessible en dehors du contexte de l'objet
  public $hat = "Bonnet neuf blanc";
  private $sexualOrientation = "Heureux";

  public function __construct($craft, $passion)
  {
    $this->craft = $craft;
    $this->passion = $passion;
    echo "Moi Schtroumpf " . $craft . ", je vis<br>";
    echo "Ma passion c'est le ". $passion . "<br>";
  }

  public function sayMySexualOrientation()
  {
    return $this->sexualOrientation;
  }

  public function __destruct()
  {
    echo "Moi Schtroumpf " . $this->craft . "<br>";
    echo "Je me meurs...<br>";
    echo "PS : Schtroumpfette t'es bonne, Wesh<br>";
  }
  private function repair($hat)
  {

  }
}
