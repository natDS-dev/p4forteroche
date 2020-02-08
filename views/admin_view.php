<!--ADMIN VIEW------
------------------->

<?= $title = "Administration"; ?>

<?= ob_start(); ?>

        <!----COM PERSO : PENSER RESTRICTION => Accès seulement si id et mp corrects sinon => id et mp incorrects-->
    <main class="admin_main_container">
        <hgroup class="admin_subtitles">
            <h2>Vous êtes connecté à l'espace administrateur<h2>
            <img class="goldpaint_separator" id="goldpaint_separator2" src="public/images/goldpaint_separator.png" alt="trace peinture or" />
            <h3>Ici, vous pouvez gérer le contenu de vos pages</h3>
        </hgroup>
     
        <section class="admin_main_block">
            <div class="menu_admin" id="main_menu_admin">
                <nav > 
                    <ul> 
                        <li>
                            <a href="">Publications</a>
                        </li>
                        <li>
                            <a href="">Commentaires</a>
                        </li>
                        <li>
                            <a href="">Rédiger</a>
                        </li>                        
                    </ul>
                </nav>             
            </div>

            <table class="table" id="chapter_table">
                <caption>Posts</caption>
                <thead>
                  <tr>
                    <th scope="col">N° chapitre </th>
                    <th scope="col">Titre</th>
                    <th scope="col">En ligne ?</th>
                    <th scope="col">Action ?</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="N° chapitre">$réccup num</td>
                    <td data-label="Titre">$récup titre</td>
                    <td data-label="En ligne ?">$recup statut</td>
                    <td data-label="Action ?">
                        <p><a href="">Editer</a></p> <!--COM PERSO : Compléter lien-->
                        <p><a href="">Suppr.</a></p>
                    </td>
                  </tr>
                </tbody>
            </table>

            <table class="table" id="chapter_table">
                <caption>Commentaires</caption>
                <thead>
                  <tr>
                    <th scope="col">Auteur </th>
                    <th scope="col">Sujet</th>
                    <th scope="col">Message</th>
                    <th scope="col">Signalé</th>
                    <th scope="col">Action ?</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="Auteur">$réccup auteur</td>
                    <td data-label="Sujet">$récup sujet</td>
                    <td data-label="Message">$recup message</td>
                    <td data-label="Signalé">$recup siganlement</td>
                    <td data-label="Action ?">
                        <p><a href="">Suppr.</a></p> <!--COM PERSO : Compléter lien-->
                       
                    </td>
                  </tr>
                </tbody>
            </table>

                                         <!---COM PERSO : RECUPERER LES DONNEES DES CHAMPS-->
            <form method="post" class="tinymce_block">
                <div class="place_form" id="tinymce_number_chap">
                    <label for="title">Numéro de chapitre* :</label>   <!---COM PERSO : FAIRE VERIF SUPPLEMENTAIRES DES ENTREES-->
                    <input type="number" id="input_tinymce_title" name="input_tinymce_title" pattern="[0-9]{1,5}" required >
                </div>
                <div class="place_form" id="tinymce_title">
                    <label for="title">Titre* :</label>               <!---COM PERSO : FAIRE VERIF SUPPLEMENTAIRES DES ENTREES-->
                    <input type="text" id="input_tinymce_title" name="input_tinymce_title" pattern="[a-zA-Z ]+" required>
                </div>
                <p>"Les champs indiqués par une * sont obligatoires."</p>
                <label for="title">Contenu :</label>
                <textarea id="mytextarea"></textarea>
                

                <div class="button_form">
                    <button id="publish_chapter" type="submit">Publier</button>
                    <button id="draft_chapter" type="submit">Mettre en attente </button>
                </div>
            </form>

        </section>
    </main>   
    



<?=$content = ob_get_clean(); ?>



