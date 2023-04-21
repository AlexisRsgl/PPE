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
                    <li class="nav-item active"><a href="./utilisateur"><i class="fas fa-tachometer-alt"></i><span class="menu-text">Gestion des utilisateurs</span></a></li>
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
    </div> <section class="section_table">
        <button class="button_add open-button" type="submit" class="btn btn-success mb-3" onclick="openForm()">Ajouter un utilisateur</button>
        <table>
            <tr>
                <th>Prénom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Agence</th>
                <th>Mot de passe</th>
                <th>Modifier</th>
                <th>Activation</th>
                <th>Supprimer</th>
            </tr>
            @foreach ($tableauDesUtilisateurs as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @foreach($rolesListe as $roles)
                        @if($user->role_id == $roles->id)
                    <td>{{  $roles->name }}</td>
                        @endif
                    @endforeach
                    @if($user->role_id == 3)
                        <td><button  class="open-button btn btn-success mb-3"  type="submit" onclick="openAffectForm({{ $user->id }})" name="user" value="{{ $user->id }}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAW0lEQVR4nO2VQQrAIAwE53n+/wnxIdtLC0WQqKGkhwzkZMzAEhSKTRrQAR2W3TOmWGC4XpIpT9Mp8u6nCxQ8LwHbEWmx/isYqS0iPSKPfIF9/Vy3oMS8D6dg5ALzIZ+a+RX41gAAAABJRU5ErkJggg==" class="button_table"></button></td>
                    @else
                    <td> </td>
                    @endif
                    <td>{{ $user->password }}</td>
                    <td><button name="user" value="{{ $user->id }}" class="open-button btn btn-success mb-3" type="submit"  onclick="openModifForm({{ $user->id }})"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAEg0lEQVRoge2YTWhcVRTHf3dm2mTSZlEhNqkpxVrDRMUqVC2CII3dRCWCNaW0iW6MCErThdAIdiOIbttVELQtRhsINckmaxcijDGQKDHQYhcpNaImQfMxk8zc42K+3rv3zryZybjROfCGd8/9+v/P/Z977xuoW93qVre6/Z9NWZ6huW7SMqxE2kGDCIigRMiVVdYHAqKNsqBE58uZOrPs6Yd45tBFy0rkrqQZ2Bg9N+WFG7IIaIZB2kGMCnG4xCorbyPJ/3jKhi9f9vvy4xTc7Sqkh024NgGk3ZxQWRMWA+Fo43ErcJK2hyk630HT6yBg9nNNWPCpHUQZT5SV1ydGGxODx2wC5mCuCU1fEWkpo+wfpvxVVcWa40jiDxb+tpqKSCavEOM9VyeZ+FrvJfp43vH2LdFOgJHnD/swR9y8PMDLJFAWUQOMk3CJdi4rSqBqMAHtCFqlgNUMJBAUdXZIIFBmpqQqJ1AbCVAJ6KL5ZJLTwQS0ByhVRrAS0NYcxchpzfbmGvGeNy4KvI2EXn1m8rNpaxe6+NOqmFG//t08CJw93ukDdiO+QDKVtqJSC9sVDnHi4QMZAlpIbazxXGOCrh/i3yfjs08Bq0joZJEcMBPPU1dCj7W2zFya7Y11nt29Sc+RVjjy8lEF04n47DGUHrNW4L25ZSkmAcrJjR3mkG8OrdneXOd46B6nOmNemMm1G5Nz29M/3rRO4kKU7UeX+ZQaI+jJj6M1WxvrnEhcpm/P6ywu30NrnXsaGk91jz89cfVjZxIXiGQi+FV8AYDeYx2+aI7N3Gbr38gBESKpBJfaRjl3/zUAOtZ6+Dl9k4P3HQC41NnZ+RE47kIiWBH1kis8ro+J2oCX5CZvNX+aBw8QVavENl6D5O0LsVjsw5zfwjA487vs6BxwbKmUuaXmNN+VvEKfB3zOvvztNO+eGfVhtlZAU4iwrWlXjgT7zPG0y6czu01X4rIb/NJpJkODlt+9jRoRHJu5hQJeeeIhX9Qm5+7UJgeysnlz7+f0dYw5wU+EBgk3NlVHQLnqanUOeMC/7wTfmwUfdc7ovkoY95Keo4fzye3dr1989FDp3AjKoaxsXti6Sv/+YuAv5MHnLnolCfg1XMNDySInWfBX6N9/3QI24om8fYUrewUyICbm7gDw0mOHfASm5herywGPbPodshlZ6mVCFZdNSQL+HcSvdW1Es6o0CND8yFIv43nwwSdN6STOSiCvdSM3TsYeKF9m2brU5jrd29c401IaPKq8Y9I+B6y9uob3HJ1mbyrB2cdbLSBfLPXyNecrAg9lrUCFX1S+DxVjvFSaR5ojqLYhQoD+9ZM8+HHOE4k2VQTeScCrc2p4TRYRUqkt9q3+wspKK/vahgghjMwuMs47VYEvsQLl3/OpgEA6mWRr5U8mv/mWP1oeZP6vbpbVbiLRymQTQIC7ItJe8aEUIDNEQzjMVMuTqEgEldgFjVEiKvjfTY8tmg6rd1ozoEUWXZeuSi9xXp8GQg1NhPc0E2qIosIRVIXgtVIDlXSoW93qVre6/fftH0cKrIw2tAkpAAAAAElFTkSuQmCC" class="button_table"></button></td>

                    @if($user->is_active == 0)
                        <form action="{{ route('activerUtilisateur') }}" > <td><button name="user" value="{{ $user->id }}"><img src="data:image/png;base64,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" class="button_table inactive"></button></td></form>
                    @else
                        <form action="{{ route('desactiverUtilisateur') }}" > <td><button name="user" value="{{ $user->id }}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEqElEQVR4nLXVa0xTZxgH8GYzZn5dMue3fdj2ZR+WbYS2UTYGAyxrhVKol1oVO+5SLlJS4NieA1Rb6bgJkUst9EYRBJlcWyhjUMKuTmd0ODfkknIZMEaY2NhJn+UtoStQRGx9kn/SnPft+Z33nPM+h0R6zsIj3t+bw/Qh5zB8PsLZ7+0mvczCcdIrWIQPXxxJGZEc3j8j534yL+d+PEewyBYxk3rqpaDpbOoeMYs8VBId8EiXdgj06WHO1KWGgYzj9zcWQT7jdRiPJLdWxAU/cQXX4WlhcP7ogXmcRbmbw6SSvYLmhPt+IDt2YHYr1DXaFDoQkdRZjPXhWx7D4ihyhSLx4JZYXXoYlPICofh0gB2tvDI2xC6K8C3wGMZZ1O90qQy3qCaFAcW8AOiUH4f+Ch4URX9qV/HpQLCpvZ6vOJJyU5fGADWfDpdjg6E8JgjKY4Og5ItAuBQfBPea0mD55/OOSLl+K5pUBhCRlNuerziK0qhMpIHk2H77T9ok+K01A4ZbzsJUH+YE11LOD7JdjgkGIorS5jF8juXLkXH8nlakHrRthDZGkUGzyTh+KxjTN9FjWIHRGkQsMigEofZtYUGo3TFXFNLgMVybFzpQI6SDUkh/JoqC5igz6VCTF9rvMVwlCqLrpeFLA2retrBZzYM6afhSJfYZjeSNqhSHCA2VHOt2sLHq+OMqEU1A8lYVplP31MvCp7eD66Th07W4/2skb1ZtfmjziDFzS3TEKABVPr2J5O0qF/jvU+V/bhs3CTehYyYhqPLoNkV24Juu/2E3sl89ocz056myBHEakeSkUnjyVK1g345xJUH7/atSNrSVHYXpfsyRtrIjcKP0MKAx17mxauxEvFY8ITGWLSh/1IPqZgOUmWttZ69JZuI14s7Tyuw3ngtl44bXFQTj4UOjAO60JENr2RFH0G90DI2hOWhuvOZcMd5etNA10gPdY72borvVtJKgFY9xrmS4/4r54327WCJDMju35z5XOjB5UZptNWvi7AhyzYAm1i6T5li5MvMUp1g9JWorWXYHuubavVZI0IiG/XF81zqUiXW+HYUbH6RU3310sWMB5F2LIO+YhaqCODDVxMCvramO9ChjoLog3jFW0LUAyXo5bLVSFLNlCCaWLNAz/jUUfaP4J06F/d9eD2UZ3mHnmqbyrs+sgq7pmIMypRqqC5NBUciHcqUWvuycd4wRN+7ABaPimaj1XyvYVmwwaBmC9j8MkKDDV79kbLxxN5voHslvcYNuk+zmbrjyg94J9U30u0WHpr53Hj+jJyYcMAs3ZKUph5d3iqJkNbU73l50wsHJbx3I8F/3neiTp+vR7rFe4NfnTq6uONf0wPlMdxjs+iCUm9WOE5rG+2D28RygQhfgDjWOmSBJR4ySInDjXq7MPP0iKMqFdgsImoqdJ17D3aHdY71Q90szJGhFV0nMrHafCLFh8Wh+n+VFE1NdbNXdalqHoxdp08s22gvpjZI/o2sy3yV5o1BHQs0B7dMt9/FoL+R1XlqMVYvEXkHXCnUk1BzQPkVbxvWZotuLVup1dK1QR0LNIUEnvp2sJyaS63Mnk3TiUfRMN97e/wB/NnS6rBkh0AAAAABJRU5ErkJggg==" class="button_table active"></button></td></form>
                    @endif
                    <form action="{{ route('suppressionUtilisateur') }}" ><td><button name="user" value="{{ $user->id }}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAACXUlEQVRoge2Yv2tTURTHP/fd+F9UyNwOjk62FZwcLRXUkGIVR8HB1hiDQlptcXWppkjrj4AVVwdbiNVRxziIQwZXBbuJufc6RJMXY9N38076WnifKdx3cs73y/1xLhdSUlIONUoymRvnDo7be1RcVtvckKopZiCS+E5VMRORDLirJ0+DWwFGJIpG4CvWXVEP3r7eKzCIlm9fxQOMoNRKlMCIBvZVfAvF0ShhUQ0cWLw2sTuBG5aQMOpddF2HfgZSA0mTGkia1EDSiBpw2VGRGB/EDJh8ieajj9hT53eNsRNTNB9+wFxelCpLRiKJyZewM6XW7/lVAILN510xdmIKU3wCOoM9dx0AXSnGrh17Blx2DJsrhDJqzFwFOzndHrKT023x7bGz13DZsbjl48+AatTRCznMracdgTqDKa5D5gj8+om5udYlHmvQy5dQjXrc8nKXOTt+ptsEgLWAg0CHxgx6aZZgq7q7qCQuc8H2K/RCDkwzNBh4i/euK5aJkAlrej86Ky4ehtHIVJ/Z7/dtQEQNtI/K8LL5iwow86t9+8QgiBkIn/OdQdu9nAItbkLEwP/FG/TSRXT5wj8bW9aESCPrEW+a6MU8wVa1tbHvzvSamKuINLLYBlSjjn4cepD706SC2kanSG2j54jVz+6JNDKRJRRU77fuNX3O+XCf0OtlgrWyRGnZZxWXHUU1PvXPESHGpxOn70JJkxpIGl8DO0NR0c0Pn2A/A45Nr/jBeOMT7DsDBeCb5398+I6msHdYBy8D6j2faXIMxwtkl9MO8BLNcVXji2DelJSUg85vwU3YNL7U328AAAAASUVORK5CYII=" class="button_table"></button></td></form>
                </tr>
            @endforeach
            @csrf
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

<script>
    function openForm() {
        document.getElementById("popupForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("popupForm").style.display = "none";
    }
</script>
<!--pop-up ajout utilisateur-->
<div class="login-popup">
    <div class="form-popup" id="popupForm">
        <form action="{{ route("createUser") }}" class="form-container">
            <h2>Ajoutez un utilisateur</h2>
            <label for="email">
                <strong>Prénom</strong>
            </label>
            <input type="text" id="firstname" placeholder="Prenom" name="name" required />
            <label for="psw">
                <strong>Email</strong>
            </label>
            <input type="text" id="email" placeholder="Email" name="email" required />
            <label for="role">
                <strong>Rôle</strong>
            </label><br>
            <select name="role" id="role">
                <option value="6">Gestionnaire de commandes</option>
                <option value="5">Gestionnaire de fournisseurs</option>
                <option value="4">Gestionnaire d'agences</option>
                <option value="3">Chef d'agence</option>
                <option value="2">RH</option>
                <option value="1">Administrateur</option>
            </select>
            <button type="submit" class="btn">Ajouter</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </form>
    </div>
</div>

<!--pop-up affecter une agence-->
<div class="affecting-popup">
    <div class="form-popup" id="popupFormAffect">
        <form action="{{ route("affecterAgenceUtilisateur") }}" class="form-container">
            <h2>Affecter une agence</h2>

            <label for="agence">
                <strong>Agence</strong>
            </label><br>
            <select name="agence" id="agence">
                @foreach($tableauDesAgences as $agence)
                    <option value="{{ $agence->id }}">{{ $agence->name }} {{ $agence->location }}</option>
                @endforeach
            </select>
            <input id="userIdToAffect" name="userIdToAffect" type="hidden" value="">
            <button type="submit" class="btn">Ajouter</button>
            <button type="button" class="btn cancel" onclick="closeAffectForm()">Fermer</button>
        </form>
    </div>
</div>
<!--pop-up modif utilisateur-->
<div class="modif-popup">
    <div class="form-popup" id="popupFormModif">
        <form action="{{ route("modifierUtilisateur") }}" class="form-container">
            <h2>Modifier un utilisateur</h2>
            <label for="email">
                <strong>Prénom</strong>
            </label>
            <input type="text" id="firstname" placeholder="Prenom" name="firstname" required />
            <label for="psw">
                <strong>Email</strong>
            </label>
            <input type="text" id="email" placeholder="Email" name="email" required />
            <label for="role">
                <strong>Rôle</strong>
            </label><br>
            <select name="role" id="role">
                <option value="6">Gestionnaire de commandes</option>
                <option value="5">Gestionnaire de fournisseurs</option>
                <option value="4">Gestionnaire d'agences</option>
                <option value="3">Chef d'agence</option>
                <option value="2">RH</option>
                <option value="1">Administrateur</option>
            </select>
            <input id="userIdModify" name="userIdModify" type="hidden" value="">
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

    function openModifForm(userId) {
        window.localStorage.setItem("userToModify",userId);
        if (localStorage.getItem("userToModify") != null) {
            document.getElementById("userIdModify").value = window.localStorage.getItem("userToModify");
        }
        document.getElementById("popupFormModif").style.display = "block";
    }

    function closeModifForm() {

        document.getElementById("popupFormModif").style.display = "none";
    }

    function openAffectForm(userId) {
        window.localStorage.setItem("userToAffectAgencie",userId);
        if (localStorage.getItem("userToAffectAgencie") != null) {
            document.getElementById("userIdToAffect").value = window.localStorage.getItem("userToAffectAgencie");
        }
        document.getElementById("popupFormAffect").style.display = "block";
    }

    function closeAffectForm() {
        document.getElementById("popupFormAffect").style.display = "none";
    }
</script>
<footer></footer>
<script>


</script>

</body>
</html>
