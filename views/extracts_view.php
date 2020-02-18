<!--EXTRACTS VIEW------
------------------->
<?= $title = "Les segments"; ?>

                <!--COM PERSO : variables à réutiliser même que chapters:  chapterTitle / chapterNumber / chapterPicture --->
<?php require ("../models/manager.php"); ?>

<?php ob_start(); ?>

    <main class="main_container" id="pages_main_container">
        <!--PAGE MAIN BLOCK-->
        <section class="mainblock">
            <!--Dynamic picture => picture page -->  
            <img class="main_picture" id="dynamic_main_picture" src="../public/images/extracts.png"  alt="profil d'homme dessiné" />
            <!--WEBSITE MAIN SUBTITLES -->
            <div class="main_subtitles">
                <h2 class="book_title" id="alaska_book">"Billet simple pour l'Alaska"</h2>
                <img class="goldpaint_separator" id="goldpaint_separator1" src="../public/images/goldpaint_separator.png" alt="trace peinture or" />
                <!--Dynamic title => page title-->
                <h3 class="dynamic_title" ><?= $title ?> </h3>
                <a class="anchor" id="anchor_to_bottom" href="#goldpaint_separator2">
                    <img class="arrow" id="arrow_bottom" src="../public/images/paper_arrow1.png">
                </a>        
            </div>    
        </section>
    </main> 

    <!--SECTION CONTENT BLOCK - DYNAMIC -->
    <section class="content_block">        
        <hgroup class="content_titles">
            <h2 class="page_title">Extraits</h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="../public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3 class="page_info">Un rapide tour d'horizon</h3>
        </hgroup> 
                        
        <div class="content_text">
            <div class="content_extracts_chapters">
                <?php                     
                    $req = $db->query("SELECT * FROM chapters ORDER BY number_chapter");
                    $extracts = $req->fetchAll();
                    foreach ($extracts as $extract) : 
                ?>

                <article> 
                    <img  src=" <?= ($extract['picture_chapter']) ?> "/>    
                    <h3><?= htmlspecialchars($extract['number_chapter']) ?>. <?= htmlspecialchars($extract['title_chapter']) ; ?></h3>
                    <p class="date_chapter"><?=  nl2br(htmlspecialchars($extract['date_chapter'])); ?></p>
                    <p class="text_chapter">
                        <?php if(strlen($extract['content_chapter']) > 100) {$extract['content_chapter'] = substr($extract['content_chapter'], 0, 70); } ?>
                        <?= htmlspecialchars($extract['content_chapter']);?>...</p>
                    <p>
                        <a href="">Lire la suite</a>
                    </p>
                </article>

                <?php
                    endforeach;
                    $req->closeCursor();
                ?>
            </div>
        </div>
    </section>
  

<?php $content = ob_get_clean(); ?>
<?php require_once("main_template.php"); ?>
