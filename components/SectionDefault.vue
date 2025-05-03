<script setup>
// const {section} = defineProps(['section'])
const props = defineProps({
  section: {
    type: Object,
    required: true
  },
  sectionId: {
    type: String,
    required: true
  }

})
const {currentSectionId} = useAppState()
const isActive = computed(() => {
  //return props.sectionId
  return currentSectionId && currentSectionId.value && props.sectionId === currentSectionId.value
})
import {defineAsyncComponent} from 'vue'

const getComponentName = (widgetName) => {
  // Se widgetName è vuoto o non valido, restituisci un componente di fallback
  if (!widgetName) {
    console.warn('Nome del widget non specificato')
    return defineAsyncComponent(() => import('~/components/WidgetFallback.vue'))
  }

  // Definisci il componente asincrono con gestione degli errori
  return defineAsyncComponent({
    // Il loader effettivo del componente
    loader: () => import(`~/components/Widget${widgetName}.vue`).catch(error => {
      console.error(`Impossibile caricare il componente Widget${widgetName}.vue:`, error)
      // Importa un componente di fallback in caso di errore
      return import('~/components/WidgetFallback.vue')
    }),

    // Componente da mostrare durante il caricamento (opzionale)
    //loadingComponent: defineAsyncComponent(() => import('~/components/WidgetLoading.vue')),

    // Ritardo prima di mostrare il componente di caricamento (in ms)
    delay: 200,

    // Componente da mostrare se il caricamento fallisce (in alternativa al catch nel loader)
   // errorComponent: defineAsyncComponent(() => import('~/components/WidgetError.vue')),

    // Timeout per il caricamento (in ms)
    timeout: 300,

    // Funzione chiamata quando si verifica un errore di caricamento
    /*onError (error, retry, fail, attempts) {
      console.error(`Errore nel caricamento del Widget${widgetName} (tentativo ${attempts}):`, error)

      // Riprova automaticamente solo per un numero limitato di volte
      if (attempts <= 2) {
        // Attendi prima di riprovare
        setTimeout(() => {
          retry()
        }, 1000)
      } else {
        // Dopo troppi tentativi, fallisci definitivamente
        fail()
      }
    }*/
  })
}

</script>

<template>
  <section :class="isActive? 'active':'inactive'">


    <div class="container" :class="section.container_class || ''">
      <div
          v-for="(row, row_count) in section.rows"
          :key="'row-'+row_count"
          :id="'row-'+row_count"
          class="row"
          :class="row.class || ''"
      >
        <div
            v-for="(col, column_count) in row.columns"
            :key="'col-'+row_count+'-'+column_count"
            :id="'col-'+column_count"
            :class=col.class
        >
          <div :class="col.wrapper_class || 'content-wrapper'">
            <component
                v-for="(widget, content_count) in col.widgets"
                :key="'widget-'+row_count+'-'+column_count+'-'+content_count"
                :is="getComponentName(widget.component)"
                :content="widget.props"/>

            <!--          {{'col-'+column_count}}-->
          </div>

        </div>
      </div>
    </div>

    <!--    <h3>Default Section- ID:{{ sectionId }}// currentSectionId: {{ currentSectionId }}// isActive: {{ isActive }}</h3>-->
    <!--    <h1>{{ section.title }}</h1>-->
    <!--    <h1-title-animated2  :text="section.title"-->
    <!--                         textColor="#ffffff"-->
    <!--                         blockColor="#00ff00"-->
    <!--                         class="mx-auto max-w-4xl px-4"></h1-title-animated2>-->
    <!--    <h1-title-animated :title="section.title"></h1-title-animated>-->
    <!--    <h1-title-animated :title="section.title" animation="default"></h1-title-animated>-->
    <!--    <h1-title-animated :title="section.title" animation="scale"></h1-title-animated>-->
    <!--    <h1-title-animated :title="section.title" animation="wave"></h1-title-animated>-->
    <!--    <h1-title-animated-->
    <!--        :title="section.title"-->
    <!--        animation="default"-->
    <!--        :options="{-->
    <!--    duration: 1.2,-->
    <!--    staggerAmount: 0.1,-->
    <!--    startPosition: -200,-->
    <!--    ease: 'elastic.out(1, 0.3)'-->
    <!--  }"-->
    <!--    />-->
    <!--    <p>{{ section.body }}</p>-->
  </section>
</template>

<style scoped>

</style>