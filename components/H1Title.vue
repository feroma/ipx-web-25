<script setup>
const {title} = defineProps(['title'])
const spannedTitle = computed(() => {
  let output = ''
  for (let i = 0; i < title.length; i++) {
    output += `<span>${title.charAt(i)}</span>`
  }
  return output
})

/**
 * --------------gsap
 */
import {onMounted, onUnmounted} from 'vue'
import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'
// Registra il plugin ScrollTrigger
if (process.client) {
  gsap.registerPlugin(ScrollTrigger)
}

</script>

<template>
  <h1 v-html="spannedTitle"></h1>
</template>

<style scoped>

</style>