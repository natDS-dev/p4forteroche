<!--CHAPTERS VIEW------
------------------->

<?= $title = "Le volume"; ?>
<?= $picturePage = "public/images/chap.png" ; ?>
                    <!--COM PERSO : variables à prévoir en + : 
                    chapterPicture/ chapterTitle / chapterNumber / authorName / commentName + commentSubject + commentContent -->


<!--?php ob_start(); ? -->

    <main class="main_container" id="pages_main_container">
        <!--PAGE MAIN BLOCK-->
        <section class="mainblock">
            <!--Dynamic picture => picture page -->  
            <img class="main_picture" id="dynamic_main_picture" src=<?= $picturePage ?> alt="profil d'homme dessiné" />
            <!--WEBSITE MAIN SUBTITLES -->
            <div class="main_subtitles">
                <h2 class="book_title" id="alaska_book">"Billet simple pour l'Alaska"</h2>
                <img class="goldpaint_separator" id="goldpaint_separator1" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
                <!--Dynamic title => page title-->
                <h3 class="dynamic_title" ><?= $title ?> </h3>
                <a class="anchor" id="anchor_to_bottom" href="#goldpaint_separator2">
                    <img class="arrow" id="arrow_bottom" src="public/images/paper_arrow1.png">
                </a>        
            </div>    
        </section>
    </main> 

    <!--SECTION CONTENT BLOCK - DYNAMIC CONTENT-->
    <section class="content_block">        
        <hgroup class="content_titles">
            <h2 class="page_title">CHAPITRE</h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3 class="page_info">Un rapide tour d'horizon</h3>
        </hgroup> 
                        
        <div class="content_text">
            <div class="content_extracts_chapters">
                <article>
                    <!--***DYNAMIC TITLE PICTURE AND INFO***-->
                                         <!---COM PERSO : penser "for each"--->
                    <img/>    
                    <h3>**BDD Variable titre chapitre + numéro chapitre**</h3>
                    <p>**BDD Variable contenu chapitre,**BDD Variable contenu chapitre,**BDD Variable contenu chapitre,
                    **BDD Variable contenu chapitre,**BDD Variable contenu chapitre,**BDD Variable contenu chapitre,
                    </p>                    
                </article>
                <p>
                    <a href="">Retour</a> <!--COM PERSO : LIEN VERS PAGE LISTE EXTRAITS -->
                </p>             
            </div>

            <div class="comments_block">
                <div class="posted_comments">
                    <h4 id="posted_pseudo">Récupération pseudo BDD  </h4>
                    <h4 id="posted_date">Récupération date</h4> 
                    <h5 id="posted_subject">Récupération sujet message BDD</h5>
                    <p id="posted_message">Récupération message BDD</p>
                </div>
               

                <form id="comments_form" action="" method="post"> <!--COM PERSO : remplir action -->
                                        
                    <div class="place_form">
                        <label for="name">Pseudo :</label>
                        <input type="text" id="pseudo" name="user_pseudo">
                    </div>
                    <div class="place_form">
                        <label for="subject">Sujet :</label>
                        <input type="text" id="subject" name="user_subject">
                    </div>
                    <div class="place_form" >
                        <label for="message">Message :</label>
                        <textarea id="comment" name="user_comment"></textarea>
                    </div>
                    <div class="button_form">
                        <button type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

  

<!--?php $content = ob_get_clean(); ?-->