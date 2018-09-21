<template>
    <div>
        <section class="py-3 bg-white">
            <div class="container h-100 p-0">
                <div class="row justify-content-center align-items-center">	
                    <form class="col-md-12 form-inline form-booking flex-column flex-md-row justify-content-center">
                        <!-- <div class="form-group">
                            <label for="inputRoom" class="sr-only">Cameera</label>
                            <select name="room" class="form-control">
                                <option disabled selected>Cameera</option>
                                <option value="room101">Room 101</option>
                                <option value="room102">Room 102</option>
                                <option value="room103">Room 103</option>
                                <option value="room104">Room 104</option>
                            </select>
                        </div> -->

                        <!-- <div class="hr d-lg-none my-3"></div> -->
                        
                        <div class="form-group d-flex">
                            <div class="w-50">
                                <input type="text" class="form-control text-center" placeholder="Check-in"/> 
                            </div>
                            <div class="w-50">
                                <input type="text" class="form-control text-center" placeholder="Check-out"/> 
                            </div>
                        </div>

                        <!-- <div class="hr d-lg-none my-3"></div> -->

                        <!-- <div class="form-group d-flex">

                            <div class="w-50">
                                <label for="inputMen" class="sr-only">Adulti</label>
                                <select name="adult" class="form-control">
                                <option disabled selected>Adulti</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                </select>
                            </div>
                            
                            <div class="w-50">
                                <label for="inputChild" class="sr-only">Bambino</label>
                                <select name="boys" class="form-control">
                                    <option disabled selected>Bambino</option>
                                    <option value="1">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group text-center justify-content-center">
                            <button type="submit" class="btn btn-lg btn-primary">CERCA</button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
</template>
<style scoped>
/* formulario booking */
.form-booking .form-group, .form-control{
	min-width: 100%;
	display: block;
	margin: 0;
}
.form-booking .form-control{
	border: 0px solid transparent;
}
.form-booking .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: transparent;
    outline: 0;
    box-shadow: 0 0 0 0.2rem transparent;
}
.hr{
	width: 100%;
    height: 1px;
    background-color: transparent;
    border: 0.5px solid #555;
}
.form-booking .btn-primary{
	background-color: #2ac093;
    border-color: #2ac093;

}
.form-booking .btn-primary:hover {
    color: #fff;
    background-color: #2ac093;
    border-color: #2ac093;
}
.form-booking .btn-primary.focus, .form-booking .btn-primary:focus{
	box-shadow: 0 0 0 0.2rem #2ac0938a;
}
.form-booking .btn-primary:not(:disabled):not(.disabled):active{
	color: #fff;
    background-color: #2ac093;
    border-color: #2ac093;
}
.form-booking .btn-lg {
    padding: .3rem 1rem;
    font-size: 1.25rem;
    line-height: 1.2;
    border-radius: 1rem;
}
.form-booking select.form-control {
	text-align-last:center;
}

@media screen and (min-width: 992px){
	.form-booking .form-group, .form-control{
		min-width: 180px;
		width: auto;
		display: block;
		margin: 0;
	}
}
</style>
