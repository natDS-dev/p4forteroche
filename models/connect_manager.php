<?php
//REQUIRE manager.php TO CONNECT TO DATABASE (db)
require_once("models/manager.php");

//ADMIN LOGIN
class ConnectManager extends Manager
{
    //FRONT
    //to db select - get admin infos login   
    public function adminInfosConnect($login)
    {
        $req = $this->db->prepare('SELECT id, login, password FROM admin WHERE login = :login');
        $req->execute(array('login'=>$login));
        $adminInfos = $req->fetch();
        return $adminInfos;
    }
}



    