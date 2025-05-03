<template>
  <div class="accordion-1">
    <div class="row">
      <!--      ///////////////////////image-->
      <div class="col-md-6">
      </div>
      <!--      /////////////////////// / image-->
      <!--      ///////////////////////list-->
      <div class="col-md-7 min-vh-100 d-flex flex-column justify-content-center">
        <widget-pretitle v-if="content.pretitle" :content="content.pretitle.props"></widget-pretitle>
        <widget-main-title v-if="content.title" :content="content.title.props"></widget-main-title>
        <div class="accordion-container">
          <div
              v-for="(item, index) in items"
              :key="index"
              class="accordion-item"
          >
            <!-- Header dell'accordion -->
            <div
                class="accordion-header"
                @click="toggleAccordion(index)"
                :class="{ 'active': activeIndices.includes(index) }"
            >
              <div class="accordion-title">{{ item.title }}</div>
              <div class="accordion-icon">
                {{ activeIndices.includes(index) ? '−' : '+' }}
              </div>
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


</template>

<script setup>
import { ref, onMounted, watch, nextTick } from 'vue';
import gsap from 'gsap';

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
    default: null
  }
});
const items = computed(() => {
  //return props.sectionId
  const response = [];
  props.content.items.forEach(item => {
    response.push(item.props)
  })
  return response

})
// Refs
const contentRefs = ref([]);
const activeIndices = ref([]);

// Inizializzazione
onMounted(() => {
  // Inizializza gli elementi aperti
  if (props.initialOpenIndex !== null) {
    if (Array.isArray(props.initialOpenIndex)) {
      activeIndices.value = [...props.initialOpenIndex];
    } else {
      activeIndices.value = [props.initialOpenIndex];
    }

    // Aspetta il prossimo ciclo di rendering per animare gli elementi inizialmente aperti
    nextTick(() => {
      activeIndices.value.forEach(index => {
        if (contentRefs.value[index]) {
          const contentHeight = contentRefs.value[index].scrollHeight;
          gsap.set(contentRefs.value[index], { height: contentHeight });
        }
      });
    });
  }
});

// Funzione per aprire/chiudere l'accordion
const toggleAccordion = async (index) => {
  const isActive = activeIndices.value.includes(index);

  // Se è già attivo, lo chiudiamo
  if (isActive) {
    // Animazione di chiusura con GSAP
    await gsap.to(contentRefs.value[index], {
      height: 0,
      duration: 0.4,
      ease: "ease.out"
    });

    // Rimuoviamo l'indice dalla lista degli attivi
    activeIndices.value = activeIndices.value.filter(i => i !== index);
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
                ease: "power2.out"
              })
          )
      );
      activeIndices.value = [];
    }

    // Aggiungiamo il nuovo indice
    activeIndices.value.push(index);

    // Attendiamo il prossimo ciclo di rendering per ottenere l'altezza corretta
    await nextTick();

    // Animazione di apertura con GSAP
    gsap.fromTo(contentRefs.value[index],
        { height: 0 },
        {
          height: contentRefs.value[index].scrollHeight,
          duration: 0.4,
          ease: "power2.out"
        }
    );
  }
};

// Aggiorna l'altezza degli elementi attivi quando il contenuto cambia
watch(() => props.items, async () => {
  await nextTick();
  activeIndices.value.forEach(index => {
    if (contentRefs.value[index]) {
      gsap.to(contentRefs.value[index], {
        height: contentRefs.value[index].scrollHeight,
        duration: 0.4,
        ease: "power2.out"
      });
    }
  });
}, { deep: true });
</script>

<style scoped>
/* Stili di base - Puoi personalizzarli o rimuoverli se gestisci gli stili altrove */
.accordion-container {
  width: 100%;
}

.accordion-item {
  margin-bottom: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.accordion-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px;
  cursor: pointer;
  //background-color: #f5f5f5;
}

.accordion-header.active {
  background-color: #ff0000;
}

.accordion-icon {
  font-size: 18px;
  font-weight: bold;
}

.accordion-content {
  transition: height 0.4s ease;
}

.accordion-content-inner {
  padding: 0 15px 15px;
}
</style>