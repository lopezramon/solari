<template>
    <div>

	<div class="container pad-top " >
		
		<div class="row justify-content-center text-center align-items-center back-image ">
			<div class="col-12">
				<div class="h-30p pad" style="">
					<label class="text-white font-weight-bold"><h2><span class="news-text">ISCRIVITI ALLA NOSTRA NEWSLETTER</span></h2></label>
				</div>
			</div> 
			<div class="col-12  col-md-5 justify-content-center text-center align-items-center">
				<form>
					<div class="input-group mb-3">
						<input id="email" type="text" maxlength="50" name="email" data-vv-as="Email" placeholder="" class="form-control radius" aria-required="true" aria-invalid="false"> 
						<div class="input-group-append">
							<button type="button"  class="btn btn-danger radius-btn bold">ISCRIVITI
							</button>
						</div>
					</div> 
					<div class="form-check pad2">
						<input name="terms" type="checkbox" id="check" class="form-check-input" aria-required="true" aria-invalid="false"> 
						<label for="check" class="label2 form-check-label text-white pad2">
							<span class="help text-danger " style="display: none;">*
							</span>
                                Sì, Tienimi Aggiornato Su Novità, Eventi E Offerte
                            </label> 
                            <div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
<p class="pad-bottom"></p>
</div>


</template>
<style scoped>
.back-image {
	
	background-position: 0 75%;
	
	background-image: linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)), url("/images/home/newsletter/13.jpeg");
}
.pad {
	padding-top: 5%;padding-bottom: 3%;
}
.pad2 {
	padding-bottom: 10%;
}
.radius	 {
border-radius: 145px 0px 0px 145px !important;
-moz-border-radius: 145px 0px 0px 145px !important;
-webkit-border-radius: 145px 0px 0px 145px !important;
border: 0px solid #000000 !important;
height: 50px
}
.radius-btn	 {
border-radius: 0px 145px 145px 0px !important;
-moz-border-radius: 0px 145px 145px 0px !important;
-webkit-border-radius: 0px 145px 145px 0px !important;
border: 0px solid #000000 !important;
z-index: 100;
}
.btn-danger {
	background-color: #6a6a6a !important;
	border-color: #000 !important;
}
.btn-danger:active {
	border-color: #000 !important;
	box-shadow: #000 !important;
}
.pad-top {
	padding-top: 3%;
}
.pad-top {
	padding-top: 3%;
}
.pad-bottom {
	padding-bottom: 3%;
}
.news-text {
	letter-spacing: 5px
}
</style>
