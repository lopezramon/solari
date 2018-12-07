<template>
  <div class="bg-white">
    <form class="form-register " action="#" method="post">
      <div id="form-total" role="application" class="clearfix">
        <div class="steps clearfix">
          <ul role="tablist" class="mb-0">
            <li role="tab" aria-disabled="false" class="done d-inline-block" aria-selected="true" >
              <a>
                <span class="title">1</span>
              </a>
            </li>
            <li role="tab" aria-disabled="false" class="" aria-selected="false">
              <a>
                <span class="title">2</span>
              </a>
            </li>
            <li role="tab" aria-disabled="false" class="last " aria-selected="false">
              <a id="form-total-t-2" href="#form-total-h-2" aria-controls="form-total-p-2">
                <span class="title">3</span>
              </a>
            </li>
          </ul>
          <div class="container ">
            <div class="row text-center">
              <div class="col-4">    
                <span class="title" >Scegli la camera</span>
              </div>
              <div class="col-4">
                <span class="title" >Inserisci i tuoi dettagli</span>
              </div>
              <div class="col-4">
                <span class="title" >Processo di pagamento</span>
              </div>                
            </div>     
          </div>
        </div>
      </div>
    </form>
  </div>
</template>


<style>
.form-register .steps {
    padding-bottom: 33px;
    padding-top: 40px;
}
.form-register .steps .title li a{
  border: 0px;
  color: #2ac093;
  font-size: 22px;
  font-weight: 400;
  font-family: 'Montserrat', sans-serif;
}
.title {
  color: #2ac093 ;
  font-size: 1.0rem;
}
.form-register .steps ul {
    display: flex;
    display: -webkit-flex;
    list-style: none;
    padding-left: 0;
    justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
}
.form-register .steps li,
.form-register .steps li.current {
  outline: none;
  -o-outline: none;
    -ms-outline: none;
    -moz-outline: none;
    -webkit-outline: none;
}
.form-register .steps li a {
    display: inline-block;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    background-color: #fff;
    border: 2px solid #2ac093;
    margin-right: 350px;
    position: relative;
    outline: none;
}
.form-register .steps li a::before {
  position: absolute;
  content: "";
  background: #2ac093;
  width: 350px;
  height: 2px;
  top: 50%;
  transform: translateY(-50%);
  -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
  left: 100%;
}
.form-register .steps li.last a {
  margin-right: 0;
}
.form-register .steps li.last a::before {
  content: none;
}
.form-register .steps li.current a,
.form-register .steps li.current a:active,
.form-register .steps li.done a::before,

.form-register .steps li.done a,
.form-register .steps li.done a span,
.form-register .steps li.done a:active  {
    background: #2ac093;
    color: #fff;
}
.form-register .steps li .current-info {
  display: none;
}
.form-register .steps li .title {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    color: #2ac093;
    font-size: 24px;
    font-weight: 600;
    font-family: 'Montserrat', sans-serif;
}
.form-register .content {
  padding: 0 80px;
}
.form-register .content h2 {
  display: none;
}


/* Responsive */



@media screen and (max-width: 575px) {
  .form-register .content {
      padding: 0 40px;
  }
  .form-register .steps li a {
    width: 50px;
    height: 50px;
    margin-right: 50px;
  }
  .form-register .steps li a::before {
    width: 50px;
  }
} 
</style>