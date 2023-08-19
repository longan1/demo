<template>
  <div>
    <NuxtWelcome />
  </div>
</template>
<script setup lang="ts">
      const result = useFetch('http://localhost:8080/api', {
        lazy: true,
        server: false
      })
      console.log(result);
      
</script>