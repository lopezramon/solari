<template>
    <div>
        <article v-for="room in rooms" class="mb-5 border-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 v-text="room.name"></h2>
                        <h3 v-text="room.subtitle1"></h3>
                        <p v-text="room.description"></p>
                    </div>
                    <!-- slider -->
                    <div class="col-12 col-lg-8 mb-3">
                        <swiper :options="swiperOption">
                            <swiper-slide v-for="(slide, index) in room.gallery" :key="index">
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
                // {
                //     id: 1,
                //     name: 'ROOM 101',
                //     subtitle1: 'Camera Matrimoniale con Balance',
                //     subtitle2: 'Camera Doppia Di 13 M2',
                //     description: 'Camera Matrimoniale climatizzata con minibar e pavimento piastrellato/in marmo.',
                //     price: 59.05,
                //     services:[
                //         {
                //             id: 1,
                //             name: ' terrazzo'
                //         },
                //         {
                //             id: 2,
                //             name: ' Canali pay per view'
                //         },
                //         {
                //             id: 3,
                //             name: 'Armadio / guardaroba'
                //         },
                //         {
                //             id: 4,
                //             name: 'Armadio / guardaroba'
                //         },
                //         {
                //             id:5,
                //             name: ' Radio',
                //         },
                //         {
                //             id:6,
                //             name: ' Carta igienica',
                //         }
                //     ],
                //     gallery: [
                //         {image: '/images/home/gallery-slider-map/21.jpg'},
                //         {image: '/images/home/gallery-slider-map/18.jpg'},
                //         {image: '/images/home/gallery-slider-map/22.jpeg'},
                //         {image: '/images/home/gallery-slider-map/23.jpeg'},
                //     ], 
                //}
            ]
        }
    },methods:{
        getBooking(){
           let data=this.$store.getters.getBooking;
           let form={};
           form.checkin=data.checkin;
           form.checkout=data.checkout;
           form.adult_quantity=data.adult;
           let slf=this;
           axios.post(this.root+'/api/admin/rooms',form).then((res)=>{
              if (res.status == 200)  {
                slf.rooms=res.data.data.rooms;
              }
            })
              .catch((error)=>{

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
        },
        listRooms(){
             axios.get(this.root+'/api/admin/rooms',this).then((res)=>{
                  if (res.status == 200)  {
                    
                  }
              })
              .catch((error)=>{

              })
        }
    },computed:{
        
    },
    mounted(){
        this.root=window.location.origin;
        this.getBooking();
            
    }
}
</script>
