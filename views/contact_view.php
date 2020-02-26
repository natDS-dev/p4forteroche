<!--CONTACT VIEW------
------------------->

<?php $title = "Le lien"; ?>

                    <!--COM PERSO : variables à prévoir en + : 
                    chapterPicture/ chapterTitle / chapterNumber / authorName / commentName + commentSubject + commentContent -->


<?php ob_start(); ?>
    <main class="main_container" id="pages_main_container">
        <!--PAGE MAIN BLOCK-->
        <section class="mainblock">
            <!--Dynamic picture => picture page -->  
            <img class="main_picture" id="dynamic_main_picture" src="public/images/contact.png" alt="profil d'homme dessiné" />
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
            <h3 class="page_info">Une question ou suggestion ? Prenez votre plume !</h3>
        </hgroup> 
                        
        <div class="content_text">
            <div class="contact_block">
                <form id="contact_form" action="" method="post"> <!--COM PERSO : remplir action -->
                                        
                    <div class="place_form">
                        <label for="contact_surname">Nom* :</label>
                        <input type="text" id="contact_surname" name="contact_user_surname" required>
                    </div>
                    <div class="place_form">
                        <label for="contact_name">Prénom* :</label>
                        <input type="text" id="contact_name" name="contact_user_name" required>
                    </div>
                    <div class="place_form">
                        <label for="contact_mail">Email* :</label>
                        <input type="email" id="contact_mail" name="contact_user_mail" required>
                    </div>
                    <div class="place_form">
                        <label for="contact_subject">Sujet :</label>
                        <input type="text" id="contact__subject" name="contact_user_subject">
                    </div>
                    <div class="place_form" >
                        <label for="contact_content">Message* :</label>
                        <textarea id="contact_content" name="contact_user_content" required></textarea>
                    </div>
                    <div class="button_form">
                        <button type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

  
<?php $content = ob_get_clean(); ?>
<?php require_once("main_template.php"); ?>