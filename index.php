<!-------------------------------------------INDEX-->
<!DOCTYPE html>
<html lang="fr">
    <?php require  ("views/includes/head.php"); ?>
    <body>
        <!--HEADER-->
        <?php require  ("views/includes/header.php"); ?>
        
        <!--MAIN CONTAINER -->
        <main class="main_container" id="pages_main_container">
            <!--PAGE MAIN BLOCK-->
            <section class="mainblock">
                <!--Dynamic picture => picture page -->  
                <img class="main_picture" id="dynamic_main_picture" src="public/images/typewriter_whitecircle.png" alt="machine à écrire" />
                <!--WEBSITE MAIN SUBTITLES -->
                <hgroup class="main_subtitles">
                    <h2 class="book_title" id="alaska_book">"Billet simple pour l'Alaska"</h2>
                    <img id="goldpaint_separator" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
                    <!--Dynamic title => page title-->
                    <h3 class="dynamic_title" >Un volume à suivre <a id="dots_link" href="">"en lignes"...</a></h3>
                </hgroup>
            </section> 

            <!--SECTION CONTENT BLOCK - DYNAMIC (AUTHOR/EXTRACTS/CHAPTERS)-->
            <section class="content_block">

                <!--***DYNAMIC TITLE AND INFO***-->
                <img/>
                <hgroup class="content_titles">
                    <h2 class="page_title">Titre de la page dynamique (auteur, extraits, chapitres) </h2>
                    <h3 class="page_info">Infos de page dynamique</h3>
                </hgroup> 
                    
                <div class="content_text">
                    <p>Ici le contenu dynamique de la page concernée. </br>Je vous propose ici un voyage dans ma contrée littéraire, 
                    d'emprunter un chemin de traverse afin de découvrir, pas à pas, mon nouveau livre "Billet simple pour l'Alaska".
                    Une avanture numérique, hors des sentiers battus, car je sèmerais, tel le Petit Poucet, les chapitres, "segments", de mon dernier roman, avec l'espoir que celui-ci vous tienne suffisamment en haleine pour que nous puissions nous retrouver ensemble à échanger au bout de la route.</p>
                </div>
            <section>
        </main>    
        <!--FOOTER-->
        <?php require  ("views/includes/footer.php"); ?>
    </body>
</html>