<script setup>
import MxrLogo from "~/components/MxrLogo.vue"

const props = defineProps({
  content: {
    type: Object,
    required: true
  }
})
</script>

<template>
  <div id="mxr-logo">
    <h1>Mission XR by iPerformX</h1>
    <mxr-logo/>
  </div>
 
</template>

<style scoped>

</style>