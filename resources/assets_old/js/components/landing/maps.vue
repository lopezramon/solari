<template>
  <div id="app">
  <GmapMap v-bind:center="{lat:40.915759 , lng:9.495973}" v-bind:zoom="20" map-type-id="roadmap"
style="height: 400px">
    <GmapMarker v-bind:key="index" v-for="(m, index) in markers" v-bind:position="m.position"
v-bind:clickable="true"/></GmapMap>    
  </div>
</template>

<script>
    export default {
        data() {
            return {
              center:{ lat:40.915759, lng:9.495950},
              markers:[
              {
                position: { lat:40.915759, lng:9.495950}
              }
              ]
            }
        },
    }
</script>






