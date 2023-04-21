<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="body_inscription">
         <div class="element">
            <div class="block_element">
                <div class="connexion_block">
                        <div class="block_img block_img_bis">
                            <img src="../img/auto_inscription_bis.jpg" class="img_auto" width="300">
                        </div>
                        <div class="mail_form">
                            <h1>inscription</h1>
                            <form>     
                                <label for="name">Nom :</label><br>
                                <input name="name" type="text" class="input_form"><br>
                                <label for="firstname">Prénom :</label><br>
                                <input name="firstname" type="text" class="input_form"><br>
                                <label for="mail">Email :</label><br>
                                <input name="mail" type="email" class="input_form" required><br>
                                <label for="password">Mot de passe :</label><br>
                                <input name="password" type="text" class="input_form" required><br>
                                <input type="submit" value="Envoyer" class="submit_form"><br>
                                <a href="connexion.php" class="form_submit_option">Se connecter</a>
                            </form>
                        </div>
                </div>
            </div>

        </div>
    </body>
</html>