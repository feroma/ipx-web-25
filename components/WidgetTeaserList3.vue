<script setup>
const props = defineProps({
  content: {
    type: Object,
    required: true
  }
})

</script>

<template>
  <div class="teaser-list-3">
    <div v-for="(teaser, teaser_count) in content.items"
    :key="'teaser-3-'+teaser_count"
         class="teaser"
         :class="teaser.props.class || ''"
    >
      <div class="teaser-header">
        <h4 v-html="teaser.props.summary"/>
        <h3 v-html="teaser.props.title"/>
      </div>
      <div class="teaser-image">
        <svg width="510" height="auto" viewBox="0 0 510 250" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M419.853 250H6C2.68629 250 0 247.314 0 244V6C0 2.68629 2.68629 0 6 0H504C507.314 0 510 2.68629 510 6V159.785C510 167.736 506.844 175.362 501.225 180.987L441.078 241.202C435.451 246.835 427.815 250 419.853 250Z"/>
        </svg>
      </div>
      <div class="teaser-entry">
        <p v-html="teaser.props.html"/>
      </div>

    </div>
  </div>
</template>

<style scoped>

</style>