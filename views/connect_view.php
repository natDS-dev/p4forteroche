<!--CONNECT VIEW-->
<?php $title = "Accès administrateur" ?>

<?php ob_start(); ?>
    <main class="main_container" id="pages_main_container">
        <!--PAGE MAIN BLOCK-->
        <section class="mainblock">
            <!--Dynamic picture => picture page -->  
            <img class="main_picture" id="dynamic_main_picture" src="public/images/connect_admin.png" alt="Livres avec des clefs" />
            <!--WEBSITE MAIN SUBTITLES -->
            <div class="main_subtitles">
                <h2 class="book_title" id="alaska_book">"Billet simple pour l'Alaska"</h2>
                <img class="goldpaint_separator" id="goldpaint_separator1" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
                <!--Dynamic title => page title-->
                <h3 class="dynamic_title" ><?= $title ?> </h3>
                <a class="anchor" id="anchor_to_bottom" href="#goldpaint_separator2">
                    <img class="arrow" id="arrow_bottom" alt="flèche marron descendante" src="public/images/paper_arrow1.png">
                </a>        
            </div>    
        </section>
    </main> 
    <!--SECTION CONTENT BLOCK - DYNAMIC (AUTHOR/EXTRACTS/CHAPTERS)-->
    <section class="content_block">
        <!--***DYNAMIC TITLE AND INFO***-->
        <div class="content_titles">
            <h2 class="page_title">Connexion à l'espace administrateur</h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3 class="page_info">Veuillez vous connecter </h3>
        </div>                         
        <div class="content_text">
            <!--Connect form-->
           <form id="connect_form" action="index.php?action=connectVerify" method="POST"> 
                <div class="place_form">
                    <label for="name">Identifiant : </label>
                    <input type="text" id="name" name="login" required>
                </div>
                <div class="place_form">
                    <label for="password">Mot de passe : </label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="button_form">
                    <button type="submit">Se connecter</button>
                </div>
            </form>
        </div>
    </section>
<?php $content = ob_get_clean(); ?>
<?php require_once("main_template.php"); ?>

