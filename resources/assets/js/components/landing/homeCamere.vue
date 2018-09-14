<template>
    <div>
<div class="container-fluid black py-5">
	<div class="container">
    <div class="row">
      <div class="col-md-12 col-md-offset-2 text-center top">
		<img src="/images/home/camere/Logo_Luxury_pequeño.png"><p></p><h1 class="text-white">LE NOSTRE CAMERE</h1><p></p><span class="camere-detail text-white">ogni camera è climatizzata, dotata di tende oscuranti, frigo bar, macchina del caffè, tv 40''4k dove è possibile vedere netflix esclusivamente offerto da noi. inoltre ogni camera dispone di un bagno privato dotato di ampio box doccia, asciugacapelli e kit cortesia in omaggio. a disposizione di tutti, una veranda  attrezzata con divanetti e poltroncine dove poter fare un aperitivo con vista sulla cupola della chiesa più storica di olbia. il wi-fi inoltre è accessibile e gratuito in tutta la struttura. </span><p></p>
      </div>
      
      <div class="col-12 col-md-6 col-lg-6">
      	
      	<div class="imagen-room">
      		<img src="/images/home/camere/22.jpg" class="img-fluid">
	      	<div class="content-room-image text-center">
					<div class="content-middle">
			      		<div class="min-log">
			      			<img src="/images/home/camere/Logo_Luxury_pequeño.png" alt="logo luxury">
			      		</div>
			      		<h3 class="text-white">ROOM 101</h3>
			      		 <a href="#" class="myButton">VEDI TUTTO</a>
					</div>
	      	</div>
      	</div>
      	
      </div>
      <div class="col-12 col-md-6 col-lg-6">
      	<div class="imagen-room">
      		<img src="/images/home/camere/7.jpg" class="img-fluid">
	      	<div class="content-room-image text-center">
	      		<div class="content-middle">
		      		<div class="min-log">
		      			<img src="/images/home/camere/Logo_Luxury_pequeño.png" alt="logo luxury">
		      		</div>
		      		<h3 class="text-white">ROOM 102</h3>
		      		<a href="#" class="myButton">VEDI TUTTO</a>
				</div>	
	      	</div>
      	</div>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
      	<div class="imagen-room">
      		<img src="/images/home/camere/12.jpg" class="img-fluid">
	      	<div class="content-room-image text-center">
	      		<div class="content-middle">
		      		<div class="min-log">
		      			<img src="/images/home/camere/Logo_Luxury_pequeño.png" alt="logo luxury">
		      		</div>
		      		<h3 class="text-white">ROOM 103</h3>
		      		<a href="#" class="myButton">VEDI TUTTO</a>
		      	</div>
	      	</div>
      	</div>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
      	<div class="imagen-room">
      		<img src="/images/home/camere/0163.jpg" class="img-fluid">
	      	<div class="content-room-image text-center">
				<div class="content-middle">
		      		<div class="min-log">
		      			<img src="/images/home/camere/Logo_Luxury_pequeño.png" alt="logo luxury">
		      		</div>
		      		<h3 class="text-white">ROOM 104</h3>
		      		<a href="#" class="myButton">VEDI TUTTO</a>
				</div>
	      	</div>
      	</div>
      </div>
    </div>
</div>
</div>

</div>

</template>

<style scoped>

.black {
background-color: #000000;
}

.imagen-room{
	position: relative;
	overflow: hidden;
	padding-top: 30px;
}
.imagen-room > img{
	width: 100%;
	height: 100%;
}
.content-room-image{
	position: absolute;
	top: -200%;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0,0,0,0.7);
	transition:all 1s ease;
	-moz-transition: all 1s ease;
	display: flex;
	justify-content: center;
	align-items: center;
}
.imagen-room:hover .content-room-image{
	top: 0;
}
.myButton {
	background-color:#ffffff;
	-moz-border-radius:41px;
	-webkit-border-radius:41px;
	border-radius:41px;
	display:inline-block;
	cursor:pointer;
	color:#000000;
	font-family:Arial;
	font-size:16px;
	padding:5px 18px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
.myButton:hover {
	background-color:#ffffff;
	text-decoration: none;
	color:#000000;

}
.myButton:active {
	position:relative;
	top:1px;
}

</style>
