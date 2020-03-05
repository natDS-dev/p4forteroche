<?php
//ADMIN HOME - QUICK VIEW
//Quick values : number of published & draft posts  , unread mails, reported comments 
function adminHome()
{   
    $data=adminHomeValues();
    require_once('views/admin_home_view.php');
}
//Disconnect from admin page
function adminDisconnect()
{
    unset($_SESSION['id']);
    unset($_SESSION['login']);
    header('Location: index.php?action=showConnect');
}


//ADMIN POST
//Post by status
function adminPostsList()
{
    $publishedPosts = getAdminPosts("published");
    $draftPosts = getAdminPosts("draft");
    require('views/admin_post_view.php');
}
//Delete a post
function adminDeletePost($id)
{
    adminErasePost($id);
    header('Location: index.php?action=adminPostsList');
}
//Valid & publish a draft post
function adminValidPost($id)
{
    adminPublishPost($id);
    header('Location: index.php?action=adminPostsList');
}
//Change status of a published post , published to draft
function adminToDraftPost($id)//!!!!!!!!!!!!!!!!!!!!!!!!!!!pb = action ok mais page blanche
{
    adminDraftPost($id);
    header('Location: index.php?action=adminPostsList');
}

//ADMIN COMMENTS
//comment list by status
function adminCommentsList()
{   
   $postedComments = getAdminComments("posted");
   $reportedComments = getAdminComments("reported");
   $validatedComments = getAdminComments("validated");
   require('views/admin_comment_view.php');
}

//Delete comment
function adminDeleteComment($id)
{
    adminEraseComment($id);
    header('Location: index.php?action=adminCommentsList');
    
}
//Validate & publish comment
function adminValidComment($id)
{
    adminConfirmComment($id);
    header('Location: index.php?action=adminCommentsList');
}

//ADMIN CONTACT 
//Mail list 
function adminMail()
{
   $contactMails=getMails();
   require ('views/admin_mail_view.php');
}

//Change status mail (unread to read)
function adminReadMail($id)
{
    adminUpdateMail($id);
    header('Location: index.php?action=adminMail');
}


//ADMIN CREATE POST
//Create a post with right number chapter value
function adminCreatePost()
{
    $numbChapter = adminAllNumbChapter();
    $unavailableNumChap=[];
    foreach($numbChapter as $key=>$value){
        $unavailableNumChap[]=(int)$value['number_chapter'];
    }
    $maxChapter = end($unavailableNumChap)+20;
    require('views/admin_createpost_view.php');
}

//ERROR ADMIN PAGE
function adminShowError()
{
    require_once('views/admin_error_view.php');
}



