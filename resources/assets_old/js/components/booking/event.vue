<template>
    <div >
        <returnback url="/chisiamo" margin="mb-3" />

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-white text-center ">
                    <h3 class="text-uppercase ">Informazioni per eventi</h3>
                    <p class="text-uppercase font-weight-bold">Via Roma 156(8114,99km)/ 07026 Olbia</p>
                    <br>
                    </div>
                </div>                
            </div>
            <form class="form-contact">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <input required class="form-control form-material" :maxlength="30" name="name" v-model="name" v-validate="'required|alpha'" type="text" placeholder="Nome(*):">
                                    <span v-show="errors.has('name')" class="text-danger">{{ errors.first('name') }}</span>
                                    <br>
                                   <input required class="form-control form-material" :maxlength="20" name="phone" v-model="phone" v-validate="'required|numeric'" type="text" placeholder="Telefono(*):">
                                    <span v-show="errors.has('phone')" class="text-danger">{{ errors.first('phone') }}</span>
                                    <br> 
                                    <input required class="form-control form-material" :maxlength="30" name="email" v-model="email" v-validate="'required|email'" type="text" placeholder="Mail(*):">
                                    <span v-show="errors.has('email')" class="text-danger">{{ errors.first('email') }}</span>
                                    <br>                                
                                </div>

                                <div class="col-md-6">
                                     <input  required class="form-control form-material" :maxlength="30" name="date" v-model="date" v-validate="'required|alpha_spaces'" type="date" placeholder="Data Dell'evento(*): dd/mm/yyyy">
                                    <span v-show="errors.has('date')" class="text-danger">{{ errors.first('city') }}</span>
                                    <br>
                                    <select required class="form-control form-material" v-model="type" name="type" type="text" >
                                              <option value="0">Tipo di evento(*)</option>
                                              <option value="1">Compleanno</option>
                                              <option value="2">Matrimonio</option>                                       
                                    </select>
                                    <span v-show="errors.has('city')" class="text-danger">{{ errors.first('city') }}</span>
                                    <br>
                                     <textarea required class="form-control form-material" minlength="20" maxlength="100" name="description" v-model="description" v-validate="'required|alpha_spaces'" type="textarea" placeholder="Messagio(*)"></textarea>
                                    <span v-show="errors.has('date')" class="text-danger">{{ errors.first('city') }}</span>                                    

                                    <br>

                                </div>  

                                <div class="col-md-12">
                                    <p class="text-center">
                                        Invia un'email. Tutty i campi contrassegnati da * sono obbligatori.Invia una copia alla tua email. <a href="#">www.pizzeriadaadrianno.com</a>
                                    </p><br>
                                    
                                </div>  

                                                 
                            </div>
                                <div class="text-center justify-content-center align-items-center" align="center">
                                    <button type="submit" >INVIARE</button><br><br>
                                </div> 
                        </div>
 
                    </form>
        </div>
        <menu_responsive/>
        <newsletter/>
    </div>

</template>
<script>
    export default {
        name: 'form-personal-retreat',
        data: () => ({
            email: '',
            name: '',
            phone: '',
            date: '',
            description: '',
            type: '0',

        }),
        methods: {
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        // eslint-disable-next-line
                        alert('Form Submitted!');
                        return;
                    }
                    alert('Correct them errors!');
                });
            }
        }
    };
</script>

<style scoped>
    .form-control.form-material {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #777;
        background-color: transparent;
        background-clip: padding-box;
        border: 0 solid #ced4da;
        border-bottom: 1px solid #ced4da;
        border-radius: 0;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    select.form-control.form-material {
        color: #777;
    }
    .form-control:focus {
        background-color: transparent;
        border-color: #dc3545;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,0);
    }
    .form-control.v2:focus {
        background-color: transparent;
        border-color: #dc3545;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,0);
    }
    h2 {
        text-align: center;
        font-weight: bold;
        font-size: 28px;
    }
    h3{
        margin-bottom: 10px;
        text-align: center;
    }
    h4{
        margin-bottom: 10px;
        text-align: center;
        margin-top: 50px;
    }
    label {
        margin: 0 auto;
        display: block;
        text-align: center;
        margin-bottom: -15px;
    }
    button {
        background-color: #216619;
        border-color: #216619;
        border: none;
        color: white;
        padding: 5px 50px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
    }
    p{
        color:white;
        text-align: center;
    }
    a{
        color:red;
    }
    input{
        color:#777;
    }
    .contact-wrapper {
        margin: 0 auto;
        display: block;
        color: #fff;
        font-weight: bold;
        border: 0px;
        font-size: 12px;
        padding: 4px 30px;
        margin-top: -10px;

        background: #f90105;
        background: -moz-linear-gradient(top, #f90105 0%, #9b0516 100%);
        background: -webkit-linear-gradient(top, #f90105 0%,#9b0516 100%);
        background: linear-gradient(to bottom, #f90105 0%,#9b0516 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f90105', endColorstr='#9b0516',GradientType=0 );
    }
    .contact-wrapper .send:hover {
        background: #fd383d;
        background: -moz-linear-gradient(top, #fd383d 1%, #ba182b 100%);
        background: -webkit-linear-gradient(top, #fd383d 1%,#ba182b 100%);
        background: linear-gradient(to bottom, #fd383d 1%,#ba182b 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fd383d', endColorstr='#ba182b',GradientType=0 );
    }
    
</style>