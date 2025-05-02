<script setup>
const props = defineProps({
  content: {
    type: Object,
    required: true
  }
})

</script>

<template>
  <div class="fallback">
    {{content}}
  </div>
</template>

<style scoped>

</style>