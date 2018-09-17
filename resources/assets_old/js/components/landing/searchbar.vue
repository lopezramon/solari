<template>
  <div>
    <div class="search bg-green p-2 ">
        <div class="container">
            <div class="row">
                <div class="col"><div class="search-title d-none d-sm-none d-md-block d-lg-block">RICERA VELOCE</div>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary border-0 bg-white" type="button" id="button-addon1">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                </div>
            </div>
        </div>
    </div>    
  </div>

</template>

<style scoped>
    .search-title {
        float:left; 
        margin-left:25%; 
        margin-right:1%;
        font-size:23px;
        margin-top: -5px;
        color:#FFF;
         font-weight: bold;
    }
    .input-group{
        width: 100%;
        text-align: center;
    }
    .form-control:focus {
        color: #495057;
        background-color: transparent;
        border-color: #fff;
        background-color: #fff;
        outline: 0;
        z-index: 0;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,0);
    }

@media (min-width: 768px) {
    .input-group{
        width: 33%;
        text-align: center;
    } 
}
  
</style>