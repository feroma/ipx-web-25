<script setup>
  // const {section} = defineProps(['section'])
  defineProps({
    title: {
      type: String,
      required: true
    },
    body: {
      type: String,
      required: true
    },
    layout: {
      type: String,
      default: 'default'
    }
  })
</script>

<template>
    <div>
      <h3>Alternative Section</h3>
      <h1>{{title}}</h1>
      <p>{{body}}</p>
    </div>
</template>

<style scoped>

</style>