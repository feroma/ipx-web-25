<template>
  <!-- LOAD: {{loading}}-->

  <div v-if="loadedPageData && loadedPageData.page">
    <SiteHeader class="d-none d-lg-block" v-if="loadedPageData.page.sections"
                :sections="loadedPageData.page.sections"/>
    <SiteHeaderMobile class="d-block d-lg-none" v-if="loadedPageData.page.sections"
                :sections="loadedPageData.page.sections"/>
    <SidebarNavigator
        v-if="loadedPageData.page.sections"
        :sections="loadedPageData.page.sections"/>
    <MenuOverlay
        v-if="loadedPageData.page.sections"
        :sections="loadedPageData.page.sections"/>
    <!--        <h1-title :title="pageData.title"></h1-title>-->

    <SiteBg v-if="loadedPageData.page.sections"
                :sections="loadedPageData.page.sections"/>

    <div class="sections" v-if="loadedPageData.page.sections">

      <component
          v-if="loadedPageData.page.sections"
          v-for="(section) in loadedPageData.page.sections"
          :key="'section-'+section.id"
          :is="getComponentName(section.layout)"
          :id="section.id+''"
          :data-section-id="section.id+''"
          class="section-wrapper"
          :class=section.class
          :section="section"/>

    </div>
    <SiteFooter class="d-none d-lg-block" v-if="loadedPageData.page.sections"
                :sections="loadedPageData.page.sections"/>
    <SiteFooterMobile class="d-block d-lg-none" v-if="loadedPageData.page.sections"
                :sections="loadedPageData.page.sections"/>
    <ContactForm v-if="contactFormOpen"/>
  </div>
</template>

<script setup>
import MenuOverlay from "~/components/MenuOverlay.vue"

const {fetchData} = useApi()
const { updateCurrentSection, changeHideOverflow, changeContactForm} = useAppState()

const route = useRoute()
const {pages, nav, config, updateState, updateCurrentPage, contactFormOpen} = useAppState()

const loading = ref(false)
const error = ref(null)
// Con gestione stato di caricamento
const loadPageData = async () => {


  try {
    loading.value = true
    return await fetchData({
      action: 'get_page',
      data: {slug: route.path}
    })


  } catch (catchError) {
    error.value = catchError
    console.error('Errore:', catchError)
    return null
  } finally {
    loading.value = false
  }
}

const loadedPageData = await loadPageData()


const findPageData = () => {
  // console.log('ROUTE', route)
  // console.log(nav)
  const currentPage = nav.value.find(item => item.slug === route.path)
  if (currentPage) {
    console.log('currentPage', currentPage)
    updateCurrentPage(currentPage.id)
    console.log('currentPage', pages.value[currentPage.id])
    return currentPage
  } else {
    return null
  }
}
const pageData = computed(findPageData)

// Funzione per determinare quale componente usare
const getComponentName = (layout) => {
  // console.log('Layout:', layout)
  switch (layout) {
    case 'alternative':
      return defineAsyncComponent(() => import('~/components/SectionAlternative.vue'))
    case 'default':
    default:
      return defineAsyncComponent(() => import('~/components/SectionDefault.vue'))
  }
}


/**
 * ----------------gsap
 */
import {onMounted, onUnmounted} from 'vue'
import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'

// Registra il plugin ScrollTrigger
if (process.client) {
  gsap.registerPlugin(ScrollTrigger)
}



// Funzione per inizializzare ScrollTrigger
/*const initScrollTrigger = async () => {
  const sections = document.querySelectorAll('.section-wrapper')

  sections.forEach((section) => {
    ScrollTrigger.create({
      trigger: section,
      start: 'top center', // Quando il top della sezione raggiunge il centro dello schermo
      end: 'bottom center', // Quando il bottom della sezione lascia il centro dello schermo
      //markers: true,
      onEnter: () => {
        const sectionId = section.getAttribute('data-section-id')
        updateCurrentSection(sectionId)
      },
      onEnterBack: () => {
        const sectionId = section.getAttribute('data-section-id')
        updateCurrentSection(sectionId)
      }
    })
  })
}*/
const _initScrollTrigger = async () => {
  const sections = document.querySelectorAll('.section-wrapper')
  console.log('_initScrollTrigger', sections)
  await nextTick()
  sections.forEach((section, index) => {
    // Animazione di entrata
    gsap.fromTo(section,
        {
          opacity: 0
          // x: 50
        },
        {
          opacity: 1,
          // x: 0,
          duration: 0.4,
          scrollTrigger: {
            trigger: section,
            start: 'top center',
            end: 'bottom center',
            toggleActions: 'restart reverse restart reverse',
            //markers: {startColor: "white", endColor: "cyan", fontSize: "11px",  indent: 100},
            onEnter: () => {
              const sectionId = section.getAttribute('data-section-id')
              updateCurrentSection(sectionId)
            },
            onEnterBack: () => {
              const sectionId = section.getAttribute('data-section-id')
              updateCurrentSection(sectionId)
            }
          }
        }
    )
  })

}

// Cleanup function per rimuovere i trigger
const cleanupScrollTriggers = () => {
  ScrollTrigger.getAll().forEach(trigger => trigger.kill())
}

onMounted(() => {
  //changeHideOverflow(true);
  //changeContactForm(true);
  if (process.client) {
    console.log('MOUNTED')
    setTimeout(() => {
      _initScrollTrigger()
    }, 1000)

  }
})

onUnmounted(() => {
  if (process.client) {
    cleanupScrollTriggers()
  }
})

const {currentSectionId} = useAppState()
let isLastSection = false
watch(currentSectionId, (newSectionId) => {
  if (newSectionId) {
    console.log('Sezione corrente:', newSectionId)
  } else {
    console.log('No Sezione corrente')
  }
})
watch(contactFormOpen, (status, old_status) => {
  console.log('contactFormOpen status:', {status,old_status})
  if(old_status===false && status===true){
    if (process.client) {
      cleanupScrollTriggers()
    }
  }else
  if(old_status===true && status===false){
    if (process.client) {
      cleanupScrollTriggers()
      setTimeout(() => {
        _initScrollTrigger()
      }, 500)
    }
  }
})


</script>
<style scoped>

</style>