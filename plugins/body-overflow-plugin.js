// plugins/bodyOverflowPlugin.js
import { watch } from 'vue'
import { useAppState } from '~/composables/useAppState'

export default defineNuxtPlugin(() => {
  const { hideOverflow } = useAppState()
  
  // Imposta la classe all'avvio in base al valore iniziale
  if (process.client) {
    if (hideOverflow.value === true) {
      document.body.classList.add('hide-overflow')
    } else {
      document.body.classList.remove('hide-overflow')
    }
  }
  
  // Osserva i cambiamenti del valore hideOverflow
  watch(hideOverflow, (newValue) => {
    if (process.client) {
      if (newValue === true) {
        document.body.classList.add('hide-overflow')
      } else {
        document.body.classList.remove('hide-overflow')
      }
    }
  })
})
