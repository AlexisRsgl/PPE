<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                    <li class="nav-item"><a href="./fournisseurs"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Gestion des fournisseurs</span></a></li>
                @endif
                @if($role == '1' ||$role ==  '5')
                    <li class="nav-item"><a href="./fournisseurs/vehicule"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Gestion des véhicules du fournisseur</span></a></li>
                @endif
                @if($role == '1' ||$role ==  '6')
                    <li class="nav-item active"><a href="./commande"><i class="fas fa-sign-out-alt"></i><span class="menu-text">Gestion des commandes</span></a></li>
                @endif
                <div class="center_submit_nav">
                    <a href="{{ route('connexion') }}" >
                        <button class="submit_deconnexion">Déconnexion</button>
                    </a>
                </div>
            </ul>
        </nav>
    </div><section class="section_table">
        <table>
            <th>fournisseur</th>
            <tr>
                <td>

                    <select  name="fournisseur" id="fournisseur">

                        @foreach($tableauDeFournisseurs as $fournisseur)
                        <option value="{{ $fournisseur->id }}">{{ $fournisseur->name }}</option>
                        @endforeach
                    </select>

                </td>
                <td>
                    <button class="button_add open-button" type="submit" class="btn btn-success mb-3" onclick="openForm()">Selectionner</button>
                </td>
            </tr>

            </form>
        </table>

        <table>
            <tr>
                <th>Marque</th>
                <th>Immatriculation</th>
                <th>Agence attribué</th>
                <th>Date de la commande</th>
            </tr>
            @foreach($tableauDeCommandes as $commande)
                @foreach($tableauDeVehicule as $vehicule)
                    @if($vehicule->id == $commande->car_id)
            <tr>

                <td>
                    <p>{{ $vehicule->mark }} {{ $vehicule->model }}</p>

                </td>

                <td>
                    <p>{{ $vehicule->immatriculation }}</p>


                </td>
                @foreach($tableauAgences as $agence)
                    @if($agence->id == $vehicule->agency_id)
                <td> {{ $agence-> name }} {{ $agence->location }}</td>
                    @endif
                @endforeach
                @if($vehicule->agency_id == null)
                        <td> Aucune agence attribué</td>
                @endif
                <td>
                        <p>{{ $commande->date_commande }}</p>
                </td>

            </tr>
            @endif
            @endforeach
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
<!--pop-up commande-->
<div class="login-popup">
    <div class="form-popup" id="popupForm">
        <form action="{{ "creerUneCommande" }}" class="form-container">
            <h2>Commander un véhicule</h2>

            <label for="vehicule">
                <strong>Véhicule disponible</strong>
            </label><br>
            <select name="vehicule" id="vehicule">
                <option selected >VEHICULE</option>

                @foreach($tableauDeVehicule as $vehicule)

                    @if($vehicule->id  && $vehicule->order_id == null && $vehicule->vendor_id != null)

                <option date-id_fournisseur="{{ $vehicule->vendor_id }}" value="{{ $vehicule->id }}">{{ $vehicule->mark }} {{ $vehicule->model }}</option>
                    @endif

                @endforeach

            </select><br>

            <button type="submit" class="btn">Commander</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </form>
    </div>
</div>
<script>
    function openForm() {
        window.localStorage.setItem("fournisseurId",document.getElementById("fournisseur").value);
        if (localStorage.getItem("fournisseurId") != null) {
            document.getElementById("fournisseur").value = window.localStorage.getItem("fournisseurId");

        }
        let Select = document.querySelectorAll('#vehicule option');
        Select.forEach(datas =>{
            if(parseInt(datas.getAttribute('date-id_fournisseur')) != localStorage.getItem('fournisseurId')){
                datas.style.display = 'none';
            }
        })
        document.getElementById("popupForm").style.display = "block";
    }

    function closeForm() {
        document.querySelectorAll('#vehicule option').forEach(datas =>{
            datas.style.display  = 'block';
        })
        document.getElementById("popupForm").style.display = "none";
    }
</script>

</body>
</html>
