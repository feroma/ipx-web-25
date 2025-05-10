<template>
  <div class="image-wrapper">
<!--    <nuxt-img-->
<!--      :src="currentSrc"-->
<!--      :alt="alt"-->
<!--      :width="width"-->
<!--      :height="height"-->
<!--      :placeholder="placeholder"-->
<!--      :loading="loading"-->
<!--      :quality="quality"-->
<!--      :class="imageClass"-->
<!--    />-->
    <nuxt-img
        :src="currentSrc"
        :alt="alt"
        :width="width"
        :height="height"
        :placeholder="placeholder"
        :loading="loading"

        :class="imageClass"
    />
  </div>
</template>

<script setup>
import { computed, ref, onMounted, onUnmounted } from 'vue';

// Props per il componente
const props = defineProps({
  // URL immagini per diverse risoluzioni
  mobileImg: {
    type: String,
    //required: true
  },
  tabletImg: {
    type: String,
    //required: true
  },
  desktopImg: {
    type: String,
    required: true 
  },
  // Breakpoints per determinare quando cambiare immagine
  mobileBreakpoint: {
    type: Number,
    default: 1023
  },
  tabletBreakpoint: {
    type: Number,
    default: 1024
  },
  // Altri attributi per <nuxt-img>
  alt: {
    type: String,
    default: ''
  },
  width: {
    type: [Number, String],
    default: undefined
  },
  height: {
    type: [Number, String],
    default: undefined
  },
  placeholder: {
    type: [Boolean, String],
    default: false
  },
  loading: {
    type: String,
    default: 'lazy'
  },
  quality: {
    type: [Number, String],
    default: 80
  },
  imageClass: {
    type: String,
    default: ''
  }
});

// Stato per tenere traccia della larghezza della finestra
const windowWidth = ref(0);

// Funzione per aggiornare la larghezza dello schermo
const updateWindowWidth = () => {
  windowWidth.value = window.innerWidth;
};

// Determinare quale sorgente immagine usare in base alla larghezza dello schermo
const currentSrc = computed(() => {
  if(!props.mobileImg && !props.tabletImg){
    return props.desktopImg;
  }
  if (windowWidth.value <= props.mobileBreakpoint) {
    return props.mobileImg;
  } else if (windowWidth.value <= props.tabletBreakpoint) {
    return props.tabletImg;
  } else {
    return props.desktopImg;
  }
});

// Imposta la larghezza iniziale e aggiungi event listener per il resize
// solo sul lato client (browser)
onMounted(() => {
  if (process.client) {
    updateWindowWidth();
    console.log('windowWidth '+windowWidth.value)
    window.addEventListener('resize', updateWindowWidth);
  }
});

// Rimuovi l'event listener quando il componente viene distrutto
onUnmounted(() => {
  if (process.client) {
    window.removeEventListener('resize', updateWindowWidth);
  }
});
</script>

<style scoped>

</style>
