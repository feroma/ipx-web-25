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
  <p v-html="filteredHtml"></p>
</template>

<style scoped>

</style>