<template>
  <div class="layout">
    <main>
      <slot />
    </main>
    <div
        id="debug_grid"
        v-show="showDebugGrid"
        class="debug-grid"
    >
      <div class="container">
        <div class="row">
          <div class="col-1 col-odd"><span></span></div>
          <div class="col-1 col-even"><span></span></div>
          <div class="col-1 col-odd"><span></span></div>
          <div class="col-1 col-even"><span></span></div>
          <div class="col-1 col-odd"><span></span></div>
          <div class="col-1 col-even"><span></span></div>
          <div class="col-1 col-odd"><span></span></div>
          <div class="col-1 col-even"><span></span></div>
          <div class="col-1 col-odd"><span></span></div>
          <div class="col-1 col-even"><span></span></div>
          <div class="col-1 col-odd"><span></span></div>
          <div class="col-1 col-even"><span></span></div>
          <div class="col-1 col-odd"><span></span></div>
          <div class="col-1 col-even"><span></span></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

// Stato per la visibilità della griglia di debug
const showDebugGrid = ref(false)

// Funzione per gestire i tasti premuti
const handleKeyDown = (event) => {
  // Controlla se è stata premuta la combinazione Shift+Ctrl+4
  // Codice 52 corrisponde al tasto "4"
  if (event.shiftKey && event.ctrlKey && event.keyCode === 52) {
    // Toggle della visibilità
    showDebugGrid.value = !showDebugGrid.value

    // Opzionale: salva la preferenza in localStorage
    localStorage.setItem('debug_grid_visible', showDebugGrid.value)

    console.log('Debug grid visibility:', showDebugGrid.value ? 'visible' : 'hidden')
  }
}

// Hooks del ciclo di vita per aggiungere/rimuovere gli event listener
onMounted(() => {
  // Aggiungi l'event listener per il keydown
  window.addEventListener('keydown', handleKeyDown)

  // Opzionale: ripristina lo stato dalla sessione precedente
  const savedState = localStorage.getItem('debug_grid_visible')
  if (savedState === 'true') {
    showDebugGrid.value = true
  }
})

onUnmounted(() => {
  // Rimuovi l'event listener quando il componente viene distrutto
  window.removeEventListener('keydown', handleKeyDown)
})
</script>

<style scoped>
.debug-grid {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  z-index: 9999;
  pointer-events: none; /* Permette di interagire con gli elementi sottostanti */
}
.container, .row{

  height: 100vh;
}


.col-1 {
  height: 100vh;
  flex: 1;



}
.col-1 span{
  height: 100vh;
  display: block;
  width: 100%;
  background-color: rgba(255, 0, 0, 0.1);
}

</style>
