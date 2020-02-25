<?php
//CONNECT TO DATABASE (db)

function dbConnect()
{

  try
  { 
    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  //MANAGE ERRORS
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
    require ('views/error_view.php');
  }
  
  return $db;
}
//POO class Manager
// méthodes : 











