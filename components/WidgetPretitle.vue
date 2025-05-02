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
  <h3 class="pretitle" v-html="filteredHtml"></h3>
</template>

<style scoped>

</style>