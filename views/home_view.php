<!--HOME VIEW-->
<?php $title = "Un volume à suivre en ligne..."; ?>

<?php ob_start(); ?>
    <main class="main_container" id="pages_main_container">
        <!--PAGE MAIN BLOCK-->
        <section class="mainblock">
            <!--Dynamic picture => picture page -->  
            <img class="main_picture" id="dynamic_main_picture" src="public/images/home_typewriter.png" alt="machine à écrire ancienne" />
            <!--WEBSITE MAIN SUBTITLES -->
            <div class="main_subtitles">
                <h2 class="book_title" id="alaska_book">"Billet simple pour l'Alaska"</h2>
                <img class="goldpaint_separator" id="goldpaint_separator1" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
                <!--Dynamic title => page title-->
                <h3 class="dynamic_title" ><?= $title ?></h3>
                <a class="anchor" id="anchor_to_bottom" href="#goldpaint_separator2">
                    <img class="arrow" id="arrow_bottom" alt="flèche marron descendante" src="public/images/paper_arrow1.png">
                </a>        
            </div>    
        </section>
    </main> 
    <!--SECTION CONTENT BLOCK - STATIC(but could be dynamic) -->
    <section class="content_block">        
        <div class="content_titles">
            <h2 class="page_title">Bienvenue</h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3 class="page_info">Partons en voyage</h3>
            <h5> Avant de prendre la route, voici une légende qui vous aidera à parcourir ce chemin littéraire.<br/>
            L'auteur : Eléments biographiques - Les segments : Extraits du roman - Le volume : Chapitres complets - Le lien : Contact</h5>
        </div> 
        <!--(//OPTION// : possibility of a dynamic content => Jean could have his own presentation text)-->
        <div class="content_text">
            <p>Je vous propose ici un voyage dans ma contrée littéraire, 
            d'emprunter un chemin de traverse afin de découvrir, pas à pas, mon nouveau livre "Billet simple pour l'Alaska".<br/>
            Une aventure numérique, hors des sentiers battus, car je sèmerais, tel le Petit Poucet, les chapitres, "segments",
            de mon dernier roman, avec l'espoir que celui-ci vous tienne suffisamment en haleine pour que nous puissions nous retrouver
            ensemble à échanger au bout de la route.</p>
        </div>
    </section>
<?php $content = ob_get_clean(); ?>
<?php require_once("main_template.php"); ?>



