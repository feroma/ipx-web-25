<script setup>
const route = useRoute()
const { pages, nav } = useAppState()

const findPageData = () => {
  const currentPage = nav.find(item => item.slug === route.path)
  if (currentPage) {
    return pages[currentPage.id]
  } else {
    return null
  }
}

const pageData = computed(findPageData)
const error = ref(null)

onBeforeMount(async () => {
  try {
    await useAsyncData(`page-${route.path}`, () => {
      const pageData = findPageData()
      if (pageData) {
        return pageData
      } else {
        throw new Error(`Page not found: ${route.path}`)
      }
    })
  } catch (err) {
    error.value = err
  }
})
</script>