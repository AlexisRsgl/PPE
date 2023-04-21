<template>
  <tr>
    <td>{{ history.number_command }}</td>
    <td>{{ history.vehicule }}</td>
    <td>{{ history.immatriculation }}</td>
    <td>{{ history.duree }}</td>
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
        history: {
          type : Object,
          required: true
        }
      },
      setup(props,{emit}) {
        const historys =ref({
          'id' : props.history.id
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