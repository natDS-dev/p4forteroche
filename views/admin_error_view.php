<!--ADMIN ERROR VIEW-->
<?php $title = "Erreur page admin"; ?>

<?php ob_start(); ?>        
    <main class="admin_main_container" id="admin_main">
    <section class="mainblock" id="pages_main_block">
            <!--Dynamic picture => picture page -->  
            <img class="main_picture" id="dynamic_main_picture" src="public/images/black_ink.png" alt="profil d'homme dessiné" />
            <!--WEBSITE MAIN SUBTITLES -->
            <div class="main_subtitles">
                <h2 class="book_title" id="alaska_book">"Oups...il y a un problème ! Encrier renversé"</h2>
                <img class="goldpaint_separator" id="goldpaint_separator1" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
                <!--Dynamic title => page title-->
                <h3 class="dynamic_title" ><?= $title ?> </h3>
                <p>
                    <a href="index.php?action=adminHome">Retour accueil admin</a>
                </p>   
            </div>    
        </section>
    </main>   
<?php $content = ob_get_clean(); ?>
<?php require_once("template_admin.php"); ?>

