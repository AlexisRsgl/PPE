<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="flex">
    <div class="container">
        <nav class="side-nav">
            <ul class="nav-menu">
                @if ($role == '1' ||$role ==  '2')
                    <li class="nav-item"><a href="./utilisateur"><i class="fas fa-tachometer-alt"></i><span class="menu-text">Gestion des utilisateurs</span></a></li>
                @endif
                @if($role == '1' ||$role ==  '4')
                    <li class="nav-item"><a href="./vehicule"><i class="fas fa-file-alt"></i><span class="menu-text">Gestion des véhicules</span></a></li>
                @endif
                @if($role == '1' ||$role ==  '4')
                    <li class="nav-item"><a href="./agences"><i class="fas fa-play "></i><span class="menu-text">Gestion des agences</span></a></li>
                @endif
                @if($role == '1' ||$role ==  '3')
                    <li class="nav-item active"><a href="./agence"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Gestion de mon agence</span></a></li>
                @endif
                @if($role == '1' ||$role ==  '5')
                    <li class="nav-item"><a href="./fournisseurs"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Gestion des fournisseurs</span></a></li>
                @endif
                @if($role == '1' ||$role ==  '5')
                    <li class="nav-item"><a href="./fournisseurs/vehicule"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Gestion des véhicules du fournisseur</span></a></li>
                @endif
                @if($role == '1' ||$role ==  '6')
                    <li class="nav-item"><a href="./commande"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Gestion des commandes</span></a></li>
                @endif
                <div class="center_submit_nav">
                    <a href="{{ route('connexion') }}" >
                        <button class="submit_deconnexion">Déconnexion</button>
                    </a>
                </div>
            </ul>
        </nav>
    </div>

    <section class="section_table">
        <table>
            <tr>
                <th>Marque</th>
                <th>Model</th>
                <th>Immatriculation</th>
                <th>Disponibilité</th>
                <th>Fournisseur</th>
                <th>Disponibilité</th>
            </tr>

            @foreach ($tableauDeVoiture as $car)
                @if(isset($car->mark))
                    <tr>
                        <td>{{ $car->mark }} </td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->immatriculation }}</td>
                        @if($car->status == 1)
                            <td>Disponible</td>
                        @else
                            <td>Indisponible</td>
                        @endif
                        @foreach($tableauDeFournisseur as $fournisseur)
                            @if($fournisseur->id == $car->vendor_id)
                                <td>{{ $fournisseur->name }}</td>
                            @endif
                        @endforeach
                        @if($car->status == 1)
                            <form action="{{ route('indisponibleOnly') }}"><td><button name="car" value="{{ $car->id }}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAA4klEQVQ4jWNgoBAwqja//0+JAUyUuoBiAxgXPfkysF5gQeZ0n+TAqbDU/AdtXEBxGLAQVgIBMqcvMOgu38TA//gZw0dZKYZLkf4MT031UV2AHgYwf8ucvsDg0DQRw9CDVbnEuUB32SYGBgYGBsaCWIb/7z4wMAoJMPyfsJhBe81WVANwhTTf0+cMDAwMEM0FsQz/JyxmYGBgYBB4+OwfUbHwSVoS4gKozYxCAhAJxv9XiIoF6dMXGRybJmCIM/5n9GYkxgUMDAwM/w1Cvf8zMtQxMDBoMTAwXGP8z9jIeGHVNgBdWktWh8kzIAAAAABJRU5ErkJggg==" class="button_table"></button></td></form>
                                @else
                            <form action="{{ route('disponibleOnly') }}"><td><button name="car" value="{{ $car->id }}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAA4klEQVQ4jWNgoBAwqja//0+JAUyUuoBiAxgXPfkysF5gQeZ0n+TAqbDU/AdtXEBxGLAQVgIBMqcvMOgu38TA//gZw0dZKYZLkf4MT031UV2AHgYwf8ucvsDg0DQRw9CDVbnEuUB32SYGBgYGBsaCWIb/7z4wMAoJMPyfsJhBe81WVANwhTTf0+cMDAwMEM0FsQz/JyxmYGBgYBB4+OwfUbHwSVoS4gKozYxCAhAJxv9XiIoF6dMXGRybJmCIM/5n9GYkxgUMDAwM/w1Cvf8zMtQxMDBoMTAwXGP8z9jIeGHVNgBdWktWh8kzIAAAAABJRU5ErkJggg==" class="button_table"></button></td></form>
                                        @endif
                    </tr>
                @endif
            @endforeach
        </table>
    </section>
</div>
<style>
    * {
        box-sizing: border-box;
    }
    body {
        font-family: Roboto, Helvetica, sans-serif;
    }
    /* Fixez le bouton sur le côté gauche de la page the button on the left side of the page */
    .open-btn {
        display: flex;
        justify-content: flex-start;
    }

    /* Positionnez la forme Popup */
    .login-popup {
        position: relative;
        text-align: center;
        width: 100%;
    }
    /* Masquez la forme Popup */
    .form-popup {
        display: none;
        position: fixed;
        left: 45%;
        top: 5%;
        transform: translate(-45%, 5%);
        border: 2px solid #666;
        z-index: 9;
    }
    /* Styles pour le conteneur de la forme */
    .form-container {
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
    }
    /* Largeur complète pour les champs de saisie */
    .form-container input[type="text"],
    .form-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0 22px 0;
        border: none;
        background: #eee;
    }
    /* Quand les entrées sont concentrées, faites quelque chose */
    .form-container input[type="text"]:focus,
    .form-container input[type="password"]:focus {
        background-color: #ddd;
        outline: none;
    }
    /* Stylez le bouton de connexion */
    .form-container .btn {
        background-color: #3498db;
        color: #fff;
        padding: 12px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
        border-radius: 10px;
    }
    /* Stylez le bouton pour annuler */
    .form-container .cancel {
        background-color: #cc0000;
    }
    /* Planez les effets pour les boutons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }
</style>

<div class="login-popup">
    <div class="form-popup" id="popupForm">
        <form action="/action_page.php" class="form-container">
            <h2>Ajoutez une agence</h2>
            <label for="email">
                <strong>Agence</strong>
            </label>
            <input type="text" id="email" placeholder="Prenom" name="email" required />
            <button type="submit" class="btn">Ajouter</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </form>
    </div>
</div>
<script>
    function openForm() {
        document.getElementById("popupForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("popupForm").style.display = "none";
    }
</script>
<footer></footer>
<script>
    $(function() {
        $("li").click(function(e) {
            e.preventDefault();
            $("li").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
</body>
</html>
