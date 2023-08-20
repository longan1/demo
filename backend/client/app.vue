<template>
  <div>
    <h1>
     nguoi hay  anh di a
    </h1>
  </div>
</template>
<script setup lang="ts">
     const result = useMyFetch('/api',{
        server : false
     });
     console.log(result);
</script>