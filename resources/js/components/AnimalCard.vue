<template>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <small v-if="model">
        {{ model.name }}
      </small>
    </div>
    <div class="row d-flex justify-content-center">
      <b-img
          :src="getSrcImage()"
          width="50" height="50"
      ></b-img>
    </div>
  </div>
</template>

<script>
export default {
  name: 'AnimalCard',
  props: {
    model: {
      type: Object,
      default: null
    }
  },

  methods: {
    getSrcImage() {
      switch (this.model.animal_kind_id) {
        case 1:
          return 'images/bear.png';
        case 2:
          return 'images/hare.png';
        case 3:
          return 'images/lion.png';
        case 4:
          return 'images/mouse.png';
        case 5:
          return 'images/panda.png';
        case 6:
          return 'images/pig.png';
      }
    }
  }
}
</script>

<style scoped>

</style>