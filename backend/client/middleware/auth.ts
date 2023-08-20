export default defineNuxtRouteMiddleware((to, from) => {
  if (process.client) {
    if (!localStorage.getItem('token')) {
      return navigateTo('/login') // Redirect to login page or desired route
    }
  }
})