<template>
  <nav class="main-menu">
    <ul>
      <template v-if="nav">
        <li
            v-for="item in nav"
            :key="item.id"
            :class="{
            'active': isActive(item.id),
            'inactive': !isActive(item.id)
          }"
        >
          <NuxtLink :to="item.slug">{{ item.label }}</NuxtLink>
        </li>
      </template>
    </ul>
  </nav>
</template>

<script setup>
import { computed } from 'vue'
const { nav, currentPageId } = useAppState()

// Funzione per controllare se l'item è attivo
const isActive = (itemId) => {
  return +itemId === +(currentPageId.value || 0)
}

// Assicuriamoci che nav sia reattivo
const navItems = computed(() => nav.value || [])
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