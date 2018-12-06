<template>
    <div id="rooms-suites">
        <headerSuites :name="room.name"/>
        <navSuites/>

        <div class="container">
            <div class="row py-3">
                <div class="col-lg-9">
                
                <gallerySuites :gallery="room.galery"/>
                    
                </div>
                <div class="col-lg-3">
                    <infoSuites :subtitle1="room.subtitle1" :price="room.price" :description="room.description"/>        
                </div>
            </div>
        </div>

        <iconsServices/>
        <generalServices/>
        <listServices :services="room.services" :subtitle2="room.subtitle2" />
    </div>
</template>
<script>
export default {
    data()
    {
        return {
            room_id: this.$route.params.id,
            room: {},
        }
    },
    mounted()
    {
        let subthis=this;
        let root = window.location.host;
        axios.get('/api/admin/rooms/'+this.room_id)
        .then((res) => {
            if(res){
                this.room = res.data.data.room;
                console.log(res.data.data.room)
            }
        }).catch((error) => {
            this.showAlert('error', 'Errore!!', 'error en el servidor')
            this.loading=false;     
        });

    }
}
</script>

<style scoped>
#rooms-suites{
    background-color: #fff;
}
</style>