// https://nuxt.com/docs/api/configuration/nuxt-config
// @ts-ignore
export default defineNuxtConfig({
    compatibilityDate: '2024-04-03',

    // Metodo più recente per impostare il base URL
    app: {
      //  baseURL: '/ipx/mxr/'
        baseURL: process.env.NODE_ENV === 'production'
            ? '/ipx/mxr/'
            : '/',

    },
    devtools: { enabled: process.env.NODE_ENV !== 'production'},

    css: [
        '~/assets/stylesheets/style.css'
    ],

    //ssr: true,
    runtimeConfig: {
        public: {
            //apiBase: process.env.API_BASE || 'https://localhost/ipx-web-24/index.php'
            //apiBase:  process.env.API_BASE || 'http://data-ipx.local'

            apiBase: process.env.NODE_ENV === 'production' || true
                ? 'https://www.stage72.info/ipx/mxr/api/index.php'
                : 'http://data-ipx.local'
        },

        // pages: {
        //   '/': './pages/index.vue',
        //   '/**': './pages/[...slug].vue'
        // },
        ErrorPage: {
            // Disabilita la pagina 404 di default
            display: false
        },

    },

    modules: [
       // '@pinia/nuxt',
        '@nuxt/image'
    ],
    build: {
        transpile: ['gsap']
    }
})