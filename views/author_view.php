<!--AUTHOR VIEW------
------------------->
<?= $title = "L'auteur "; ?>
<?= $picturePage = "public/images/author.png" ; ?>

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
                <h3 class="dynamic_title" ><?= $title ?></h3>
                <a class="anchor" id="anchor_to_bottom" href="#goldpaint_separator2">
                    <img class="arrow" id="arrow_bottom" src="public/images/paper_arrow1.png">
                </a>        
            </div>    
        </section>
    </main> 

    <!--SECTION CONTENT BLOCK - STATIC(but could be dynamic)-->
    <section class="content_block">       
        <hgroup class="content_titles">
            <h2 class="page_title">Présentation</h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3 class="page_info">Juste un homme de "l'être" aux vers solitaires...</h3>
        </hgroup> 
                <!------(//OPTION// : possibility of a dynamic content => Jean could have his own presentation text)---->
                
        <div class="content_text">
            <p>Entre ces verres à pied, je perds le verbe, je perds pied.Les mots denses, et dansent, se mélangent ,
            tournoient à la Pied-tragalla... j'ai beau avoir pas-pied et crayon, les mots ne coulent sur la feuille, ils
            ont jeté l'encre, à mes pieds.Entre ces verres à pied, pas de vers ni de pied, les mots sont d'air et non d'eau,
            ils n'ont le pied marin, mais des ailes pour voler très haut....</p>
        </div>
    <section>

<?=$content = ob_get_clean(); ?>