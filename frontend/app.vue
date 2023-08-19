<template>
  <div>
    <NuxtWelcome />
  </div>
</template>
<script setup lang="ts">
      const result = useFetch('http://api.localhost.com/api', {
        lazy: true,
        server: false
      })
      console.log(result);
      
</script>