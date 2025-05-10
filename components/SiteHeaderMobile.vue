<script setup>
import {ref, onMounted, onUnmounted} from 'vue'
import {gsap} from 'gsap'
import SiteHeaderMenu from "~/components/SiteHeaderMenu.vue"
//import { toggleMenuStatus } from '~/composables/useAppState'
import { useAppState } from '~/composables/useAppState'
const {changeMenuMobileStatus, menuMobileOpen, currentSectionId} = useAppState()

const props = defineProps({
  sections: {
    type: Array,
    required: true
  }
})
// Riferimento all'elemento da animare
const logoEl1 = ref(null)
const logoEl = ref(null)
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
// Configura lo stato iniziale e la logica di scroll
const setupScrollAnimation = () => {
  // Reimposta lo stato originale
  gsap.set(logoEl1.value, {width: 'auto'})
  // Funzione per gestire lo scroll
  const handleScroll = () => {
    const scrollPosition = window.scrollY

    if (scrollPosition > 100 && !isLastSection.value) {
      // Riduci la larghezza a 0 quando lo scroll supera i 100px
      gsap.to(logoEl1.value, {
        width: 0,
        x: -200,
        opacity: 0,
        duration: 0.5,
        ease: 'linear'
      })
      gsap.to(logoEl.value, {
        x: -30,
        duration: 0.7,
        ease: 'ease.inOut'
      })



    } else {
      // Ripristina la larghezza quando lo scroll è inferiore a 100px
      gsap.to(logoEl1.value, {
        width: 'auto',
        x: 0,
        opacity: 1,
        duration: 0.5,
        ease: 'linear'
      })
      gsap.to(logoEl.value, {
        x: 0,
        duration: 0.7,
        ease: 'ease.inOut'
      })

    }


  }

  // Aggiungi l'event listener per lo scroll
  window.addEventListener('scroll', handleScroll)

  // Pulisci l'event listener quando il componente viene smontato
  onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
    changeMenuMobileStatus(false)
  })
}

// Imposta l'animazione quando il componente è montato
onMounted(() => {
  setupScrollAnimation()
  changeMenuMobileStatus(false)
})
</script>

<template>
  <div id="header-mobile">
    <div class="container">
      <div class="row">
        <div class="col d-flex justify-content-between">

          <div id="iperformx_header_logo_mobile">
            <div class="el-1" ref="logoEl1">
              <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 279 44">
                <path id="m" class="st0" d="M272.3,11.1h3.3v20.2h-3.8v-15.2l-14.3,11.3h-2.2l-14.3-11.3v15.2h-3.8V11.1h3.5l15.8,12.9,15.7-12.9h0Z"/>
                <path id="r2" class="st0" d="M231.4,31.3h-4.8l-6.8-7.6h-15.7v7.6h-3.9V11.1h25.7c3.3,0,4.8,1.4,4.8,4.8v2.8c0,3.4-1.4,4.8-4.8,4.8h-1.4c0,.1,7,7.8,7,7.8h0ZM204,14v7h20.2c1.9,0,2.4-.5,2.4-2.4v-2.2c0-1.9-.6-2.4-2.4-2.4h-20.2Z"/>
                <path id="o" class="st0" d="M166.7,31.3c-3.7,0-5.3-1.7-5.3-5.4v-9.5c0-3.7,1.7-5.4,5.3-5.4h21.2c3.7,0,5.3,1.7,5.3,5.4v9.5c0,3.7-1.7,5.4-5.3,5.4h-21.2ZM186.5,28.1c2.1,0,2.9-.8,2.9-2.9v-8.1c0-2.1-.8-2.9-2.9-2.9h-18.3c-2.1,0-2.9.7-2.9,2.9v8.1c0,2.2.8,2.9,2.9,2.9h18.3Z"/>
                <path id="f" class="st0" d="M155.9,14.4h-24.3v5.7h23.2v3.1h-23.2v8.2h-3.9V11.1h28.2v3.2h0Z"/>
                <path id="r" class="st0" d="M121.7,31.3h-4.8l-6.8-7.6h-15.7v7.6h-3.9V11.1h25.7c3.3,0,4.8,1.4,4.8,4.8v2.8c0,3.4-1.4,4.8-4.8,4.8h-1.4c0,.1,7,7.8,7,7.8h0ZM94.3,14v7h20.2c1.9,0,2.4-.5,2.4-2.4v-2.2c0-1.9-.6-2.4-2.4-2.4h-20.2Z"/>
                <path id="e" class="st0" d="M59.3,28.2h24.9v3.1h-28.8V11.1h28.5v3.1h-24.6v5.2h23.4v2.8h-23.4v6h0Z"/>
                <path id="p" class="st0" d="M18.8,31.3V11.1h25.7c3.3,0,4.8,1.4,4.8,4.8v3.7c0,3.4-1.4,4.8-4.8,4.8h-21.8v6.9h-3.9ZM22.7,21.6h20.2c1.9,0,2.4-.5,2.4-2.4v-2.7c0-1.9-.6-2.4-2.4-2.4h-20.2v7.5Z"/>
                <path id="i" class="st0" d="M0,11.1h4v20.2H0V11.1ZM0,0h4v7.1H0V0Z"/>
              </svg>
            </div>
            <div class="el-2" ref="logoEl">
              <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 74 44">
                <path id="bottom" class="st0" d="M55.9,27.8c-1.5-1.5-3.5-2.4-5.7-2.4h-21.2c-2.1,0-4.2.9-5.7,2.4l-15.8,16h4.5l13.5-13.7c.9-.9,2.2-1.4,3.4-1.4h21.2c1.3,0,2.5.5,3.4,1.4l13.6,13.7h4.6l-15.8-16h0Z"/>
                <path id="center" class="st0" d="M69.1,0l-18.1,18.2c-1.3,1.3-3.2,2.1-5.1,2.1h-18.3s0,0,0,0c-2.8,0-5.4,1.1-7.3,3L0,43.8h4.6l18.1-18.1c1.4-1.4,3.2-2.1,5.1-2.1h18.3s0,0,0,0c2.7,0,5.4-1.1,7.4-3.1L73.7,0h-4.6Z"/>
                <path id="top" class="st0" d="M17.8,16c1.5,1.5,3.5,2.4,5.7,2.4h21.1c2.2,0,4.2-.8,5.7-2.4L66.2,0h-4.6l-13.6,13.7c-.9.9-2.1,1.4-3.4,1.4h-21.1c-1.3,0-2.5-.5-3.4-1.4L6.5,0H1.9l15.9,16Z"/>
              </svg>
            </div>
          </div>



          <div class="header_icon" :class="menuMobileOpen?'closed':'opened'">
            <svg @click.prevent="changeMenuMobileStatus(true)" width="90" height="48" viewBox="0 0 90 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect y="14.4825" width="90" height="3" fill="white"/>
              <rect x="30" y="22.4825" width="60" height="3" fill="white"/>
              <rect x="30" y="30.4825" width="60" height="3" fill="white"/>
            </svg>
          </div>




        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>