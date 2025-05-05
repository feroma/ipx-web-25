<script setup>
// const {section} = defineProps(['section'])
const props = defineProps({
  section: {
    type: Object,
    required: true
  },
  sectionId: {
    type: String,
    //required: true
  }

})
const {currentSectionId} = useAppState()
const isActive = computed(() => {
  //return props.sectionId
  return currentSectionId && currentSectionId.value && props.sectionId === currentSectionId.value
})


</script>

<template>
  <section :class="isActive? 'active':'inactive'">

    {{section}}

  </section>
</template>

<style scoped>

</style>