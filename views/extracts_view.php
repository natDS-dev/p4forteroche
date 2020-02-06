<!--EXTRACTS VIEW------
------------------->
<?= $title = "Les segments"; ?>
<?= $picturePage = "public/images/postcards.png" ; ?>
                <!--COM PERSO : variables à réutiliser même que chapters:  chapterTitle / chapterNumber / chapterPicture --->


<?= ob_start(); ?>
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

    <!--SECTION CONTENT BLOCK - DYNAMIC -->
    <section class="content_block">        
        <hgroup class="content_titles">
            <h2 class="page_title">Extraits</h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3 class="page_info">Un rapide tour d'horizon</h3>
        </hgroup> 
                        
        <div class="content_text">
            <div class="content_extracts_chapters">
                <article>
                    <!--***DYNAMIC TITLE PICTURE AND INFO***-->
                                         <!---COM PERSO : penser "for each"--->
                    <img/>    
                    <h3>**Variable titre chapitre + numéro chapitre**</h3>
                    <p>Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte
                    aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique
                    datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney
                    College, en Virginie, s'est intéressé à un des mots latins les plus obscurs, consectetur,
                    extrait d'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la
                    littérature classique
                    </p>                    
                </article>
                <article>
                    <img/>    
                    <h3>**Variable titre chapitre + numéro chapitre**</h3>
                    <p>Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte
                    aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique
                    datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney
                    College, en Virginie, s'est intéressé à un des mots latins les plus obscurs, consectetur,
                    extrait d'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la
                    littérature classique
                    </p>
                </article>
                <article>
                    <img/>    
                    <h3>**Variable titre chapitre + numéro chapitre**</h3>
                    <p>Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte
                    aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique
                    datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney
                    College, en Virginie, s'est intéressé à un des mots latins les plus obscurs, consectetur,
                    extrait d'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la
                    littérature classique
                    </p>
                </article>
            </div>
        </div>
    </section>

  
<?=$content = ob_get_clean(); ?>
  
