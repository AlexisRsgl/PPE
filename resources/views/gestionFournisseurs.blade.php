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
                    <li class="nav-item"><a href="./agence"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Gestion de mon agence</span></a></li>
                @endif
                @if($role == '1' ||$role ==  '5')
                    <li class="nav-item active"><a href="./fournisseurs"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Gestion des fournisseurs</span></a></li>
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
        <button class="button_add open-button" type="submit" class="btn btn-success mb-3" onclick="openForm()">Ajouter un fournisseur</button>
        <table>
            <tr>
                <th>Entreprise</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            @foreach ($tableauDeFournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->name }}</td>
                    <td><button onclick="openModifForm({{ $fournisseur->id }})"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAEg0lEQVRoge2YTWhcVRTHf3dm2mTSZlEhNqkpxVrDRMUqVC2CII3dRCWCNaW0iW6MCErThdAIdiOIbttVELQtRhsINckmaxcijDGQKDHQYhcpNaImQfMxk8zc42K+3rv3zryZybjROfCGd8/9+v/P/Z977xuoW93qVre6/Z9NWZ6huW7SMqxE2kGDCIigRMiVVdYHAqKNsqBE58uZOrPs6Yd45tBFy0rkrqQZ2Bg9N+WFG7IIaIZB2kGMCnG4xCorbyPJ/3jKhi9f9vvy4xTc7Sqkh024NgGk3ZxQWRMWA+Fo43ErcJK2hyk630HT6yBg9nNNWPCpHUQZT5SV1ydGGxODx2wC5mCuCU1fEWkpo+wfpvxVVcWa40jiDxb+tpqKSCavEOM9VyeZ+FrvJfp43vH2LdFOgJHnD/swR9y8PMDLJFAWUQOMk3CJdi4rSqBqMAHtCFqlgNUMJBAUdXZIIFBmpqQqJ1AbCVAJ6KL5ZJLTwQS0ByhVRrAS0NYcxchpzfbmGvGeNy4KvI2EXn1m8rNpaxe6+NOqmFG//t08CJw93ukDdiO+QDKVtqJSC9sVDnHi4QMZAlpIbazxXGOCrh/i3yfjs08Bq0joZJEcMBPPU1dCj7W2zFya7Y11nt29Sc+RVjjy8lEF04n47DGUHrNW4L25ZSkmAcrJjR3mkG8OrdneXOd46B6nOmNemMm1G5Nz29M/3rRO4kKU7UeX+ZQaI+jJj6M1WxvrnEhcpm/P6ywu30NrnXsaGk91jz89cfVjZxIXiGQi+FV8AYDeYx2+aI7N3Gbr38gBESKpBJfaRjl3/zUAOtZ6+Dl9k4P3HQC41NnZ+RE47kIiWBH1kis8ro+J2oCX5CZvNX+aBw8QVavENl6D5O0LsVjsw5zfwjA487vs6BxwbKmUuaXmNN+VvEKfB3zOvvztNO+eGfVhtlZAU4iwrWlXjgT7zPG0y6czu01X4rIb/NJpJkODlt+9jRoRHJu5hQJeeeIhX9Qm5+7UJgeysnlz7+f0dYw5wU+EBgk3NlVHQLnqanUOeMC/7wTfmwUfdc7ovkoY95Keo4fzye3dr1989FDp3AjKoaxsXti6Sv/+YuAv5MHnLnolCfg1XMNDySInWfBX6N9/3QI24om8fYUrewUyICbm7gDw0mOHfASm5herywGPbPodshlZ6mVCFZdNSQL+HcSvdW1Es6o0CND8yFIv43nwwSdN6STOSiCvdSM3TsYeKF9m2brU5jrd29c401IaPKq8Y9I+B6y9uob3HJ1mbyrB2cdbLSBfLPXyNecrAg9lrUCFX1S+DxVjvFSaR5ojqLYhQoD+9ZM8+HHOE4k2VQTeScCrc2p4TRYRUqkt9q3+wspKK/vahgghjMwuMs47VYEvsQLl3/OpgEA6mWRr5U8mv/mWP1oeZP6vbpbVbiLRymQTQIC7ItJe8aEUIDNEQzjMVMuTqEgEldgFjVEiKvjfTY8tmg6rd1ozoEUWXZeuSi9xXp8GQg1NhPc0E2qIosIRVIXgtVIDlXSoW93qVre6/fftH0cKrIw2tAkpAAAAAElFTkSuQmCC" class="button_table"></button></td>
                    <form action="{{ route('suppressionFournisseur') }}" ><td><button name="fournisseur" value="{{ $fournisseur->id }}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAACXUlEQVRoge2Yv2tTURTHP/fd+F9UyNwOjk62FZwcLRXUkGIVR8HB1hiDQlptcXWppkjrj4AVVwdbiNVRxziIQwZXBbuJufc6RJMXY9N38076WnifKdx3cs73y/1xLhdSUlIONUoymRvnDo7be1RcVtvckKopZiCS+E5VMRORDLirJ0+DWwFGJIpG4CvWXVEP3r7eKzCIlm9fxQOMoNRKlMCIBvZVfAvF0ShhUQ0cWLw2sTuBG5aQMOpddF2HfgZSA0mTGkia1EDSiBpw2VGRGB/EDJh8ieajj9hT53eNsRNTNB9+wFxelCpLRiKJyZewM6XW7/lVAILN510xdmIKU3wCOoM9dx0AXSnGrh17Blx2DJsrhDJqzFwFOzndHrKT023x7bGz13DZsbjl48+AatTRCznMracdgTqDKa5D5gj8+om5udYlHmvQy5dQjXrc8nKXOTt+ptsEgLWAg0CHxgx6aZZgq7q7qCQuc8H2K/RCDkwzNBh4i/euK5aJkAlrej86Ky4ehtHIVJ/Z7/dtQEQNtI/K8LL5iwow86t9+8QgiBkIn/OdQdu9nAItbkLEwP/FG/TSRXT5wj8bW9aESCPrEW+a6MU8wVa1tbHvzvSamKuINLLYBlSjjn4cepD706SC2kanSG2j54jVz+6JNDKRJRRU77fuNX3O+XCf0OtlgrWyRGnZZxWXHUU1PvXPESHGpxOn70JJkxpIGl8DO0NR0c0Pn2A/A45Nr/jBeOMT7DsDBeCb5398+I6msHdYBy8D6j2faXIMxwtkl9MO8BLNcVXji2DelJSUg85vwU3YNL7U328AAAAASUVORK5CYII=" class="button_table"></button></td></form>
                </tr>
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
        <form action="{{ "createFournisseur" }}" class="form-container">
            <h2>Ajoutez</h2>
            <label for="fournisseur">
                <strong>Fournisseur</strong>
            </label>
            <input type="text" id="fournisseur" placeholder="Nom du fournisseur" name="fournisseur" required />
            <button type="submit" class="btn">Ajouter</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </form>
    </div>
</div>

<!--pop-up modif fournisseur-->
<div class="modif-popup">
    <div class="form-popup" id="popupFormModif">
        <form action="{{ route("modifierFournisseur") }}" class="form-container">
            <h2>Fournisseur</h2>
            <label for="fournisseur">
                <strong>Nom du fournisseur</strong>
            </label>
            <input type="text" id="fournisseur" placeholder="Nom du fournisseur" name="fournisseur" required />
            <input id="fournisseurIdModify" name="fournisseurIdModify" type="hidden" value="">
            <button type="submit" class="btn">Modifier</button>
            <button type="button" class="btn cancel" onclick="closeModifForm()">Fermer</button>
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

    function openModifForm(fournisseurId) {
        window.localStorage.setItem("fournisseurIdModify",fournisseurId);
        if (localStorage.getItem("fournisseurIdModify") != null) {
            document.getElementById("fournisseurIdModify").value = window.localStorage.getItem("fournisseurIdModify");
        }
        document.getElementById("popupFormModif").style.display = "block";
    }

    function closeModifForm() {

        document.getElementById("popupFormModif").style.display = "none";
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
