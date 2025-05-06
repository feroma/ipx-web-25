<template>

    <div class="main-menu" ref="itemContainerRef">
      <a
          v-for="(section, index) in filteredSections"
          :key="section.id"
          :href="`#${section.id}`"
          class="menu-item"
          :class="{ 'active': currentSectionId === section.id }"
          :data-section-id="section.id"
          :ref="el => { if (el) dotRefs[index] = el }"
          @click.prevent="scrollToSection(section.id)"
      >

          <span>{{ section.menu_label || section.title || `Sezione ${index + 1}` }}</span>

      </a>
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
const itemContainerRef = ref(null)
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
    duration: 0.4,
    stagger: 0.2,
    ease: 'ease.Out',
    delay: 1
  })
}


onMounted(() => {
  animateDotsAppearance()
})
</script>

<style scoped>












</style>