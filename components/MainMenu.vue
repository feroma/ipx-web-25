
<template>
  <nav class="main-menu">
    <ul>
      <li v-for="item in nav" :key="item.id">
        <NuxtLink :to="item.slug">{{ item.label }}</NuxtLink>
      </li>
    </ul>
  </nav>
</template>

<script setup>
const { nav } = useAppState()
console.log(nav)
</script>

<style scoped>
.main-menu ul {
  display: flex;
  gap: 1rem;
  list-style: none;
  padding: 0;
}
</style>