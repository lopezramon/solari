<template>
    <div>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-uppercase m-0 mb-md-5 text-white linear-wipe">BOOKING</h1>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>
<style scoped>
header{
    background-color: #fff;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    width: 100%;
    height: 130px;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    text-align: center;
    background-image: url('/images/solaria-vacanze-affitto-ville-appartamenti-sardegna-budoni-san-teodoro.jpg');
}
@media (min-width: 768px) {
    header{
        height: 280px;
    }
}
.linear-wipe {
  text-align: center;

  
  background: linear-gradient(to right, #d7392c 20%, #ffd900 40%, #ffd900 60%, #d7392c 80%);
  background-size: 200% auto;
  
  color: #000;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  
  animation: shine 2s linear infinite;
}

@keyframes shine {
    to {
      background-position: -200% center;
    }
}

</style>
