<template>
  <div id="user__card">
    <p>Agence: {{ name }}</p>
    <p>Véhicule: {{ car }}</p>
  </div>
</template>

<script>
export default {
  name: "UserCard.vue",
  props: {
    name: String,
    car: String
  }
}
</script>

<style scoped lang="scss">
#user__card {
  border: 1px solid black;
  border-radius: 5px;

  p:first-child {
    color: red;
  }
}
</style>