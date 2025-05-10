<template>
  <div id="menu-overlay" :class="!menuMobileOpen?'closed':'opened'">
    <span  @click.prevent="closeMenu()"  class="menu-overlay-bg"/>
    <ul class="menu-overlay-list" ref="dotsContainerRef">
      <li><h3>In this page:</h3></li>
      <li
          v-for="(section, index) in filteredSections"
          :key="'menu-overlay-item-'+section.id"
          class="menu-overlay-item"
          :class="{ 'active': currentSectionId === section.id }"
          :data-section-id="section.id"
          :ref="el => { if (el) dotRefs[index] = el }">
        <a @click.prevent="scrollToSection(section.id)"
           :href="`#${section.id}`">
          <span class="el-1"></span>
          <span class="el-2"></span>
<!--          <span class="number">.{{ index + 1 }}</span>-->
          <span class="tooltip">
          <span>{{ section.menu_label || section.title || `Sezione ${index + 1}` }}</span>
        </span>
        </a>
      </li>

    </ul>
    <a @click.prevent="closeMenu()" href="#" class="close-menu">
      <span>Close</span>
      <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 11L14.5 22.5H34.5L46 11" stroke-width="2"/>
        <path d="M46 37.5L34.5 26L14.5 26L3 37.5"  stroke-width="2"/>
      </svg>
    </a>
    <div id="mxr-menu-logo">
      <mxr-logo/>
    </div>

  </div>
</template>

<script setup>
import {ref, onMounted, watch, computed} from 'vue'
import {gsap} from 'gsap'
import {useAppState} from '~/composables/useAppState'
import MxrLogo from "~/components/MxrLogo.vue"
const {changeMenuMobileStatus, menuMobileOpen} = useAppState()

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

const {currentSectionId} = useAppState()
const dotsContainerRef = ref(null)
const dotRefs = ref([])

// Assicurati che dotRefs sia un array vuoto con la stessa lunghezza delle sezioni filtrate
watch(() => filteredSections.value.length, (newLength) => {
  dotRefs.value = Array(newLength).fill(null)
}, {immediate: true})


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
}, {immediate: true})

// Funzione per scorrere a una sezione specifica
const scrollToSection = (sectionId) => {
  const sectionElement = document.getElementById(sectionId)
  if (sectionElement) {
    sectionElement.scrollIntoView({behavior: 'smooth'})
    changeMenuMobileStatus(false)
    history.pushState(null, null, '#' + sectionId)
  }
}
const closeMenu = () => {
  changeMenuMobileStatus(false)
}


onMounted(() => {

})
</script>

<style scoped>


</style>