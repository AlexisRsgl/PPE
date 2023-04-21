<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Commande</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Commande</ion-title>
        </ion-toolbar>
      </ion-header>
      <p>Choisissez une agence afin de sélectionner un véhicule</p>
      <form>
      <ion-item>
        <ion-label position="floating" class="radius color_label">Nom</ion-label>
        <ion-input type="text" v-model="commands.nom" class="input"></ion-input>
        <ion-label position="floating" class="color_label">Prénom</ion-label>
        <ion-input type="text" v-model="commands.prenom" class="input"></ion-input>
        <ion-label position="floating" class="color_label">Email</ion-label>
        <ion-input type="email" v-model="commands.email" class="input"></ion-input>
        <ion-label position="floating" class="color_label">Début</ion-label>
        <ion-input type="date" v-model="commands.debut" class="input"></ion-input>
        <ion-label position="floating" class="color_label">Fin</ion-label>
        <ion-input type="date" v-model="commands.fin" class="input"></ion-input>
      </ion-item>
      <div id="button_block">
        <div id="center_button">
          <ion-button color="primary" @click="retour" class="command_button">Retour</ion-button>
          <ion-button color="primary"  v-on:click="addCommande" class="command_button">Commander</ion-button>
        </div>
      </div>
      </form>
      <div id="list__users">
        <user-card v-for="(user, index) in users" :key="index" :name="user.agence" :car="user.car"/>
      </div>
      <div class="line"></div>
      <div class="line_2"></div>
    </ion-content>
   
  </ion-page>
</template>

<script>
import {defineComponent, ref} from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonItem, IonButton, IonLabel, IonInput } from '@ionic/vue';
import UserCard from "@/components/UserCard";
import axios from "axios";
import { useRouter} from "vue-router/dist/vue-router";

export default defineComponent({
  name: 'Tab2Page',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage, IonItem, IonButton, UserCard, IonLabel, IonInput },
  submitForm() {
    // Utilisez les variables nom et email ici pour envoyer les données à votre serveur ou effectuer une autre action
    console.log('Nom:', this.commands)
  },
  setup() {


    const router = useRouter()
    let commands = ref([])
    let command = ref('')
    let car = ref("");

//route.params.agenceId
    const addCommande = () => {
      localStorage.setItem("command",commands.value.debut)
      axios.post('http://localhost/PPE/public/index.php/api/commandes/car/mobile', { "nom" : commands.value.nom,
        "prenom" : commands.value.prenom,
        "email" : commands.value.email,
        "date_debut" : commands.value.debut,
        "date_fin" : commands.value.fin,
        "vehicule_id" : localStorage.getItem('vehiculeChoice'),
        "user_id" : localStorage.getItem('user')
      })
          .then(response => {

            console.log(response.data)
            localStorage.setItem('command', null)
            localStorage.setItem('vehiculeChoice', null)
            localStorage.setItem('agenceChoice', null)
            router.push("../historique/commande")
          })
      commands.value.push({
        command: command.value,

    //    car: car.value
      })

 //     commands.value = ''
  //    car.value = ''
    }
    const retour = () => {
      router.back()
    }


    const resetUser = () => {
      commands.value = []
    }

    return {commands, car, addCommande, resetUser, retour}
  }
});

  
</script>
