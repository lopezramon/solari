<template>
  <div>
    <navbar></navbar>
    <router-view></router-view>
    <gfooter/>
    <modal_share/>
  </div>

</template>

<script>
  export default {
    mounted(){
      this.$store.dispatch('getEnviroment');
    }
  }
</script>