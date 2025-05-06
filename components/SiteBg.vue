<script setup>
const props = defineProps({
  sections: {
    type: Array,
    required: true
  }
})
import {useAppState} from '~/composables/useAppState'

const {currentSectionId, config} = useAppState()
// Computed property che verifica se la sezione corrente è l'ultima dell'array
// Filtra solo le sezioni che hanno un bg
const filteredSections = computed(() => {
  return props.sections.filter(section => section.bg)
})


</script>


<template>
  <div class="site-bg">
    <ImageWrapper

        v-for="(section, index) in filteredSections"

        :key="section.id+'-bg'"
        class="section-bg"

        :class="{ 'active': currentSectionId === section.id }"

        :mobileImg="section.bg.mobile ? config.REPO_URL+'/'+section.bg.mobile:''"
        :tabletImg="section.bg.tablet ? config.REPO_URL+'/'+section.bg.tablet:''"
        :desktopImg="config.REPO_URL+'/'+section.bg.desktop"

    />


  </div>
</template>

<style scoped>

</style>