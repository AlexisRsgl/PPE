<template>
  <tr>
    <td>{{ vehicule.mark }}</td>
    <td>{{ vehicule.model }}</td>
    <td>{{ vehicule.immatriculation }}</td>
    <ion-button color="primary" @click="vehiculeChoice(vehicule.id)">Commander</ion-button>
  </tr>
</template>


<script>
import {defineComponent, ref} from "vue";
import { IonButton } from '@ionic/vue';

export default defineComponent(
    {
      name: "VehiculeItem",
      components: {IonButton},
      props: {
        vehicule: {
          type : Object,
          required: true
        }
      },
      setup(props,{emit}) {
        const vehicules =ref({
          'id' : props.vehicule.id
        })
        const vehiculeChoice = (id) =>{
          localStorage.setItem('vehiculeChoice', id)

          emit('vehiculeChoice',id)
        }
        return {vehicules,vehiculeChoice}
      }
    }
)
</script>