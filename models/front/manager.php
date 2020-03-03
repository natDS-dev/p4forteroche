<?php
//CONNECT TO DATABASE (db)

function dbConnect()
{
  $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  return $db;
}

/*POO
class Manager
{
    protected function dbConnect
    {
      //connect to MySQL with PHP DATA OBJECTS (PDO) extension
      $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $db;
    }
}










