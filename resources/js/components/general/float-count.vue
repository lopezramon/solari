<template>
    <div>
        <nav class="countdown">

        </nav>      
    </div>
</template>

<style scoped>


.countdown:hover{
    opacity: 0.3;
    transition: opacity .6s;

}


@font-face {
  font-family: 'digi';
  src: url('http://cssdeck.com/uploads/resources/fonts/digii/DS-DIGII.TTF');
}
.countdown {
    position: fixed;
    top: 50%;
    left: 0%;
    transform: translateY(-50%);
    z-index: 1030;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 4px;
    background-color: #2ac093;
    font-size: 3rem;
    color: #fff;
}
</style>

<script>
  
    export default {
        data() {
            return {
                min: null,
                sec: null
            }
        },
        mounted() {
          this.countdown();
        },
        methods: {
            countdown(){
                var duration = Vue.moment.duration({
                  'minutes': 1,
                  'seconds': '00'
                });
                
                var timestamp = new Date(0, 0, 0, 2, 10, 30);
                var interval = 1;
                var timer = setInterval(() => {
                  timestamp = new Date(timestamp.getTime() + interval * 1000);

                  duration = Vue.moment.duration(duration.asSeconds() - interval, 'seconds');
                   this.min = duration.minutes();
                   this.sec = duration.seconds();

                   var min = this.min;
                   var sec = this.sec;

                  sec -= 1;
                  if (min < 0) return clearInterval(timer);
                  if (min < 10 && min.length != 2) min = '0' + min;
                  if (sec < 0 && min != 0) {
                    min -= 1;
                    sec = 59;
                  } else if (sec < 10 && length.sec != 2) sec = '0' + sec;

                  $('.countdown').text(min + ':' + sec);
                 
                  if (min == 0 && sec == 0)
                    clearInterval(timer);
                     }, 1000);

                if (this.min == 0 && this.sec == 1)  return console.log('hola se te acabo el tiempo')
                    
           }
        }
    }
</script>
