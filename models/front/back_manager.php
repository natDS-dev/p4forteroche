<?php
   

//ADMIN CREATE POST***

// to db (insert) - Gets the form's content from the create post mode(tinymce)
// insertion dans la db - récupérer le contenu écrit par Jean dans tinymce
function getContentCreatePost(){

}


//to db (insert) - in create post mode : after clicking on "publier" or "mettre en attente", saves automatically the new post created by Jean  in the right category, draft or published  
// insertion dans a db - le contenu écrit par jean et sauvegarder automatiquement dans le bon champs selon s'il clique sur "publier" ou "mettre en attente/brouillon"
function saveContentCreatePost (){


}


//ADMIN ALL PUBLICATIONS - PUBLISHED OR DRAFT POST****
//ON PUBLISHED POSTS (concernant les posts publiés)

//from db ( select) - Edit a published post in tinymce (édite un post publié dans tinymce) =>récupère le contenu dans la db et envoit au controller qui réaffichera le contenu dans tinymce 
function editPost(){


  
    return $backEditPost;
}

//from db (select) and  (insert)-Put a published post in draft (mettre un post publié dans les brouillons) , récupère la bonne ligne de la table chapters dans la db et la renvoit dans la table drafts (brouillon)  => changement de champs
function postToDraft(){

    
    
    return $BackPostTodraft;
}

function deletePost(){

}


//ON DRAFT POSTS(concernant les posts brouillons/mis en attente)

//from db ( select) - Edit a draft post in tinymce (édite un brouillon dans tinymce) =>récupère le contenu dans la db et envoit au controller qui réaffichera le contenu dans tinymce 
function editDraft(){


  
  
    return $backEditDraft;
}


function publishDraft(){



}


function deleteDraft(){

}



//COMMENTS
        
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
