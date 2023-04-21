<template>
  <tr>
    <td>{{ agence.name }}</td>
    <td>{{ agence.location }}</td>
    <ion-button color="primary" @click="vehiculeDisponible(agence.id)">Voir véhicules disponibles</ion-button>
  </tr>
</template>

<script>
import {defineComponent, ref} from "vue";
import { IonButton } from '@ionic/vue';

export default defineComponent(
    {
      name: "AgenceItem",
      components: {IonButton},
      props: {
        agence: {
          type : Object,
          required: true
        }
      },
      setup(props,{emit}) {
        const agences =ref({
          'id' : props.agence.id
        })
        const vehiculeDisponible = (id) =>{
          localStorage.setItem('agenceChoice', id)
          emit('vehiculeDisponible',id)
        }
        return {agences,vehiculeDisponible}
      }
    }
)
</script>