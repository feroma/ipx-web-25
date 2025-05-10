<template>
  <div class="main-button-wrapper">
    <h2 v-if="content.title" v-html="content.title"/>
    <a
        :href="href"
        :class="['main-button']"
        @click="handleClick"
        :target="isExternalLink ? '_blank' : null"
        :rel="isExternalLink ? 'noopener noreferrer' : null"
    >
      <span class="label" v-html="filteredHtml"></span>
      <svg class="icon" width="34" height="36" viewBox="0 0 34 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M30.1364 35.5L3.86364 35.5C1.72981 35.5 -7.56124e-08 33.7702 -1.68885e-07 31.6364L2.69187e-06 4.36361C2.87635e-06 2.22978 1.72981 0.499973 3.86363 0.499973L23.6366 0.499972C25.6567 0.499972 27.5965 1.29106 29.0405 2.70378L31.6766 5.28287C33.1625 6.73657 34 8.72762 34 10.8063L34 31.6364C34 33.7702 32.2702 35.5 30.1364 35.5Z" fill="#002358"/>
        <path d="M20 11L27.4834 17.8571C28.1722 18.4883 28.1722 19.5117 27.4834 20.1429L20 27" stroke="#ACD1E9"/>
      </svg>

      <svg class="bg" viewBox='0 0 1669 509' fill='none' xmlns='http://www.w3.org/2000/svg'>
        <path d='M1627.29 508.5H0V0H1668.5V467.287C1668.5 471.265 1666.92 475.08 1664.11 477.893L1637.89 504.107C1635.08 506.92 1631.26 508.5 1627.29 508.5Z'/>
      </svg>
    </a>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useAppState } from '~/composables/useAppState'

const { updateCurrentSection, changeHideOverflow, changeContactForm } = useAppState()

const props = defineProps({
  content: {
    type: Object,
    required: true
  }
})

const href = computed(() => {
  return props.content.href
})

const filteredHtml = computed(() => {
  return props.content.html
})

const isExternalLink = computed(() => {
  return href.value && !href.value.startsWith('#') && !href.value.startsWith('/')
})

const isAnchorLink = computed(() => {
  return href.value && href.value.startsWith('#')
})

const handleClick = (event) => {


  changeHideOverflow(true);
  changeContactForm(true);

  // Gestisce lo scroll fluido per le ancore
  if (isAnchorLink.value) {

    event.preventDefault()
    const targetId = href.value.substring(1)
    const targetElement = document.getElementById(targetId)
    console.log(targetId)
    if (targetElement) {
      targetElement.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      })

      // Aggiorna l'URL con l'ancora senza ricaricare la pagina
      history.pushState(null, null, href.value)
    }
  }
}
</script>

<style scoped>
/* Stili invariati */
</style>