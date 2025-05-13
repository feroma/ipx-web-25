// https://nuxt.com/docs/api/configuration/nuxt-config
// @ts-ignore
export default defineNuxtConfig({
    compatibilityDate: '2025-05-11',
    // nitro: {
    //     preset: 'azure',
    //     // Disabilita la compressione dei payload e lascia che sia Azure a gestirla
    //     compressPublicAssets: false
    // },
    // Metodo più recente per impostare il base URL
    app: {
      //  baseURL: '/ipx/mxr/'
        baseURL: process.env.NODE_ENV === 'production' && false
            ? '/ipx/mxr/'
            : '/',

    },
    devtools: { enabled: process.env.NODE_ENV !== 'production'},

    css: [
        '~/assets/stylesheets/style.css'
    ],
    head: {
        link: [
            { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
            { rel:"apple-touch-icon", sizes:"57x57", href:"/favicon/apple-icon-57x57.png"},
            { rel:"apple-touch-icon", sizes:"60x60", href:"/favicon/apple-icon-60x60.png"},
            { rel:"apple-touch-icon", sizes:"72x72", href:"/favicon/apple-icon-72x72.png"},
            { rel:"apple-touch-icon", sizes:"76x76", href:"/favicon/apple-icon-76x76.png"},
            { rel:"apple-touch-icon", sizes:"114x114", href:"/favicon/apple-icon-114x114.png"},
            { rel:"apple-touch-icon", sizes:"120x120", href:"/favicon/apple-icon-120x120.png"},
            { rel:"apple-touch-icon", sizes:"144x144", href:"/favicon/apple-icon-144x144.png"},
            { rel:"apple-touch-icon", sizes:"152x152", href:"/favicon/apple-icon-152x152.png"},
            { rel:"apple-touch-icon", sizes:"180x180", href:"/favicon/apple-icon-180x180.png"},
            { rel:"icon", type:"image/png", sizes:"192x192" , href:"/favicon/android-icon-192x192.png"},
            { rel:"icon", type:"image/png", sizes:"32x32", href:"/favicon/favicon-32x32.png"},
            { rel:"icon", type:"image/png", sizes:"96x96", href:"/favicon/favicon-96x96.png"},
            { rel:"icon", type:"image/png", sizes:"16x16", href:"/favicon/favicon-16x16.png"},
        ]
    },

    //ssr: true,
    runtimeConfig: {
        public: {
            //apiBase: process.env.API_BASE || 'https://localhost/ipx-web-24/index.php'
            //apiBase:  process.env.API_BASE || 'http://data-ipx.local'

            apiBase: process.env.NODE_ENV === 'production'
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