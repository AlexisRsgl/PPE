<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Liste des agences disponible</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large" class="title_color">Rechercher un véhicule</ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-item class="item table_agence">
        <table>
          <th>Agence</th>
          <th>Localisation</th>
          <th>Véhicules</th>
          <Agence-item v-for="(agence, index) in agences" :key="index" :agence="agence"
                       @vehiculeDisponible="vehiculeDisponible(agence.id)"/>
        </table>

      </ion-item>

      <br>
      <div class="width_max">
        <div class="button_history">
          <ion-button @click="history()">Historique des commandes</ion-button>
        </div>
      </div>
      <br>
      <div class="width_max"> 
        <div class="block_search">
          <ion-input type="text" v-model="searche" class="input input_search" placeholder="rechercher"></ion-input>
          <ion-button @click="search()">Chercher une commande</ion-button>
        </div>
      </div>
     
      <ion-item v-if="vehiculeReseach[0]">
        <table>
          <th>N° </th>

          <th>Véhicule </th>
          <th>Immatriculation</th>
          <th>Date Commande</th>
          <tr>
            <td>{{ vehiculeReseach[0].numero_command }}</td>
            <td>{{ vehiculeReseach[0].mark }} {{ vehiculeReseach[0].model }}</td>
            <td>{{ vehiculeReseach[0].immatriculation }}</td>
            <td>{{ vehiculeReseach[0].created_at }}</td>
          </tr>
        </table>
      </ion-item>
      <br>
      <br>
      <center>
      <ion-button @click="deconnect()" class="deconect">Deconnexion</ion-button>
      </center>
      <div class="line"></div>
      <div class="line_2"></div>
    </ion-content>
  </ion-page>
</template>

<script>
import {defineComponent, ref} from 'vue';
import {IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonItem, IonButton, IonInput} from '@ionic/vue';
import axios from "axios";
import AgenceItem from "@/components/AgenceItem";
import {useRouter} from "vue-router";

export default defineComponent({
  name: 'Tab2Page',
  components: {IonHeader, IonToolbar, IonTitle, IonContent, IonPage, IonItem, IonButton, IonInput, AgenceItem},
  setup() {
    let agences = ref([]);
    let vehiculeReseach = ref([]);
    const msg = ref("");
    const searche = ref("");
    let name = ref("")
    const agence = ref({})
    const router = useRouter()

    const deconnect = () => {
      localStorage.setItem('token', null)
      localStorage.setItem('user', null)
      router.push('connexion')
    }
    const history = () => {

      router.push('historique/commande')
    }
    const search = () => {
      axios.get('http://localhost/PPE/public/index.php/api/cars-by-number-command/' + searche.value)
          .then(response => {

            vehiculeReseach.value = response.data[0]
            console.log(vehiculeReseach.value)

          })
    }

    const getAgences = () => {
      axios.get('http://localhost/PPE/public/index.php/api/agencies')
          .then(response => {
       //     console.log(response.data)
            msg.value = response.status
            agences.value = response.data


          })
    }

    getAgences()

    const vehiculeDisponible = (agenceId) => {
      router.push({ path: `/agence/${agenceId}/vehicule`})

      //todo router vers la pages des voitures de l'agence
    }
    return {name, agences, getAgences, msg, deconnect, agence, vehiculeDisponible, search, history, searche, vehiculeReseach}
  }
});
</script>
