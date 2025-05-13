<template>
  <div v-if="!loading">


  <div class="accordion-mobile d-block d-md-none">
    <div class="row">
      <div class="col-sm-12">
        <widget-pretitle v-if="content.pretitle" :content="content.pretitle.props"></widget-pretitle>
        <widget-main-title v-if="content.title" :content="content.title.props"></widget-main-title>


        <div
            v-for="(item_m, index_m) in items_m"
            :key="'aim'-index_m"
            class="accordion-item-mobile"
            :id="`accordion-mobile-content-${index_m}`"
        >

          <!-- immagine -->
          <svg
              class="accordion-item-image"
              :id="`accordion-image-${index_m}`"
              viewBox="0 0 852 735" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <mask :id="'myMask_accordion'+index_m">
                <rect width="100%" height="100%" fill="black"/>
                <path fill="white" d="M626.953 735L6 735C2.68629 735 0 732.314 0 729L0 6C0 2.68629 2.68627 0 5.99998 0L846 0C849.314 0 852 2.6863 852 6L852 509.729C852 517.68 848.844 525.305 843.225 530.93L648.179 726.201C642.552 731.835 634.916 735 626.953 735Z"/>
              </mask>
            </defs>
            <image
                :href="config.REPO_URL+'/'+item_m.image.src"
                :mask="'url(#myMask_accordion'+index_m+')'"
            />
          </svg>


          <!-- Header dell'accordion -->
          <div class="accordion-mobile-header">
            <div class="accordion-title">
              <span>{{ item_m.title }} </span>
            </div>
          </div>

          <!-- Contenuto dell'accordion -->
          <div class="accordion-mobile-content">
            <h3 v-html="item_m.inner_title"></h3>
            <p v-html="item_m.html"></p>
          </div>



        </div>

        <widget-cta v-if="content.cta" :content="content.cta.props"></widget-cta>

      </div>
    </div>
  </div>

<!-- ====================================================================================  DESKTOP VERSION-->
  <div class="accordion-1 d-none d-md-block">
    <div class="row">
      <!--      ///////////////////////image-->
      <div class="col-sm-12 col-md-6 d-flex align-items-center overflow-hidden">
        <div class="v-tabs-items-content">

          <svg
              v-for="(item, index) in items"
              :key="index"
              class="accordion-item-image"
              :class="{ 'active': activeIndex === index }"
              :id="`accordion-content-${index}`"
              viewBox="0 0 852 735" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <mask :id="'myMask_accordion'+index">
                <rect width="100%" height="100%" fill="black"/>
                <path fill="white" d="M626.953 735L6 735C2.68629 735 0 732.314 0 729L0 6C0 2.68629 2.68627 0 5.99998 0L846 0C849.314 0 852 2.6863 852 6L852 509.729C852 517.68 848.844 525.305 843.225 530.93L648.179 726.201C642.552 731.835 634.916 735 626.953 735Z"/>
              </mask>
            </defs>
            <image
                :href="config.REPO_URL+'/'+item.image.src"
                :mask="'url(#myMask_accordion'+index+')'"
            />
          </svg>
        </div>
      </div>
      <!--      /////////////////////// / image-->
      <!--      ///////////////////////list-->
      <div class="col-sm-12 col-md-7 col-content d-flex flex-column justify-content-center">
        <widget-pretitle v-if="content.pretitle" :content="content.pretitle.props"></widget-pretitle>
        <widget-main-title v-if="content.title" :content="content.title.props"></widget-main-title>

        <div class="accordion-container">
          <div
              v-for="(item, index) in items"
              :key="index"
              class="accordion-item"
              :ref="el => { if (el) accordionItemRefs[index] = el }"
              :id="`accordion-section-${index}`"
          >
            <!-- Header dell'accordion -->
            <div
                class="accordion-header"
                @click="toggleAccordion(index)"
                :class="{ 'active': activeIndex === index }"
            >
              <div class="accordion-title">
                <span>{{ item.title }}</span>
              </div>

              <svg width="36" height="34" viewBox="0 0 36 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.5 30.1364L0.5 3.86364C0.5 1.72981 2.22981 0 4.36364 0L31.6364 4.05289e-06C33.7702 4.33064e-06 35.5 1.72981 35.5 3.86364L35.5 23.6366C35.5 25.6567 34.7089 27.5965 33.2962 29.0405L30.7171 31.6766C29.2634 33.1625 27.2724 34 25.1937 34L4.36364 34C2.22981 34 0.5 32.2702 0.5 30.1364Z" fill="#ACD1E9"/>
                <path d="M25 20L18.1429 27.4834C17.5117 28.1722 16.4883 28.1722 15.8571 27.4834L9 20" stroke="#001432" stroke-width="2"/>
              </svg>

              <!--              <div class="accordion-icon">
                              {{ activeIndices.includes(index) ? '−' : '+' }}
                            </div>-->
            </div>

            <!-- Contenuto dell'accordion -->
            <div
                class="accordion-content"
                :ref="el => { if (el) contentRefs[index] = el }"
                :style="{ height: activeIndices.includes(index) ? 'auto' : '0px', overflow: 'hidden' }"
            >
              <h3 v-html="item.inner_title"></h3>
              <p v-html="item.html"></p>
            </div>
          </div>
        </div>

        <widget-cta v-if="content.cta" :content="content.cta.props"></widget-cta>

      </div>
      <!--      /////////////////////// / list-->
    </div>
  </div>


  </div>
