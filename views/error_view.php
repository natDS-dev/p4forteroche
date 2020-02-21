<!--ERROR VIEW------
------------------->

<?= $title = "Erreur page"; ?>



<?php ob_start(); ?>

    <main class="main_container" id="pages_main_container">
        <!--PAGE MAIN BLOCK-->
        <section class="mainblock">
            <!--Dynamic picture => picture page -->  
            <img class="main_picture" id="dynamic_main_picture" src="public/images/black_ink.png" alt="profil d'homme dessiné" />
            <!--WEBSITE MAIN SUBTITLES -->
            <div class="main_subtitles">
                <h2 class="book_title" id="alaska_book">"Oups...il y a un problème ! Encrier renversé"</h2>
                <img class="goldpaint_separator" id="goldpaint_separator1" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
                <!--Dynamic title => page title-->
                <h3 class="dynamic_title" ><?= $title ?> </h3>
            </div>    
        </section>
    </main> 


  

<?php $content = ob_get_clean(); ?>
<?php require_once("main_template.php"); ?>