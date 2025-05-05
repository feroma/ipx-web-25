<script setup>
const {pages, nav, config, updateState, updateCurrentPage} = useAppState()

const props = defineProps({
  content: {
    type: Object,
    required: true
  }
})
const filteredHtml = computed(() => {
  return props.content.html
})
</script>

<template>
  <div class="disclaimer d-flex align-items-center">
    <NuxtImg
        :alt="props.content.img.alt"
        :src="config.REPO_URL+'/'+props.content.img.src"/>
    <p v-html="filteredHtml"></p>
  </div>

</template>

<style scoped>

</style>