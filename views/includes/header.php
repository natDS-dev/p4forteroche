<header>
    <div class="menu_block">
        <nav class="main_menu" id="bloc_main_menu"> 
            <ul> 
                <li>
                    <a href="index.php?action=showHome">
                        <img src="public/images/homepage.png" alt="baleine à travers un cercle doré" />
                    </a>
                </li>
                <li>
                    <a href="index.php?action=showAuthor">L'Auteur</a>
                </li>
                <li>
                    <a href="index.php?action=showListPosts">Les Segments</a>
                </li>
                <li>
                    <a href="index.php?action=showOnePost&id=1#goldpaint_separator2">Le Volume</a>
                </li>
                <li>
                    <a href="index.php?action=showContact#goldpaint_separator2">Le lien</a>
                </li>       
                <li><!--check if admin connected or not and display the right button-->
                    <?php if(adminConnected()) : ?>
                        <a href="index.php?action=adminHome">Admin</a>
                        <a href="index.php?action=adminDisconnect">Déconnexion</a>
                    <?php else : ?>
                        <a href="<?= "index.php?action=showConnect#goldpaint_separator2" ?>">
                            <img src="public/images/connexion2.png" alt="cadenas doré" />
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
        <img id="background_mainmenu" src="public/images/ticket_menu1.png" alt="papier étiquette"/>
    </div>
    <!--PAGE MAIN TITLES-->
    <div class="website_main_titles">
        <h1>JEAN FORTEROCHE</h1>
        <h2>"Ecrivain et acteur"</h2>        
    </div>
</header>
