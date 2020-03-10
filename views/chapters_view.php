<!--CHAPTERS VIEW-->

<?php $title = "Le volume"; ?>

<?php ob_start(); ?>
    <main class="main_container" id="pages_main_container">
        <!--PAGE MAIN BLOCK-->
        <section class="mainblock">
            <!--Dynamic picture => picture page -->  
            <img class="main_picture" id="dynamic_main_picture" src="public/images/chap.png" alt="profil d'homme dessiné" />
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
    <!--SECTION CONTENT BLOCK - DYNAMIC CONTENT-->
    <section class="content_block">        
        <div class="content_titles">
            <h2 class="page_title">Découverte par chapitre</h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3 class="page_info">Bonne lecture !</h3>
        </div> 
                        
        <div class="content_text">
            <div class="content_extracts_chapters">
                <article>
                    
                    <img  src=" <?= ($onePost['picture_chapter']) ?> " alt="image du chapitre"/>    
                    <h3><?= htmlspecialchars_decode($onePost['number_chapter']) ?>. <?= htmlspecialchars_decode($onePost['title_chapter']) ; ?></h3>
                    <p>
                        <a id="backto_extracts" href="index.php?action=showListPosts">Retour aux extraits </a>
                    </p>
                    <p class="date_chapter">Posté le : <?=  nl2br(htmlspecialchars_decode($onePost['date_chapter_fr'])); ?></p>
                    <p class="text_chapter"><?=  nl2br(htmlspecialchars_decode($onePost['content_chapter'])) ?></p>                                        
                    <div class="chapter_buttons">
                        <p>
                            <?php if (!is_null($idPrev)): ?>
                                <a href="index.php?action=showOnePost&id=<?= $idPrev ?>#goldpaint_separator2">Précédent</a>
                            <?php endif; ?>
                        </p>
                        
                        <p>
                            <?php if (!is_null($idNext)): ?>
                                <a href="index.php?action=showOnePost&id=<?= $idNext ?>#goldpaint_separator2">Suivant</a>
                            <?php endif; ?>
                        </p>
                    </div>
                </article>
            </div>
            <!--Comment form-->
            <section class="comments_block">
                <form id="comments_form" action="index.php?action=addComment&id=<?= $onePost['id'] ?>" method="post"> <!--COM PERSO : remplir action -->
                    <h3>A vous de prendre votre plume !</h3>
                    <div class="place_form">
                        <label for="comment_pseudo">Pseudo : </label>
                        <input type="text" id="comment_pseudo" name="comment_pseudo" required>
                    </div>
                    <div class="place_form">
                        <label for="comment_subject">Sujet :</label>
                        <input type="text" id="comment_subject" name="comment_subject" required>
                    </div>
                    <div class="place_form" >
                        <label for="comment_content">Message : </label>
                        <textarea id="comment_content" name="comment_content" required></textarea>
                    </div>
                    <div class="button_form">
                        <button type="submit">Envoyer</button>
                    </div>
                </form>
                <!--comment list-->
                <section class="all_posted_comments">
                    <?php if(!empty($comments)):?>
                        <h3>Les derniers messages</h3>
                        <?php foreach ($comments as $comment): ?>
                            <section class="posted_comments"> 
                                <h4>Posté par : <?= htmlspecialchars($comment['author_comment']) ?><br/>  le <?=  nl2br(htmlspecialchars($comment['date_comment_fr'])); ?> </h4>
                                <h5><?= htmlspecialchars($comment['title_comment']) ?></h5>
                                <p><?= htmlspecialchars($comment['content_comment']) ?></p>
                                <p class="comment_status">
                                    <?php if($comment['statut_user_comment'] =='posted'):?>
                                        <a class="report_link" href="index.php?action=toReportComment&id=<?= $comment['id']; ?>&chapter_id=<?= $onePost['id']; ?>">Signaler</a>
                                    <?php elseif($comment['statut_user_comment'] =='validated') :?>
                                        <p class="validated_comment">Le commentaire a été validé par l'administrateur</p>
                                    <?php else: ?>
                                        <p  class="reported_comment">Le commentaire a déjà été signalé</p>
                                    <?php endif; ?> 
                                </p>                   
                            </section>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h3>Aucun message</h3>    
                    <?php endif; ?> 
                </section>
            </section>
        </div>
    </section>
<?php $content = ob_get_clean(); ?>
<?php require_once("views/main_template.php"); ?>
