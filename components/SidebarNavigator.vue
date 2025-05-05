<template>
  <div class="sidebar-navigator">
    <div class="dots-container" ref="dotsContainerRef">
      <a
          v-for="(section, index) in filteredSections"
          :key="section.id"
          :href="`#${section.id}`"
          class="dot"
          :class="{ 'active': currentSectionId === section.id }"
          :data-section-id="section.id"
          :ref="el => { if (el) dotRefs[index] = el }"
          @click.prevent="scrollToSection(section.id)"
      >
        <span class="el-1"></span>
        <span class="el-2"></span>
        <span class="number">.{{index+1}}</span>
        <span class="tooltip">
          <span>{{ section.menu_label || section.title || `Sezione ${index + 1}` }}</span>
        </span>
      </a>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, watch, computed } from 'vue'
import { gsap } from 'gsap'
import { useAppState } from '~/composables/useAppState'

const props = defineProps({
  sections: {
    type: Array,
    required: true
  }
})

// Filtra solo le sezioni che hanno un menu_label
const filteredSections = computed(() => {
  return props.sections.filter(section => section.menu_label)
})

const { currentSectionId } = useAppState()
const dotsContainerRef = ref(null)
const dotRefs = ref([])

// Assicurati che dotRefs sia un array vuoto con la stessa lunghezza delle sezioni filtrate
watch(() => filteredSections.value.length, (newLength) => {
  dotRefs.value = Array(newLength).fill(null)
}, { immediate: true })

// Funzione per scorrere a una sezione specifica
const scrollToSection = (sectionId) => {
  const sectionElement = document.getElementById(sectionId)
  if (sectionElement) {
    sectionElement.scrollIntoView({ behavior: 'smooth' })

    history.pushState(null, null, '#'+sectionId);
  }
}

// Animazione per l'apparizione dei dots
const animateDotsAppearance = () => {
  gsap.set(dotRefs.value, {  opacity: 0 })

  gsap.to(dotRefs.value, {

    opacity: 1,
    duration: 1,
    stagger: 0.2,
    ease: 'back.out(3)',
    delay: 2
  })
}

// Animazione quando un dot diventa attivo
watch(() => currentSectionId.value, (newSectionId, oldSectionId) => {
  // Trova l'indice del dot attivo nella lista filtrata
  const activeIndex = filteredSections.value.findIndex(section => section.id === newSectionId)

  if (activeIndex >= 0 && dotRefs.value[activeIndex]) {
    // Animazione per il dot che diventa attivo
    gsap.to(dotRefs.value[activeIndex], {
      opacity: 0.2,
      duration: 0.6,
      ease: 'ease.inOut',
      onComplete: () => {
        gsap.to(dotRefs.value[activeIndex], {
          opacity: 1,
          duration: 0.4
        })
      }
    })

    // Se c'era un dot attivo precedentemente, riportalo alle dimensioni normali
    if (oldSectionId) {
      const oldIndex = filteredSections.value.findIndex(section => section.id === oldSectionId)
      if (oldIndex >= 0 && dotRefs.value[oldIndex]) {
        gsap.to(dotRefs.value[oldIndex], {
          scale: 1,
          duration: 0.2
        })
      }
    }
  }
}, { immediate: true })

onMounted(() => {
  animateDotsAppearance()
})
</script>

<style scoped>












</style>