<script setup>
const props = defineProps({
  sections: {
    type: Array,
    required: true
  }
})
import { useAppState } from '~/composables/useAppState'
const {currentSectionId, config} = useAppState()
// Computed property che verifica se la sezione corrente è l'ultima dell'array
const isLastSection = computed(() => {
  // Verifica che le sezioni e l'ID corrente esistano
  if (!props.sections || !props.sections.length || !currentSectionId.value) {
    return false;
  }

  // L'ultima sezione dell'array
  const lastSection = props.sections[props.sections.length - 1];

  // Confronta l'ID dell'ultima sezione con l'ID corrente
  return lastSection.id === currentSectionId.value;
})
const lastSectionId = computed(() => {
  if (!props.sections || !props.sections.length || !currentSectionId.value) {
    return false;
  }

  // L'ultima sezione dell'array
  const lastSection = props.sections[props.sections.length - 1];
  return lastSection.id
})

// Funzione per scorrere a una sezione specifica
const scrollToSection = (sectionId) => {
  const sectionElement = document.getElementById(sectionId)
  if (sectionElement) {
    sectionElement.scrollIntoView({ behavior: 'smooth' })

    history.pushState(null, null, '#'+sectionId);
  }
}

</script>


<template>
  <div id="footer-mobile" :class="{'last': isLastSection}">
<!--    <div>ID sezione: {{ currentSectionId }}</div>-->
<!--    <div v-if="isLastSection" class="status-text">-->
<!--      Questa è l'ultima sezione-->
<!--    </div>-->
<!--    <div v-else class="status-text">-->
<!--      Non è l'ultima sezione-->
<!--    </div>-->
    <p>{{config.COPYRIGHT}}</p>


  </div>
</template>

<style scoped>




.status-text {
  position: relative;
  z-index: 2;
  margin-bottom: 10px;
}
</style>