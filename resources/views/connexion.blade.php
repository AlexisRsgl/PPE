<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="body_connexion">
<div class="element">
    <div class="block_element">
        <div class="connexion_block">
            <div class="block_img">
                <img src="../img/parc_auto_bis.jpg" class="img_auto" height="400" width="300">
            </div>
            <div class="block_form">
                <form  action="{{ route('login') }}" method="post">
                    @csrf
                    <div>
                        <h1>Connexion</h1><br>
                    </div>
                    <div id="mail_form">
                        <label for="email" id="email_label">Email :</label><br>
                        <input name="email" type="email" class="input_form" required><br><br>
                    </div>
                    <label for="password">Mot de passe :</label><br>
                    <input name="password" type="password" class="input_form" required><br>
                    <input type="submit" value="Envoyer" class="submit_form"><br>
                    @if (isset($error) && $error == 1)
                        <p style = "color:red">identifiants saisi incorrect</p>
                    @elseif(isset($error) && $error == 2)
                        <p>Votre compte à été désactivé</p>
                    @else
                        <p></p>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
