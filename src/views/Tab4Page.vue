<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Historique des commandes</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Historique des commandes</ion-title>
        </ion-toolbar>
      </ion-header>

      <ion-item>

        <table>
          <th>N° </th>

          <th>Véhicule </th>
          <th>Immatriculation</th>
          <th>Date Commande</th>
          <tr v-for="(history, index) in historys" :key="index">
            <td>{{ history.numero_command }}</td>
            <td>{{ history.mark }} {{ history.model }}</td>
            <td>{{ history.immatriculation }}</td>
            <td>{{ history.created_at }}</td>
          </tr>
        </table>
      </ion-item>
      <br>
      <br>
      <div class="button_div">
        <div class="center_button">
          <ion-button @click="retour()">Retour</ion-button>
        </div>
      </div>
      <center>
        <ion-button @click="deconnect()">Deconnexion</ion-button>
      </center>
      <div class="line"></div>
      <div class="line_2"></div>
    </ion-content>


  </ion-page>
</template>

<script>
import {defineComponent, ref} from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonItem, IonButton } from '@ionic/vue';
import {useRouter} from "vue-router/dist/vue-router";
import axios from "axios";

export default defineComponent({
  name: 'Tab3Page',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage, IonItem, IonButton },

  setup() {
    let historys = ref([])
    const router = useRouter()

    const retour = () => {
      router.back()
    }


        const findCommands = () => {
        //  localStorage.setItem("command",commands.value.debut)
          axios.get('http://localhost/PPE/public/index.php/api/cars-by-user-id/' + localStorage.getItem('user'))
              .then(response => {

                console.log(response.data)

                historys.value = response.data["0"]
           //     console.log(historys.value.prenom)
              //  localStorage.setItem('command', null)
              //  localStorage.setItem('vehiculeChoice', null)
              //  localStorage.setItem('agenceChoice', null)
              //  router.push("../historique/commande")
              })
        /*  commands.value.push({
            command: command.value,

            //    car: car.value
          }) */
        }

    findCommands()
    const deconnect = () => {
      localStorage.setItem('token', null)
      localStorage.setItem('user', null)
      router.push('connexion')
    }
    return {deconnect, retour,findCommands, historys}
  }
});



</script>

<style scoped>
#list__cities div {
  padding: 10px;
  background: #d4d4d4;
  border-radius: 8px;
  margin: 5px;
  color: #282828
}
</style>


