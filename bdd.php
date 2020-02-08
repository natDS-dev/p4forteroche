<?php
// Connexion à la BDD
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
//Gestion des erreurs
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}

//test récupération infos base de données  
$req = $bdd->query("SELECT number_chapter,title_chapter, extract_chapter FROM chapters ORDER BY number_chapter");

while ($donnees = $req->fetch())
{

   echo "<p>" . $donnees["number_chapter"] . " - " . $donnees["title_chapter"]. " : " .  $donnees["extract_chapter"]. "<p>";
}

$req->closeCursor();
?>