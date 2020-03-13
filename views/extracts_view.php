<!--EXTRACTS VIEW-->
<?php $title = "Les segments"; ?>

<?php ob_start(); ?>
    <main class="main_container" id="pages_main_container">
        <!--PAGE MAIN BLOCK-->
        <section class="mainblock">
            <!--Dynamic picture => picture page -->  
            <img class="main_picture" id="dynamic_main_picture" src="public/images/extracts.png"  alt="profil d'homme dessiné" />
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
    <!--SECTION CONTENT BLOCK - DYNAMIC -->
    <section class="content_block">        
        <div class="content_titles">
            <h2 class="page_title">Extraits</h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3 class="page_info">Un rapide tour d'horizon</h3>
        </div>
        <div class="content_text">
            <div class="content_extracts_chapters">
                <!--Extract list-->
                <?php foreach ($allPosts as $allPost): ?>
                    <article> 
                        <img src="public/uploads/<?= ($allPost['picture_chapter']) ?> " alt="image de chapitre"/>    
                        <h3><?= htmlspecialchars_decode($allPost['number_chapter']) ?>.<?= htmlspecialchars_decode($allPost['title_chapter']) ?></h3>
                        <p class="date_chapter">Posté le : <?=  nl2br(htmlspecialchars_decode($allPost['date_chapter_fr'])) ?></p>
                        <p class="text_chapter">
                        <?php  
                            $rightSize = 250;
                            $smallerString= strip_tags(htmlspecialchars_decode($allPost['content_chapter']));
                        
                            if (strlen($smallerString) > $rightSize) {
                                $cut = substr($smallerString, 0, $rightSize);
                                $smallerString= substr($cut, 0, strrpos($cut, ' '));
                            }
                            $allPost['content_chapter'] = $smallerString;
                        ?>
                            <?= $allPost['content_chapter']; ?>...</p>
                        <p>
                            <a href="index.php?action=showOnePost&id=<?= $allPost['id'] ?>">Lire la suite</a>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require_once("main_template.php"); ?>
