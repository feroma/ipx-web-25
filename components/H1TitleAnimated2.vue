<!-- TitleAnimated.vue -->
<template>
  <h1 ref="titleContainer" class="title-animated relative overflow-hidden text-4xl font-bold py-4">
    <span
        v-for="(char, index) in chars"
        :key="index"
        class="title-char inline-block relative overflow-hidden"
    >
      <!-- Lettera effettiva -->
      <span
          class="title-letter relative z-10 inline-block"
          :ref="el => letterRefs[index] = el"
      >{{ char }}</span>

      <!-- Blocco bianco che copre la lettera -->
      <span
          class="title-block absolute top-0 left-0 w-full h-full bg-white"
          :ref="el => blockRefs[index] = el"
      ></span>
    </span>
  </h1>
</template>

<style scoped>

</style>

<script setup>
import { ref, onMounted } from 'vue'
import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'

// Props
const props = defineProps({
  text: {
    type: String,
    required: true
  },
  // Aggiungiamo props per personalizzazione
  textColor: {
    type: String,
    default: 'currentColor'
  },
  blockColor: {
    type: String,
    default: 'white'
  }
})

// Refs
const titleContainer = ref(null)
const letterRefs = ref([])
const blockRefs = ref([])
const chars = props.text.split('')

// Registra ScrollTrigger
gsap.registerPlugin(ScrollTrigger)

onMounted(() => {
  // Applica i colori personalizzati
  gsap.set(letterRefs.value, {
    opacity: 0,
    color: props.textColor,
    x:10,
  })

  gsap.set(blockRefs.value, {
    scaleX: 0,
    backgroundColor: props.blockColor
  })

  // Timeline per l'animazione
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: titleContainer.value,
      start: "top bottom-=100",
      toggleActions: "play none none reverse",
      // markers: true // Decommentare per debug
    }
  })

  // Step 1: Fai apparire i blocchi bianchi in sequenza
  chars.forEach((_, index) => {
    tl.to(blockRefs.value[index], {
      scaleX: 1,
      duration: 0.2,
      ease: "power2.inOut"
    }, index * 0.02)
  })

  // Step 2: Rivela le lettere e rimuovi i blocchi bianchi
  chars.forEach((_, index) => {
    tl.to(letterRefs.value[index], {
      opacity: 1,
      x:0,
      duration: 0.2
    }, `>-0.1`)
        .to(blockRefs.value[index], {
          scaleX: 0,
          opacity:0,
          transformOrigin: "center",
          duration: 0.2,
          ease: "power2.inOut"
        }, "<")
  })
})
</script>