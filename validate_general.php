<?php  

/**
*Vérifie l'existence du contenu d'une chaine de caractères
* @var $str string à valider
* @return array | void
*/
function validateRequired($str)
{
  if (empty($str)) {
    return "Element obligatoire non facultatif";
  }
}
