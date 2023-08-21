// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  modules: [
    '@nuxtjs/tailwindcss',
    'nuxt-icon'
  ],
  devtools: { enabled: true },
  vite: {
    server: {
      hmr: {
        protocol: "ws",
      },
    },
  },
  
  runtimeConfig: {
    // The private keys which are only available server-side
    apiSecret: process.env.API_BASE_URL,
    // Keys within public are also exposed client-side
    public: {
      baseURL: process.env.API_BASE_URL
    },
    app: {
      
    }
  }
})
