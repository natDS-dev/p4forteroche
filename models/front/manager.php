<?php
//CONNECT TO DATABASE (db)

function dbConnect()
{

  try
  { 
    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
  }
  //MANAGE ERRORS
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
    require ('../views/error_view.php');
  }
  

}
//POO class Manager
// méthodes : 