</template>

<script setup>
import {ref, onMounted, watch, nextTick, onUnmounted} from 'vue'
import gsap from 'gsap'
import {ScrollTrigger} from 'gsap/ScrollTrigger'

const {config} = useAppState()
// Registra il plugin ScrollTrigger
gsap.registerPlugin(ScrollTrigger)

// Props
const props = defineProps({
  /*  items: {
      type: Array,
      required: true,
      default: () => []
    },*/
  content: {
    type: Object,
    required: true
  },
  multiple: {
    type: Boolean,
    default: false
  },
  initialOpenIndex: {
    type: [Number, Array],
    default: 0
  },
  // Se true, le sezioni si apriranno automaticamente durante lo scroll
  useScrollTrigger: {
    type: Boolean,
    default: false
  },
  // Opzione per attivare l'apertura sequenziale mentre si scorre
  scrollSequential: {
    type: Boolean,
    default: false
  },
  // Percentuale della sezione che deve essere visibile prima di attivarla (0-1)
  scrollThreshold: {
    type: Number,
    default: 0.7
  }
})
const items = computed(() => {
  //return props.sectionId
  const response = []
  props.content.items.forEach(item => {
    response.push(item.props)
  })
  return response

})
const items_m = computed(() => {
  //return props.sectionId
  const response = []
  props.content.items.forEach(item_m => {
    response.push(item_m.props)
  })
  return response

})
// Refs
const contentRefs = ref([])
const accordionItemRefs = ref([])
const activeIndices = ref([])
const scrollTriggers = ref([])
const activeIndex = ref(null)
const loading = ref(true);
// Funzione per aprire/chiudere l'accordion
const toggleAccordion = async (index) => {
  //const isActive = activeIndices.value.includes(index)
  const isActive =  activeIndex.value === index
  // Se è già attivo, lo chiudiamo
  if (isActive) {
   // activeIndex.value = index
    //activeIndices.value = activeIndices.value.filter(i => i !== index)
   //
    // Animazione di chiusura con GSAP
    /*await gsap.to(contentRefs.value[index], {
      height: 0,
      duration: 0.4,
      ease: "power1.inOut"
    })*/

    // Rimuoviamo l'indice dalla lista degli attivi

  }
  // Se non è attivo, lo apriamo
  else {
    // Se non è permesso avere più elementi aperti, chiudiamo gli altri
    if (!props.multiple && activeIndices.value.length > 0) {
      // Animazione di chiusura per gli elementi attualmente aperti
      await Promise.all(
          activeIndices.value.map(activeIndex =>
              gsap.to(contentRefs.value[activeIndex], {
                height: 0,
                duration: 0.4,
                ease: "power1.inOut"
              })
          )
      )
      activeIndices.value = []

    }

    // Aggiungiamo il nuovo indice
    activeIndices.value.push(index)
    activeIndex.value = index

    // Attendiamo il prossimo ciclo di rendering per ottenere l'altezza corretta
    await nextTick()

    // Animazione di apertura con GSAP
    gsap.fromTo(contentRefs.value[index],
        {height: 0},
        {
          height: contentRefs.value[index].scrollHeight,
          duration: 0.4,
          ease: "power1.inOut"
        }
    )
  }
}

