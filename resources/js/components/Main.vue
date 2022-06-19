<template>
  <div>
    <div class="ml-2 mt-2">
      <b-list-group horizontal>
        <b-list-group-item class="d-flex align-items-center">
          <b-button @click="showAnimalModalAdd" variant="dark" class="rounded-circle px-2 d-flex align-items-center">
            <b-icon icon="plus" scale="2"></b-icon>
          </b-button>
        </b-list-group-item>
        <b-list-group-item
            v-for="animal in animals"
            :id="`card-${animal.id}`"
            :key="animal.id"
            @click="selectAnimal(animal.id)"
        >
          <animal-card :model="animal"></animal-card>
        </b-list-group-item>
      </b-list-group>
    </div>

    <div class="container mt-2">
      <div class="row">
        <div class="col-md-6"
             v-for="animal in animals"
             :id="`animal-${animal.id}`"
             :key="animal.id"
             v-show="false"
        >
          <animal :model="animal"></animal>
        </div>
      </div>
    </div>
    <animal-modal
        @on-update="fetchData"
        @on-close="fetchData"
    />
  </div>
</template>

<script>
import AnimalResource from '../resources/animal';
import AnimalCard from './AnimalCard';
import AnimalModal from "./AnimalModal";
import Animal from "./Animal";

export default {
  name: 'AnimalFarming',
  components: { AnimalCard, AnimalModal, Animal },
  data() {
    return {
      animals: []
    }
  },

  async mounted() {
    await this.fetchData();
    // this.selectedAnimals = new Map();
    // this.$store.commit('increment')
  },

  methods: {
    async fetchData() {
      this.animals = await AnimalResource.fetch();
    },

    showAnimalModalAdd() {
      this.$bvModal.show('AnimalModal');
    },

    selectAnimal(animalId) {
      this.changeColorCard(animalId);
      // if (this.selectedAnimals.get(animal.id)) {
      //   this.selectedAnimals.delete(animal.id);
      // } else {
      //   this.selectedAnimals.set(animal.id, animal);
      // }
      this.changeVisibleFullCard(animalId);

    },

    changeColorCard(id) {
      let card = document.getElementById('card-' + id);
      if (card.style.background === 'grey') {
        card.style.background = null;
      } else {
        card.style.background = 'grey';
      }
    },

    changeVisibleFullCard(id) {
      let fullCard = document.getElementById('animal-' + id);
      if (fullCard.style.display === 'none') {
        fullCard.style.display = 'block';
      } else {
        fullCard.style.display = 'none';
      }
    }
  }
}
</script>