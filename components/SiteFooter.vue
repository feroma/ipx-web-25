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
  <div id="footer" :class="{'last': isLastSection}">
<!--    <div>ID sezione: {{ currentSectionId }}</div>-->
<!--    <div v-if="isLastSection" class="status-text">-->
<!--      Questa è l'ultima sezione-->
<!--    </div>-->
<!--    <div v-else class="status-text">-->
<!--      Non è l'ultima sezione-->
<!--    </div>-->
    <p>{{config.COPYRIGHT}}</p>
    <a @click.prevent="scrollToSection(lastSectionId)"
       :href="`#${lastSectionId}`">
        <span  v-html="config.FOOTER_LINK"></span>
        <svg width="31" height="67" viewBox="0 0 31 67" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 1.18066L26.2487 26.4294C30.154 30.3346 30.154 36.6663 26.2487 40.5715L1 65.8202" stroke-width="2"/>
        </svg>
    </a>
    <svg
        width="1920"
        height="131"
        viewBox="0 0 1920 131"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
    >
      <mask class="footer-mask" :class="{'mask-reduced': isLastSection}" id="mask0_314_7353" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="1920" height="131">
        <rect :class="{'rect-reduced': isLastSection}" width="1920" height="131" fill="#D9D9D9"/>
      </mask>
      <g mask="url(#mask0_314_7353)">
        <path d="M1920.49 0V131H32L67.0869 101.15C72.5123 96.5348 79.4033 94 86.5264 94H1541.06C1549.02 94 1556.65 90.839 1562.28 85.2129L1638.7 8.78711C1644.33 3.16102 1651.96 0 1659.92 0H1920.49Z" />
      </g>
    </svg>


  </div>
</template>

<style scoped>




.status-text {
  position: relative;
  z-index: 2;
  margin-bottom: 10px;
}
</style>