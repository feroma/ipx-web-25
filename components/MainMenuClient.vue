<template>
  <nav class="main-menu">
    <ClientOnly>
      <ul v-if="nav">
        <li
            v-for="item in nav"
            :key="item.id"
            :class="{
            'active': +item.id === +currentPageId,
            'inactive': +item.id !== +currentPageId
          }"
        >
          <NuxtLink :to="item.slug">{{ item.label }}</NuxtLink>
        </li>
      </ul>
      <template #fallback>
        <div>Caricamento menu...</div>
      </template>
    </ClientOnly>
  </nav>
</template>

<script setup>
const { nav, currentPageId } = useAppState()

// Se necessario, puoi aggiungere un watcher per debugging
watch([nav, currentPageId], ([newNav, newCurrentPageId]) => {
  console.log('Nav changed:', newNav)
  console.log('CurrentPageId changed:', newCurrentPageId)
})
</script>

<style scoped>
.main-menu {
  /* i tuoi stili */
}

.active {
  font-weight: bold;
}

.inactive {
  /* eventuali stili per item inattivi */
}
</style>