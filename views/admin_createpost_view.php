<!--ADMIN CREATE POST VIEW-->

<?php $title = "Administration"; ?>

<?php ob_start(); ?>
        <!--COM PERSO : PENSER RESTRICTION => Accès seulement si id et mp corrects sinon => id et mp incorrects-->
    <main class="admin_main_container">
        <?php require_once("includes/subtitles_admin.php"); ?>     
        <section class="admin_main_block">
            <?php include_once("includes/menu_admin.php"); ?>
            <!---COM PERSO : RECUPERER LES DONNEES DES CHAMPS-->
            <form class="tinymce_block" method="post" action="" > <!----remplir ACTION--->
                <div class="place_form" id="tinymce_number_chap">
                    <label for="input_tinymce_number">Sélectionner un numéro de chapitre*(obligatoire) :</label>   <!---COM PERSO : FAIRE VERIF SUPPLEMENTAIRES DES ENTREES-->
                    <select name="input_tinymce_number" required>
                        <?php for($i=1;$i<=$maxChapter;$i++) : ?>          
                            <?php if(!in_array($i,$unavailableNumChap,true)) :?>                          
                                <option value=""><?= $i ?></option>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="place_form" id="tinymce_title">
                    <label for="input_tinymce_title">Entrer un titre* (obligatoire) :</label> <!---COM PERSO : FAIRE VERIF SUPPLEMENTAIRES DES ENTREES-->
                    <input type="text" id="input_tinymce_title" name="input_tinymce_title" pattern="[a-zA-Z ]+" required>
                </div>
                <div class="place_form" id="tinymce_url_img">
                    <label for="input_tinymce_url">Entrer l'url d'une image*(obligatoire) :</label> <!---COM PERSO : FAIRE VERIF SUPPLEMENTAIRES DES ENTREES-->
                    <input type="url" id="input_tinymce_url" name="input_tinymce_url" pattern="https?://.+" required>
                </div>
                <label for="mytextarea">Entrer un texte :</label>
                <textarea id="mytextarea"></textarea>
                <div class="button_form">
                    <button id="publish_chapter" name="publish_chapter" type="submit">Publier</button>
                    <button id="draft_chapter" name="draft_chapter" type="submit">Mettre en attente </button>
                </div>
            </form>
        </section>
    </main>

<?php $content = ob_get_clean(); ?>
<?php require_once("template_admin.php"); ?>