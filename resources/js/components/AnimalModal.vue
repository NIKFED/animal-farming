<template>
  <b-modal
      id="AnimalModal"
      ref="AnimalModal"
      title="Add animal"
      ok-title="Save"
      cancel-title="Cancel"
      @ok="add"
  >
    <b-form-group label="Имя">
      <b-form-input v-model="newModel.name" />
    </b-form-group>
    <b-form-group label="Возраст">
      <b-form-input v-model="newModel.age" type="number" size="sm"/>
    </b-form-group>
    <b-form-group label="Размер">
      <b-form-input v-model="newModel.size" type="number" size="sm"/>
    </b-form-group>
    <b-form-group label="Вид">
      <b-form-select
          v-model="newModel.animal_kind_id"
          :options="kinds"
          value-field="id"
          text-field="name" />
    </b-form-group>
  </b-modal>
</template>

<script>
import AnimalResource from "../resources/animal";

export default {
  name: "AnimalModal",
  data() {
    return {
      newModel: {
        name: '',
        age: 1,
        size: 1,
        animal_kind_id: null
      }
    }
  },

  computed: {
    kinds() {
      return this.$store.getters.getDict('animal_kinds');
    }
  },

  methods: {
    async add() {
      await AnimalResource.save(this.newModel);
      this.$emit('on-update');
    }
  }
}
</script>

<style scoped>

</style>