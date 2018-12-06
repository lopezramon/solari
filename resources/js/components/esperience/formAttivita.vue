<template>
    <div>


        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    
                            <div class="modal-header">
                                <h5 class="modal-title">Consultarci</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <template v-if="loading">
                            <div class="container d-flex justify-content-center">
                                <div class="row m-5 mb-4">
                                    <div class="col-12">
                                        <pulse-loader :loading="loading" :color="color" :size="size"/>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template v-else>
                            <div class="container">
                                <div class="row">
                                <div class="col-12">
                                    <form class="row">
                                
                                        <div class="col-12 my-3 col-md-6">
                                            <label for="name" class="text-uppercase m-0">Nome</label>
                                            <span v-show="errors.has('name')" :class="{'text-danger': errors.has('name') }">*</span>
                                            <input id="name" type="text" :maxlength="50" v-validate="'required|max:50'" name="name" 
                                            class="form-control form-material" placeholder="Name">
                                            <small v-show="errors.has('name')" class="help text-danger">{{ errors.first('name') }}</small>
                                        </div>

                                        <div class="col-12 my-3 col-md-6">
                                            <label for="phone" class="text-uppercase m-0">Phone</label>
                                            <span v-show="errors.has('phone')" :class="{'text-danger': errors.has('phone') }">*</span>
                                            <input id="phone" type="text" :maxlength="50" v-validate="'required|max:50'" name="phone" 
                                            class="form-control form-material" placeholder="Phone">
                                            <small v-show="errors.has('phone')" class="help text-danger">{{ errors.first('phone') }}</small>
                                        </div>

                                        <div class="col-12 my-3 col-md-6">
                                            <label for="email" class="text-uppercase m-0">Email</label>
                                            <span v-show="errors.has('email')" :class="{'text-danger': errors.has('email') }">*</span>
                                            <input id="email" type="text" :maxlength="50" v-validate="'required|max:50'" name="email" 
                                            class="form-control form-material" placeholder="Email">
                                            <small v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</small>
                                        </div>

                                        <div class="col-12 my-3 col-md-6">
                                            <label for="activity" class="text-uppercase m-0">Activity</label>
                                            <span v-show="errors.has('activity')" :class="{'text-danger': errors.has('activity') }">*</span>
                                            <input id="activity" type="text" :maxlength="50" v-validate="'required|max:50'" name="activity" 
                                            class="form-control form-material" placeholder="Activity">
                                            <small v-show="errors.has('activity')" class="help text-danger">{{ errors.first('activity') }}</small>
                                        </div>

                                        <div class="col-12 my-3 col-md-4">
                                            <label for="adult" class="text-uppercase m-0">Adult</label>
                                            <span v-show="errors.has('adult')" :class="{'text-danger': errors.has('adult') }">*</span>
                                            <input id="adult" type="text" :maxlength="50" v-validate="'required|max:50'" name="adult" 
                                            class="form-control form-material" placeholder="Adult">
                                            <small v-show="errors.has('adult')" class="help text-danger">{{ errors.first('adult') }}</small>
                                        </div>

                                        <div class="col-12 my-3 col-md-4">
                                            <label for="chiildren" class="text-uppercase m-0">Children</label>
                                            <span v-show="errors.has('chiildren')" :class="{'text-danger': errors.has('chiildren') }">*</span>
                                            <input id="chiildren" type="text" :maxlength="50" v-validate="'required|max:50'" name="chiildren" 
                                            class="form-control form-material" placeholder="Chiildren">
                                            <small v-show="errors.has('chiildren')" class="help text-danger">{{ errors.first('chiildren') }}</small>
                                        </div>

                                        <div class="col-12 my-3 col-md-4">
                                            <label for="pets" class="text-uppercase m-0">Pets</label>
                                            <span v-show="errors.has('pets')" :class="{'text-danger': errors.has('pets') }">*</span>
                                            <input id="pets" type="text" :maxlength="50" v-validate="'required|max:50'" name="pets" 
                                            class="form-control form-material" placeholder="pets">
                                            <small v-show="errors.has('pets')" class="help text-danger">{{ errors.first('pets') }}</small>
                                        </div>

                                        <div class="col-12 my-3">
                                            <label for="message" class="text-uppercase m-0">Message</label>
                                            <span v-show="errors.has('message')" :class="{'text-danger': errors.has('message') }">*</span>
                                            <textarea id="message" type="text" :maxlength="50" v-validate="'required|max:50'" name="message" 
                                            class="form-control form-material" placeholder="message"></textarea>
                                            <small v-show="errors.has('message')" class="help text-danger">{{ errors.first('message') }}</small>
                                        </div>

                                        <div class="col-12 my-3 py-2 text-center">
                                            <button  disabled type="button" class="btn btn-primary btn-lg text-bold">
                                                <span class="text-btn-white">Consultarci</span>
                                            </button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                            </div>
                        </template>


                        

                </div>
            </div>
        </div>


    </div>
</template>

<script>
    import { PulseLoader } from 'vue-spinner/dist/vue-spinner.min'

    export default {
        components: { PulseLoader },
        data() {
            return {
                form: { name: null, phone: null, email: null, activity: null, adult: null, children: null, pets: null, message: null },
                color: '#1b1b1b',
                size: '16px',
                loading: false,
            }
        }
    }
</script>
<style>
    label{
        font-size: .7rem;
    }
</style>

