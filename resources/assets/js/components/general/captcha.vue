<template v-if="production">
  <div class="g-recaptcha" data-sitekey="6Le7MHMUAAAAAAL0cmEIw0Bxp6G3m3csz2bdkUmR"></div>
</template>


<script> 
export default {
  name: 'captcha',
  data () {
    return {
      production: null,
    }
  },
  beforeMount() {
          const enviroment = this.$store.getters.getEnviroment;
          if (enviroment.env === 'production') {
              return this.production = true
          } else  return this.production = false
      }
}
</script> 
 
