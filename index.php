<?php
// Tirage du loto
define("MAXI", 7);
$vecteurLoto=array();

/**
* procedure nettoyerGrille
* Initialise le vecteur à 0
* @Param : Array $vecteurLoto
*/
function nettoyerGrille(& $vecteurLoto ){
	for ($i=0 ; $i <= MAXI -1; $i++){
		$vecteurLoto[$i] = 0;
	} // FINPOUR
}

/**
* procedure remplirGrille
* Permet de remplir toute les grilles par des numéros au hasard
* @Param : Array $vecteurLoto
*/
function remplirGrille(& $vecteurLoto){
	for($i=0 ; $i<= MAXI -1; $i++){
		do{
			$alea = mt_rand(1,49);
		} while(nombreExiste($alea,$vecteurLoto));
		$vecteurLoto[$i]=$alea;
	}
}

/**
* fonction nombreExiste
* Permet de vérifier si il n'y a pas 2 fois le même nombre dans le tirage
* @Param : Entier $x , Array $vecteur
* @Return : Booléen $existDeja
*/
function nombreExiste($x , $vecteur){
	$i=1;
	$existDeja = false;
	do{
		if ($x == $vecteur[$i]){
			$existDeja = true;
		}
		$i++;
	} while((!$existDeja) && ($i< MAXI-1));
	return $existDeja;
}

/**
* fonction afficherLoto
* Permet d'afficher le tirage du loto
* @Param : Array $vecteurLoto
*/
function afficherLoto(& $vecteurLoto)
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<link rel="icon" href="./images/loto.bmp" />
<title>Easy Loto</title>
<link rel="stylesheet" type="text/css" href="./css/loto.css" />
</head>
<body>
<h1>Easy Loto</h1>
<div id="global">
  <form method="post" action="index.php" name="tire" id="tire">
    <ul id="boules">
	<?php
	for ($i=0 ; $i<= MAXI -1; $i++){
      echo" <li><img src='images/ico-boule.png' alt=''/>".$vecteurLoto[$i]."</li>";
      // <li><img src='images/ico-boule.png' alt=''/> 21 </li>
      // <li><img src='images/ico-boule.png' alt=''/> 13 </li>
      // <li><img src='images/ico-boule.png' alt=''/> 26 </li>
      // <li><img src='images/ico-boule.png' alt=''/> 8 </li>
      // <li><img src='images/ico-boule.png' alt=''/> 45 </li>
      // <li><img src='images/ico-boule.png' alt=''/> 48 </li>
      // <li>
	  }
	  ?>
      <input type="submit" name="send" value="Tirage du Loto virtuel" />
      </li>
    </ul>
    <!-- FIN boules -->
    <div class="clear"></div>
    <div class="bottom"> SI6 </div>
  </form>
</div>
</body>
</html>
<?php
}
echo nettoyerGrille($vecteurLoto);
echo remplirGrille($vecteurLoto);
echo afficherLoto($vecteurLoto);
?>