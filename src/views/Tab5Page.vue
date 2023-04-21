<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Liste des véhicules disponible</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large" class="title_color">Rechercher un véhicule</ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-item class="item">
        <table>
          <th>Marque</th>
          <th>Modèle</th>
          <th>Immatriculation</th>
          <Vehicule-item  v-for="(vehicule, index) in vehicules" :key="index" :vehicule="vehicule" @vehiculeChoice="vehiculeChoice(vehicule.id)" />
        </table>

      </ion-item>
      <p>{{ msg ?? '' }}</p>
      <ion-button @click="retour()">Retour</ion-button>
      <ion-button @click="deconnect()">Deconnexion</ion-button>

      <table>
        <th>Commande N°</th>
        <th>Véhicule</th>
        <tr>
          <td></td>
          <td></td>
        </tr>
      </table>
      <p> {{ agenceChoice }}</p>
      <div class="line"></div>
      <div class="line_2"></div>
    </ion-content>
  </ion-page>
</template>

<script>
import {defineComponent, ref} from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonItem, IonButton } from '@ionic/vue';
import axios from "axios";
import {useRouter, useRoute} from "vue-router";
import VehiculeItem from "@/components/VehiculeItem";

export default defineComponent({
  name: 'Tab5Page',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage, IonItem, IonButton, VehiculeItem
  },
  setup() {
    let vehicules = ref([])
    const msg = ref("");
    let name = ref("")

    const router = useRouter()
    const route = useRoute()

    const deconnect = () => {
      localStorage.setItem('token', null)
      localStorage.setItem('user', null)
      router.push('connexion')
    }

    const retour = () => {
      router.back()
    }

    const getVehicules = () => {
      axios.post('http://localhost/PPE/public/index.php/api/cars-only-mobile', { "agency_id" : route.params.agenceId })
          .then(response => {
            console.log(response.data)
            msg.value = response.status
            vehicules.value = response.data
          })
    }

    getVehicules()

    const vehiculeChoice = (vehiculeId) =>{
      router.push({ path: `/commande/${vehiculeId}`})
      //todo router vers la pages pour commander
    }

    return { name, vehicules, getVehicules, msg, deconnect, retour, vehiculeChoice}
  }
});
</script>
