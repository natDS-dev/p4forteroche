<?php

//REQUIRE manager.php TO CONNECT TO DATABASE (db)
require_once ("models/front/manager.php");

//GET ALL CHAPTERS FROM DATABASE TO HAVE EXTRACTS

//POO : class PostManager
   
    //req to db(select) - gets chapter's list in order to produce the extracts (limited string in the controller)
    // requête à la db -obtenir la liste des chapitres avec contenu pour construire les extraits (limite de mots dans le controller) 
    function getAllPosts()
    {
        $db = dbConnect();
        $req = $db->query('SELECT * FROM chapters ORDER BY number_chapter ');
        $allPosts = $req->fetchAll();
        $req->closeCursor();
         
        return $allPosts;
    }

    //req to db(select) - gets the corresponding post/chapter by clicking on an extract
    //requête à la db - obtenir le bon chapitre en cliquant sur un extrait  
    function getOnePost($idPost)
    {
        $db=dbConnect();
        $req = $db->prepare('SELECT * FROM chapters WHERE id = ?');
        $req->execute(array($idPost));
        $onePost = $req->fetch();

       

        return $onePost;
    }


  
    

   
    




   
        