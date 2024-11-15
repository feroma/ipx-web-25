// https://nuxt.com/docs/api/configuration/nuxt-config
// @ts-ignore
export default defineNuxtConfig({
  compatibilityDate: '2024-04-03',
  devtools: { enabled: true },
  ssr: false,
  runtimeConfig: {
    public: {
      //apiBase: process.env.API_BASE || 'https://localhost/ipx-web-24/index.php'
      apiBase: 'http://data-ipx.local'
    },
    pages: {
      '/': './pages/index.vue',
      '/**': './pages/[...slug].vue'
    },
    ErrorPage: {
      // Disabilita la pagina 404 di default
      display: false
    },

  }
})
