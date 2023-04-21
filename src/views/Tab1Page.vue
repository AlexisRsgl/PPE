<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Connexion</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large" class="title_color">Connexion</ion-title>
        </ion-toolbar>
      </ion-header>
      <div class="header_widht">
        <div class="img_header">
          <div class="img_top">
            <img src="../img/logo.png">
          </div>
        </div>
      </div>

      <ion-item class="item">
        <ion-label position="floating" class="radius color_label">Email</ion-label>
        <ion-input type="text" v-model="users.email" class="input"></ion-input>
        <ion-label position="floating" class="color_label">Mot de passe</ion-label>
        <ion-input type="password" v-model="users.password" class="input"></ion-input>
      </ion-item>
      <div class="button_div">
        <div class="center_button">
          <ion-button color="primary" @click="login" class="submit_connect">Se connecter</ion-button>
        </div>
      </div>
<!--
      <div id="list__users">
        <user-card v-for="(user, index) in users" :key="index" :name="user.name" :score="user.score"/>
      </div>
      -->
      <div class="line"></div>
      <div class="line_2"></div>
    </ion-content>
  </ion-page>
</template>

<script >
import {defineComponent, ref} from 'vue';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonItem, IonLabel, IonInput, IonButton } from '@ionic/vue';
//import UserCard from "@/components/UserCard";
import axios from "axios";
import {useRouter} from "vue-router";

export default defineComponent({
  name: 'Tab2Page',
  components: { IonHeader, IonToolbar, IonTitle, IonContent, IonPage, IonItem, IonLabel, IonInput, IonButton },
  setup() {

    let users = ref({});
    const msg = ref("");
    const router = useRouter();


    const verifConnexion = () => {
      if(localStorage.getItem('token') !== 'null'){

        router.push('/agence')
      }
    }
    verifConnexion();

    const login = () => {
      axios.post('http://localhost/PPE/public/index.php/api/connexion', users.value)

          .then(response => {
            localStorage.setItem('token', response.data.token)
            localStorage.setItem('user', response.data.user.id)
            router.push('/agence')

          })
          .catch(error => {
            localStorage.setItem('token', null)
            localStorage.setItem('user', null)
            msg.value = error.response.data.message;
            console.log('error')

              }


          )
    }


    return {users, login}
  }
});
</script>
