<!--CHAPTERS VIEW------
------------------->

<?= $title = "Le volume"; ?>

                    <!--COM PERSO : variables à prévoir en + : 
                    chapterPicture/ chapterTitle / chapterNumber / authorName / commentName + commentSubject + commentContent -->


<?php ob_start(); ?>

    <main class="main_container" id="pages_main_container">
        <!--PAGE MAIN BLOCK-->
        <section class="mainblock">
            <!--Dynamic picture => picture page -->  
            <img class="main_picture" id="dynamic_main_picture" src="public/images/chap.png" alt="profil d'homme dessiné" />
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
            <h2 class="page_title">Découverte par chapitre</h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3 class="page_info">Bonne lecture !</h3>
        </hgroup> 
                        
        <div class="content_text">
            <div class="content_extracts_chapters">
               
                <article>
                    <img  src=" <?= ($onePost['picture_chapter']) ?> "/>    
                    <h3><?= htmlspecialchars($onePost['number_chapter']) ?>. <?= htmlspecialchars($onePost['title_chapter']) ; ?></h3>
                    <p class="date_chapter"><?=  nl2br(htmlspecialchars($onePost['date_chapter'])); ?></p>
                    <p class="text_chapter"><?=  nl2br(htmlspecialchars($onePost['content_chapter'])) ?></p>
                    <p>
                        <a href="index.php?action=showListPosts">Retour</a>
                    </p>   
                </article>

                
                
            </div>

            <div class="comments_block">
                <form id="comments_form" action="" method="post"> <!--COM PERSO : remplir action -->
                    <h3>A vous de prendre votre plume !</h3>
                                        
                    <div class="place_form">
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" id="pseudo" name="user_pseudo">
                    </div>
                    <div class="place_form">
                        <label for="subject">Sujet :</label>
                        <input type="text" id="subject" name="user_subject">
                    </div>
                    <div class="place_form" >
                        <label for="comment">Message :</label>
                        <textarea id="comment" name="user_comment"></textarea>
                    </div>
                    <div class="button_form">
                        <button type="submit">Envoyer</button>
                    </div>
                </form>

                <div class="posted_comments">
                    <h3>Les derniers messages</h3>
                    <h4 id="posted_pseudo">Récupération pseudo BDD  </h4>
                    <h4 id="posted_date">Récupération date</h4> 
                    <h5 id="posted_subject">Récupération sujet message BDD</h5>
                    <p id="posted_message">Récupération message BDD</p>
                    <div class="button_form">
                        <button type="submit">Signaler</button>
                    </div>
                </div>
               

                
            </div>
        </div>
    </section>

  

<?php $content = ob_get_clean(); ?>
<?php require_once("main_template.php"); ?>
