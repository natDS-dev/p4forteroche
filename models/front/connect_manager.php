<?php
    //REQUIRE manager.php TO CONNECT TO DATABASE (db)
    require_once ("models/front/manager.php");

    //to db select - get user pseudo and password  
    function adminConnect($login)
    {
        $db=dbConnect();
        $req=$db->prepare('SELECT id, login, password FROM admin WHERE login = :login');
        $req->execute(array('login'=>$login));
        $adminInfos = $req->fetch();
        
        return $adminInfos;
    }


    