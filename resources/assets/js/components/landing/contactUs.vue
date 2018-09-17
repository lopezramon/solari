<template>
    <div>
        <section class="bg-contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                  <div class="rounded bg-form-contact">
                      
                    <form>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  

                  </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container py-4">
                <div class="row">
                <div class="col-lg-3 d-flex" >
                    <div class="rounded text-center flex-fill" style="border: 1px solid #8a8a8a;">
                        <img width="80" src="/images/home/services-slider/neveta.png" alt="neveta">    
                        <div><p>Alquiler de autos, motocicletas,<br> bicicletas, botes</p></div>
                    </div>
                </div>
                
                <div class="col-lg-3 d-flex">
                    <div class="text-center rounded flex-fill"  style="border: 1px solid #8a8a8a;">
                        <img width="80" src="/images/home/services-slider/neveta.png" alt="neveta">
                        <div><p>Servicio de traslado <br>al aeropuerto</p></div>
                    </div>
                </div>
                
                <div class="col-lg-3 d-flex">
                    <div class="rounded text-center flex-fill"  style="border: 1px solid #8a8a8a;">
                        <img width="80" src="/images/home/services-slider/neveta.png" alt="neveta">
                        <div><p>Spa</p></div>
                    </div>
                </div>

                <div class="col-lg-3 d-flex">
                    <div class="rounded text-center flex-fill" style="border: 1px solid #8a8a8a;">
                        <img width="80" src="/images/home/services-slider/nolegio.png" alt="nolegio">
                        <div><p>Excursiones</p></div>
                    </div>
                </div>
                </div>
            </div> 
        </section>
    </div>
</template>

<style scoped>
.border{
    border: 1px solid #8a8a8a;
}
.bg-contact {
    widows: 100%;
    min-height: 520px;
    padding-top: 200px;
    padding-bottom: 100px;
    background-image: url("/images/home/header-slider/header-image-1.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
.bg-form-contact {
background-color: white;
}

</style>
