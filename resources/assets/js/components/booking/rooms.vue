<template>
    <div>
        <article v-for="room in rooms" class="mb-5 border-bottom">
            <div class="container-fluid">
                <div class="row position-relative ">
                    <div class="ribbon ribbon-top-right">        
                        <span>Disponible</span>
                    </div>
                    <div class="col-12">
                        <h2 v-text="room.name"></h2>
                        <h3 v-text="room.subtitle1"></h3>
                        <p v-text="room.description"></p>
                    </div>
                    <!-- slider -->
                    <div class="col-12 col-lg-8 mb-3">
                        <swiper :options="swiperOption ">
                            <swiper-slide v-for="(slide, index) in room.galery" :key="index">
                                <img class="img-fluid" :src="slide.image" alt="">
                            </swiper-slide>
                            <div class="swiper-pagination" slot="pagination"></div>
                        </swiper>
                    </div>
                    <!-- info room-->
                    <div class="col-12 col-lg-4">
                        <h4 v-text="room.subtitle2"></h4>
                        <p>
                            <span class="d-block" v-for="service in room.services">
                                <img src="/images/suites/icon/baseline-done-24px.svg" alt="check-list">
                                {{service.name}}
                            </span>
                        </p>
                        <p>
                            From:<br>
                            <strong v-text="room.price"></strong>
                        </p>
                        <p>
                        <button type="button" :disabled="checkDisabled(room)" @click.prevent="AddCart(room)" class="btn btn-primary text-uppercase">
                            Add
                        </button>
                        </p>
                    </div>
                </div>
            </div>
        </article>
    </div>
</template>
<script>
export default {
    data(){
        return {
            swiperOption: {
                pagination: {
                    el: '.swiper-pagination'
                }
            },
            root:null,
            rooms:[
              
            ]
        }
    },methods:{
        getBooking(){
           let data=this.$store.getters.getBooking;
           let form={};
           form.checkin=Vue.moment(data.checkin).format('YYYY-MM-DD');
           form.checkout=Vue.moment(data.checkout).format('YYYY-MM-DD');
           form.adult_quantity=data.adult;
           let slf=this;
           axios.post(this.root+'/api/admin/rooms',form).then((res)=>{
              if (res.status == 200)  {
                slf.rooms=res.data.data.rooms;
              }
            }).catch((error)=>{
                slf.showAlert('error', 'Errore!!', 'refrescar la pagina')
            })
        },
        AddCart(item){
            this.$store.commit('addCart',{list: item});
            this.$swal({
              title: "Di Successo!",
              text: "è stato aggiunto con successo!",
              icon: "success",
              button: "Close",
            });
        },checkDisabled(item){
            let data=this.$store.getters.getCart;
            for (let i in data){
                if(data[i].id==item.id){
                    return true;
                    break;
                }
            }
            return false;
        },showAlert(type, title, text) {
            this.$swal({
                position: 'center',
                type: type,
                title: title,
                text: text,
                showConfirmButton: false,
                showCloseButton: true,
            })
            .then((value) => {
              // this.$router.push('/');
            });
        }
    },computed:{
        
    },
    mounted(){
        this.root=window.location.origin;
        this.getBooking();
            
    }
}
</script>



<style scoped>
@import url(https://fonts.googleapis.com/css?family=Lato:700);
body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #f0f0f0;
}
.box {
  position: relative;
  max-width: 600px;
  width: 90%;
  height: 400px;
  background: #fff;
  box-shadow: 0 0 15px rgba(0,0,0,.1);
}

/* common */
.ribbon {
  width: 150px;
  height: 150px;
  overflow: hidden;
  position: absolute;
}
.ribbon::before,
.ribbon::after {
  position: absolute;
  z-index: -1;
  content: '';
  display: block;
  border: 5px solid #2980b9;
}
.ribbon span {
  position: absolute;
  display: block;
  width: 225px;
  padding: 15px 0;
  background-color: #3498db;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  color: #fff;
  font: 700 18px/1;
  text-shadow: 0 1px 1px rgba(0,0,0,.2);
  text-transform: uppercase;
  text-align: center;
}

/* top right*/
.ribbon-top-right {
  top: -10px;
  right: -10px;
}
.ribbon-top-right::before,
.ribbon-top-right::after {
  border-top-color: transparent;
  border-right-color: transparent;
}
.ribbon-top-right::before {
  top: 0;
  left: 0;
}
.ribbon-top-right::after {
  bottom: 0;
  right: 0;
}
.ribbon-top-right span {
  left: -25px;
  top: 30px;
  transform: rotate(45deg);
}


</style>
