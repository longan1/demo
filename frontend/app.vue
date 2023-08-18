<template>
  <div>
    <NuxtWelcome />
  </div>
</template>
<script setup lang="ts">
      const result = useFetch('http://localhost.com/api', {
        lazy: true,
        server: false
      })
      console.log(result);
      
</script>