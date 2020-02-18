<?php

class ComManager{

    //Back
        
    //req from db (select)
    function listComments()
    {


        return $backAdminTotalComments;
    }

    //delete in db (delete)
    function deleteCommments()
    {

    }


    //to db (insert)
    function validComments()
    {

    }


    //Front

    
    //req from db (select)   //COM PERSO : ceci étant similaire à listComments() est-ce utile de le faire 2 fois ? 
    function getComments()
    {


        return $frontTotalComments
    }

    //to db (insert)
    function saveComments()
    {

    }

    //to db (insert)
    function reportComments()
    {

    }




}