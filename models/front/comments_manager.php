<?php

   //Front

    //REQUIRE manager.php TO CONNECT TO DATABASE (db)
    require_once ("models/front/manager.php");
    //req from db (select) : require all post's associated comments from db by id  
    function getComments($idpost)
    {
        $db=dbConnect();
        $comments = $db->prepare('SELECT * FROM comments ORDER BY date_comment DESC');
        $comments->execute(array($idPost));
    


        return $comments;
    }

    //to db (insert)
    function saveComments()
    {
        $db=dbConnect();
    }

    //to db (insert)
    function reportComments()
    {
        $db=dbConnect();

    }






//POO CLASS ComManager