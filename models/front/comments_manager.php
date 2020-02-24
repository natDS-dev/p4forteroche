<?php

   //Front

    //REQUIRE manager.php TO CONNECT TO DATABASE (db)
    require_once ("models/front/manager.php");
    //req from db (select) : require all post's associated comments from db by id  
    function getComments($chapterId)
    {
        $db=dbConnect();
        $comments = $db->prepare('SELECT id,title_comment,author_comment,content_comment,chapters_id,DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\')
        AS date_comment_fr FROM comments  WHERE chapters_id = ? ORDER BY date_comment_fr DESC');
        $comments->execute(array($chapterId));
    


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