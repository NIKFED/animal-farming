<template>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <b-img
          :src="getSrcImage()"
          :style="`width: ${getWidth()}%`"
      ></b-img>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Animal',
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
    },
    getWidth() {
      let size = this.model.size;
      let maxSize = this.$store.getters.getDictItemById(
          'animal_kinds',
          this.model.animal_kind_id).max_size;
      // чтобы не были слишком маленькие
      let result = (size / maxSize) * 100;
      result =  result > 10 ? result : 10;
      return result;
    }
  }
}
</script>

<style scoped>

</style>