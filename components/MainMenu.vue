<template>
  <nav class="main-menu" v-if="nav">
    <ul>
      <li v-for="item in nav" :key="item.id" :class="+item.id === +currentPageId ? 'active':'inactive'">
        <NuxtLink :to="item.slug">{{ item.label }}</NuxtLink>
      </li>
    </ul>
  </nav>
</template>

<script setup>
const {nav, currentPageId} = useAppState()
// console.clear()
// console.log('MAIN MENU', currentPageId.value)
</script>

<style>
.active {
  font-weight: bold;
}
</style>