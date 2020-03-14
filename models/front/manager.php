<?php
//CONNECT TO DATABASE (db)
class Manager
{
    protected $db;  
    public function __construct()
    {
      $this->dbConnect();
    }

    protected function dbConnect()
    {
      //connect to MySQL with PHP DATA OBJECTS (PDO) extension
      $this->db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
      $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
}