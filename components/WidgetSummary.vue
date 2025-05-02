<script setup>
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
  <h2 class="summary" v-html="filteredHtml"></h2>
</template>

<style scoped>

</style>