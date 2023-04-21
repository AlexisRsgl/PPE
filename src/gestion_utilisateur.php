<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="flex">
            <div class="container">
                <nav class="side-nav">
                <ul class="nav-menu">
                    <li class="nav-item active"><a href="gestion_utilisateur.php"><i class="fas fa-tachometer-alt"></i><span class="menu-text">Gestion utilisateur</span></a></li>
                    <li class="nav-item"><a href="gestion_entreprise.php"><i class="fas fa-user"></i><span class="menu-text">Gestion entreprise</span></a></li>
                    <li class="nav-item"><a href="gestion_vehicules.php"><i class="fas fa-file-alt"></i><span class="menu-text">Gestion véhicule</span></a></li>
                    <li class="nav-item"><a href="gestion_agences.php"><i class="fas fa-play "></i><span class="menu-text">Gestion des agences</span></a></li>
                    <li class="nav-item"><a href="gestion_agence_only.php"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Gestion d'une agence</span></a></li>
                    <div class="center_submit_nav">
                        <button class="submit_deconnexion">Déconnexion</button>
                    </div>
                </ul>
            </div>
            <section class="section_table">
                <button class="button_add open-button" type="submit" class="btn btn-success mb-3" onclick="openForm()">Ajouter un utilisateur</button>
                <table>
                    <tr>
                        <th>utilisateur</th>
                        <th>Modifier</th>
                        <th>Desactiver</th>
                        <th>Supprimer</th>
                    </tr>
                    <tr>
                        <td>Alexis</td>
                        <td><button><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAEg0lEQVRoge2YTWhcVRTHf3dm2mTSZlEhNqkpxVrDRMUqVC2CII3dRCWCNaW0iW6MCErThdAIdiOIbttVELQtRhsINckmaxcijDGQKDHQYhcpNaImQfMxk8zc42K+3rv3zryZybjROfCGd8/9+v/P/Z977xuoW93qVre6/Z9NWZ6huW7SMqxE2kGDCIigRMiVVdYHAqKNsqBE58uZOrPs6Yd45tBFy0rkrqQZ2Bg9N+WFG7IIaIZB2kGMCnG4xCorbyPJ/3jKhi9f9vvy4xTc7Sqkh024NgGk3ZxQWRMWA+Fo43ErcJK2hyk630HT6yBg9nNNWPCpHUQZT5SV1ydGGxODx2wC5mCuCU1fEWkpo+wfpvxVVcWa40jiDxb+tpqKSCavEOM9VyeZ+FrvJfp43vH2LdFOgJHnD/swR9y8PMDLJFAWUQOMk3CJdi4rSqBqMAHtCFqlgNUMJBAUdXZIIFBmpqQqJ1AbCVAJ6KL5ZJLTwQS0ByhVRrAS0NYcxchpzfbmGvGeNy4KvI2EXn1m8rNpaxe6+NOqmFG//t08CJw93ukDdiO+QDKVtqJSC9sVDnHi4QMZAlpIbazxXGOCrh/i3yfjs08Bq0joZJEcMBPPU1dCj7W2zFya7Y11nt29Sc+RVjjy8lEF04n47DGUHrNW4L25ZSkmAcrJjR3mkG8OrdneXOd46B6nOmNemMm1G5Nz29M/3rRO4kKU7UeX+ZQaI+jJj6M1WxvrnEhcpm/P6ywu30NrnXsaGk91jz89cfVjZxIXiGQi+FV8AYDeYx2+aI7N3Gbr38gBESKpBJfaRjl3/zUAOtZ6+Dl9k4P3HQC41NnZ+RE47kIiWBH1kis8ro+J2oCX5CZvNX+aBw8QVavENl6D5O0LsVjsw5zfwjA487vs6BxwbKmUuaXmNN+VvEKfB3zOvvztNO+eGfVhtlZAU4iwrWlXjgT7zPG0y6czu01X4rIb/NJpJkODlt+9jRoRHJu5hQJeeeIhX9Qm5+7UJgeysnlz7+f0dYw5wU+EBgk3NlVHQLnqanUOeMC/7wTfmwUfdc7ovkoY95Keo4fzye3dr1989FDp3AjKoaxsXti6Sv/+YuAv5MHnLnolCfg1XMNDySInWfBX6N9/3QI24om8fYUrewUyICbm7gDw0mOHfASm5herywGPbPodshlZ6mVCFZdNSQL+HcSvdW1Es6o0CND8yFIv43nwwSdN6STOSiCvdSM3TsYeKF9m2brU5jrd29c401IaPKq8Y9I+B6y9uob3HJ1mbyrB2cdbLSBfLPXyNecrAg9lrUCFX1S+DxVjvFSaR5ojqLYhQoD+9ZM8+HHOE4k2VQTeScCrc2p4TRYRUqkt9q3+wspKK/vahgghjMwuMs47VYEvsQLl3/OpgEA6mWRr5U8mv/mWP1oeZP6vbpbVbiLRymQTQIC7ItJe8aEUIDNEQzjMVMuTqEgEldgFjVEiKvjfTY8tmg6rd1ozoEUWXZeuSi9xXp8GQg1NhPc0E2qIosIRVIXgtVIDlXSoW93qVre6/fftH0cKrIw2tAkpAAAAAElFTkSuQmCC" class="button_table"></button></td>
                        <td><button><img src="data:image/png;base64,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" class="button_table"></button></td>
                        <td><button><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAACXUlEQVRoge2Yv2tTURTHP/fd+F9UyNwOjk62FZwcLRXUkGIVR8HB1hiDQlptcXWppkjrj4AVVwdbiNVRxziIQwZXBbuJufc6RJMXY9N38076WnifKdx3cs73y/1xLhdSUlIONUoymRvnDo7be1RcVtvckKopZiCS+E5VMRORDLirJ0+DWwFGJIpG4CvWXVEP3r7eKzCIlm9fxQOMoNRKlMCIBvZVfAvF0ShhUQ0cWLw2sTuBG5aQMOpddF2HfgZSA0mTGkia1EDSiBpw2VGRGB/EDJh8ieajj9hT53eNsRNTNB9+wFxelCpLRiKJyZewM6XW7/lVAILN510xdmIKU3wCOoM9dx0AXSnGrh17Blx2DJsrhDJqzFwFOzndHrKT023x7bGz13DZsbjl48+AatTRCznMracdgTqDKa5D5gj8+om5udYlHmvQy5dQjXrc8nKXOTt+ptsEgLWAg0CHxgx6aZZgq7q7qCQuc8H2K/RCDkwzNBh4i/euK5aJkAlrej86Ky4ehtHIVJ/Z7/dtQEQNtI/K8LL5iwow86t9+8QgiBkIn/OdQdu9nAItbkLEwP/FG/TSRXT5wj8bW9aESCPrEW+a6MU8wVa1tbHvzvSamKuINLLYBlSjjn4cepD706SC2kanSG2j54jVz+6JNDKRJRRU77fuNX3O+XCf0OtlgrWyRGnZZxWXHUU1PvXPESHGpxOn70JJkxpIGl8DO0NR0c0Pn2A/A45Nr/jBeOMT7DsDBeCb5398+I6msHdYBy8D6j2faXIMxwtkl9MO8BLNcVXji2DelJSUg85vwU3YNL7U328AAAAASUVORK5CYII=" class="button_table"></button></td>
                    </tr>
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
      <h2>Ajoutez un utilisateur</h2>
      <label for="email">
        <strong>Prénom</strong>
      </label>
      <input type="text" id="email" placeholder="Prenom" name="email" required />
      <label for="psw">
        <strong>Nom</strong>
      </label>
      <input type="password" id="psw" placeholder="Nom" name="psw" required />
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