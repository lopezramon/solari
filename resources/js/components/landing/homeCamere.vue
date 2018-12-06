<template>
    <div>
	<div id="camera"></div>	

	<section class="bg-white">
		<div class="container py-3">
		<div class="row">
		<div class="col-md-12 col-md-offset-2 text-center top">
			<h2 class=" my-0">LE NOSTRE PROPOSTE</h2>
			<span class="camere-detail text-white">
				
			</span>
			
		</div>
		
		<div class="col-12 col-md-6 col-lg-6 no-padding-movil">
			
			<div class="imagen-room position-relative">
				<img src="https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/1-villetta-stella-maris-1_list-img.jpg" class="img-fluid">
				<div class="info text-white">
						<h3 class="font-weight-bold">Villetta Stella Maris</h3>
						<strong class="d-block">1 Camera da letto</strong>
						<strong class="d-block">Budoni</strong>
				</div>
				<div class="content-room-image text-center">
						<div class="content-middle">
							<div class="min-log">
								<img src="/images/logos/solaria-logo.png" alt="logo Solaria" width="100">
							</div>
							<h3 class="text-white mt-2">Villetta Stella Maris</h3>
							<a href="/vacanze" class="myButton">VEDI TUTTO</a>
						</div>
				</div>
			</div>
			
		</div>
		<div class="col-12 col-md-6 col-lg-6 no-padding-movil">
			<div class="imagen-room">
				<img src="https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/2-residence-solaria-2_list-img.jpg" class="img-fluid">
				<div class="info text-white">
						<h3 class="font-weight-bold">Villetta Stella Maris</h3>
						<strong class="d-block">1 Camera da letto</strong>
						<strong class="d-block">Budoni</strong>
				</div>
				<div class="content-room-image text-center">
					<div class="content-middle">
						<div class="min-log">
							<img src="/images/logos/solaria-logo.png" alt="logo Solaria" width="100">
						</div>
						<h3 class="text-white mt-2">Residence Solaria</h3>
						<a href="/vacanze" class="myButton">VEDI TUTTO</a>
					</div>	
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 col-lg-4 no-padding-movil">
			<div class="imagen-room">
				<div class="info text-white">
						<h3 class="font-weight-bold">Villetta Stella Maris</h3>
						<strong class="d-block">1 Camera da letto</strong>
						<strong class="d-block">Budoni</strong>
				</div>
				<img src="https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/3-villino-bouganville-2_list-img.jpg" class="img-fluid">
				<div class="content-room-image text-center">
					<div class="content-middle">
						<div class="min-log">
							<img src="/images/logos/solaria-logo.png" alt="logo Solaria" width="100">
						</div>
						<h3 class="text-white mt-2">Villetta Bouganville</h3>
						<a href="/vacanze" class="myButton">VEDI TUTTO</a>
					</div>
				</div>
			</div>
		</div>
			<div class="col-12 col-md-4 col-lg-4 no-padding-movil">
				<div class="imagen-room">
					<img src="https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/7-villa-luddui-2_list-img.jpg" class="img-fluid">
					<div class="info text-white">
						<h3 class="font-weight-bold">Villetta Stella Maris</h3>
						<strong class="d-block">1 Camera da letto</strong>
						<strong class="d-block">Budoni</strong>
				</div>
					<div class="content-room-image text-center">
						<div class="content-middle">
							<div class="min-log">
								<img src="/images/logos/solaria-logo.png" alt="logo Solaria" width="100">
							</div>
							<h3 class="text-white mt-2">Villa Ludduì</h3>
							<a href="/vacanze" class="myButton">VEDI TUTTO</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-4 col-lg-4 no-padding-movil">
				<div class="imagen-room">
					<img src="https://mgc-styles.s3.amazonaws.com/foto/solariavacanze/7-villa-luddui-2_list-img.jpg" class="img-fluid">
					<div class="info text-white">
						<h3 class="font-weight-bold">Villetta Stella Maris</h3>
						<strong class="d-block">1 Camera da letto</strong>
						<strong class="d-block">Budoni</strong>
				</div>
					<div class="content-room-image text-center">
						<div class="content-middle">
							<div class="min-log">
								<img src="/images/logos/solaria-logo.png" alt="logo Solaria" width="100">
							</div>
							<h3 class="text-white mt-2">Villa Ludduì</h3>
							<a href="/vacanze" class="myButton">VEDI TUTTO</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	</section>

</div>

</template>

<style scoped>
.info{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	padding: 1.2rem;
	background-color: #00000034;
	color: #fff;
	text-shadow: 0px 1px 1px #8d8d8d;
}
.black {
background-color: #ffd900;
}
h2{
	font-size: 1.4rem;
    font-weight: bold;
}
@media (min-width: 768px) {
	h2{
	font-size: 2.4rem;
	}
}

.imagen-room{
	position: relative;
	overflow: hidden;
	margin-top: 15px;
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
	background-color: #21b186e5;
	transition:all 1s ease;
	-moz-transition: all 1s ease;
	display: flex;
	justify-content: center;
	align-items: center;
}
.imagen-room:hover .content-room-image{
	top: 0;
}
/* @media (max-width: 767.98px) {
	.content-room-image{
		top: 0;
	}
} */
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

@media (max-width: 580px) {
	.no-padding-movil{
		padding: 0px;
	}
}

</style>
