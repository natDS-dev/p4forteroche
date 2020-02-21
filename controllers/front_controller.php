<?php
require ('../models/front/posts_manager.php');
require ('../models/front/comments_manager.php');
require ('../models/front/manager.php');

// Get all posts datas from posts_manager.php and show all posts(chapters) in extract page (limited words) 
function showListPosts()
{
    $allPosts=getAllPosts();
   

    require ('../views/extracts_view.php');



}

// Get one post data + comments datas from posts_manager.php and show only the post(chapter) asked by the user with the linked comments  
function showOnePost()
{
    $onePost=getOnePost($_GET['id']);
    $comments=getComments($_GET['id']);
    require ('../views/chapters_view.php');
    
}


//IF PAGE ERROR
function showError()
{ 

    require_once ('../views/error_view.php');
    
}

//DEFAULT PAGE

function defaultPage()
{
    require_once ('../views/home_view.php');
}