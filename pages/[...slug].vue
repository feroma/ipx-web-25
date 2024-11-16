<template>
<!--  <div class="page-content" v-if="pageData">-->
<!--    <h1>{{ pageData.title }}</h1>-->
<!--    <div v-html="pageData.body"></div>-->
<!--  </div>-->
<!--  <div v-else-if="error">-->
<!--    <h1>Error</h1>-->
<!--    <p>{{ error.message }}</p>-->
<!--  </div>-->
<!--  <div v-else>-->
<!--    <h1>!!!Page Not Found</h1>-->
<!--    <p>The requested page could not be found.</p>-->
<!--  </div>-->

  <div v-if="pageData">
    {{pageData}}
    <h1-title :title="pageData.title"></h1-title>
  </div>
</template>

<script setup>
const route = useRoute()
const { pages, nav,  updateState, updateCurrentPage } = useAppState()

const findPageData = () => {
  // console.log('ROUTE', route)
  // console.log(nav)
  const currentPage = nav.value.find(item => item.slug === route.path)
  if (currentPage) {
    // console.log('currentPage', currentPage)
    // console.log('pages', pages)
    /*const data = {
      pages: pages.value,
      nav: nav.value,
      currentPageId: currentPage.id
    }*/
    updateCurrentPage(currentPage.id)
    return pages.value[currentPage.id]
  } else {
    return null
  }
}

const pageData = computed(findPageData)
const error = ref(null)

onBeforeMount(async () => {
  try {
    await useAsyncData(`page-${route.path}`, async () => {
      const data = await fetchData()
      updateState(data)
      return findPageData()
    })
  } catch (err) {
    error.value = err
  }
})

const { fetchData } = useApi()
</script>