// Inizializzazione ScrollTrigger per ciascuna sezione dell'accordion
const initScrollTriggers = () => {


  console.log('initScrollTriggers')
  // Prima rimuoviamo eventuali trigger esistenti
  killScrollTriggers()
  const isMobile = window.innerWidth < 768 // 768px è solitamente il breakpoint per tablet/mobile

  // Se è un dispositivo mobile, esci dalla funzione senza creare gli ScrollTrigger
  if (isMobile) return

  if (!props.useScrollTrigger) return

  // Creiamo un trigger per ogni elemento dell'accordion
  accordionItemRefs.value.forEach((item, index) => {
    if (!item) return

    const trigger = ScrollTrigger.create({
      trigger: item,
      start: `top ${props.scrollThreshold * 100}%`,
      end: `bottom ${props.scrollThreshold * 100}%`,
      onEnter: () => handleScrollEnter(index),
      onEnterBack: props.scrollSequential ? null : () => handleScrollEnter(index),
      markers: true // Imposta a true per debug
    })

    scrollTriggers.value.push(trigger)
  })
}

// Gestisce l'attivazione di una sezione durante lo scroll
const handleScrollEnter = (index) => {
  // Se non è attivo, lo attiviamo
  if (!activeIndices.value.includes(index)) {
    toggleAccordion(index)
  }
}

// Rimuove tutti gli ScrollTrigger
const killScrollTriggers = () => {
  scrollTriggers.value.forEach(trigger => {
    if (trigger) trigger.kill()
  })
  scrollTriggers.value = []
}

// Aggiorna l'altezza degli elementi attivi quando il contenuto cambia
watch(() => props.items, async () => {
  await nextTick()
  activeIndices.value.forEach(index => {
    if (contentRefs.value[index]) {
      gsap.to(contentRefs.value[index], {
        height: contentRefs.value[index].scrollHeight,
        duration: 0.4,
        ease: "power1.inOut"
      })
    }
  })

  // Ricrea i trigger dopo che il contenuto è cambiato
  initScrollTriggers()
}, {deep: true})

// Watch per riconfigurare i trigger se le opzioni di scroll cambiano
watch(() => [props.useScrollTrigger, props.scrollSequential, props.scrollThreshold], () => {
  initScrollTriggers()
})

// Inizializzazione
onMounted(async () => {
  activeIndex.value = props.initialOpenIndex;
  // Inizializza gli elementi aperti
  if (props.initialOpenIndex !== null) {
    if (Array.isArray(props.initialOpenIndex)) {
      activeIndices.value = [...props.initialOpenIndex]
    } else {
      activeIndices.value = [props.initialOpenIndex]
    }

    // Aspetta il prossimo ciclo di rendering per animare gli elementi inizialmente aperti
    await nextTick()
    loading.value=false
    activeIndices.value.forEach(index => {
      if (contentRefs.value[index]) {
        const contentHeight = contentRefs.value[index].scrollHeight
        gsap.set(contentRefs.value[index], {height: contentHeight})
      }
    })
  }

  // Inizializza ScrollTrigger dopo che il DOM è completamente renderizzato
  await nextTick()
  initScrollTriggers()
})

// Cleanup degli ScrollTrigger quando il componente viene distrutto
onUnmounted(() => {
  killScrollTriggers()
})
</script>

<style scoped>

</style>