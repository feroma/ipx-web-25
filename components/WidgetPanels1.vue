<script setup>
const props = defineProps({
  content: {
    type: Object,
    required: true
  }
})
const {  config} = useAppState()

// const filteredHtml = computed(() => {
//   return props.content.html
// })
const panel_1_item = computed(() => {
  return props.content.items[0];
})
const panel_1b_item = computed(() => {
  return props.content.items[1];
})
</script>

<template>
  <div class="panels-1 teaser-list-1b">
    <div class="panel-1">
      <div class="teaser">
        <NuxtImg
            :alt="panel_1_item.props.icon.alt"
            :src="config.REPO_URL+'/'+panel_1_item.props.icon.src"/>
        <div class="teaser-entry">
          <h4 v-html="panel_1_item.props.title"/>
          <p v-html="panel_1_item.props.html"/>
        </div>
      </div>

    </div>
    <div class="panel-1b">
      <div class="teaser">
        <div class="teaser-entry">
          <NuxtImg
              :alt="panel_1b_item.props.icon.alt"
              :src="config.REPO_URL+'/'+panel_1b_item.props.icon.src"/>
          <h4 v-html="panel_1b_item.props.title"/>
          <p v-html="panel_1b_item.props.html"/>
        </div>
      </div>

    </div>

  </div>
</template>

<style scoped>

</style>