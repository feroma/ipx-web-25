<template>
  <div v-if="pageData">
    <h1-title :title="pageData.title"></h1-title>
    <div class="sections" v-if="pageData.sections">
      <component
          v-for="(section,sectionId) in pageData.sections"
          :key="'section-'+sectionId"
          :is="getComponentName(section.layout)"
          v-bind="section"/>
    </div>
  </div>
</template>

<script setup>

const route = useRoute()
const {pages, nav, updateState, updateCurrentPage} = useAppState()
const findPageData = () => {
  // console.log('ROUTE', route)
  // console.log(nav)
  const currentPage = nav.value.find(item => item.slug === route.path)
  if (currentPage) {
     console.log('currentPage', currentPage)
    updateCurrentPage(currentPage.id)
    console.log('currentPage',  pages.value[currentPage.id])
    return pages.value[currentPage.id]
  } else {
    return null
  }
}
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

const pageData = computed(findPageData)
const error = ref(null)


</script>
