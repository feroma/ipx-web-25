<script setup>
const props = defineProps({
  content: {
    type: Object,
    required: true
  }
})

</script>

<template>
  <div class="blocks d-sm-flex flex-shrink-0">
    <div
        class="block flex-shrink-0"
        v-for="(block, block_count) in content.items"
    :key="'block-'+block_count"
    >

      <h4 v-if="block.props.title" v-html="block.props.title"/>
      <p v-if="block.props.title" v-html="block.props.html"/>
    </div>
  </div>
</template>

<style scoped>

</style>