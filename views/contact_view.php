<!--CONTACT VIEW------
------------------->

<?= $title = ""; ?>
<?= $picturePage = "" ; ?>

!--CHAPTERS VIEW------
------------------->

<?= $title = "Le lien"; ?>
<?= $picturePage = "public/images/contact.png" ; ?>
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
            <h2 class="page_title">CONTACT</h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3 class="page_info">Une question ou suggestion ?</h3>
        </hgroup> 
                        
        <div class="content_text">
            <div class="contact_block">
                <form id="contact_form" action="" method="post"> <!--COM PERSO : remplir action -->
                                        
                    <div class="place_form">
                        <label for="name">Nom :</label>
                        <input type="text" id="surname" name="mail_user_surname">
                    </div>
                    <div class="place_form">
                        <label for="subject">Sujet :</label>
                        <input type="text" id="mail_subject" name="mail_user_subject">
                    </div>
                    <div class="place_form" >
                        <label for="message">Message :</label>
                        <textarea id="mail_content" name="mail_user_content"></textarea>
                    </div>
                    <div class="button_form">
                        <button type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

  
<!--?php $content = ob_get_clean(); ?-->