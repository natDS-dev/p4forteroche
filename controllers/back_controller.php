<?php
require('models/front/posts_manager.php');
require('models/front/comments_manager.php');
require('models/front/contact_manager.php');
require('models/front/connect_manager.php');

//***********BACK********
//ADMIN HOME - QUICK VIEW
//Quick values : number of published & draft posts  , unread mails, reported comments 
function showAdminHome()
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
function adminLPostsList()
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
function adminToDraftPost($id)
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

function adminDeleteComment($id)
{
    adminEraseComment($id);
    header('Location: index.php?action=adminCommentsList');
    
}

function adminValidComment($id)
{
    adminConfirmComment($id);
    header('Location: index.php?action=adminCommentsList');
}



//ADMIN CONTACT 
//Mail list 
function showListMails()
{
   $contactMails=getMails();
   require ('views/admin_mail_view.php');
}

function adminStatusMail($id)
{
    adminUpdateMail($mailId);
    header('Location: index.php?action=adminMail');
}
//ERROR ADMIN PAGE
function showErrorAdmin()
{
    require_once('views/admin_error_view.php');
}


