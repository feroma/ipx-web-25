
<template>
  <NuxtLayout>
    <NuxtPage />
  </NuxtLayout>
</template>

<script setup>
const { fetchData } = useApi()
const { updateState } = useAppState()

const loadSiteData = async () => {
  try {
    const data = await fetchData({action:'get_website_data'})
    updateState(data)
  } catch (error) {
    console.error('Error fetching site data:', error)
    // Gestisci l'errore, ad esempio mostra un messaggio all'utente
  }
}

loadSiteData()

/**
 * -----------------pinia
 */
// const website = useWebsiteStore()
// await callOnce(website.fetch)
// console.log(website.name)
</script>