<template>
        <div class="row justify-content-md-center d-flex align-items-center" style="height: 80vh;" >
    <div class="col-md-4 ">
                    <div class="card">
                            <div class="card-body ">
                                <div class="text-center">
                                    <h3 class="card-title">ເຂົ້າສູ່ລະບົບ</h3>
                                </div>

                                <div class="m-t-40">
                                   <div class="form-group">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email"  placeholder="Enter email" v-model="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" v-model="password" v-on:keyup="sigin($event)">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <router-link to="/register">ລົງທະບຽນ</router-link>
                                        <button type="button" class="btn btn-primary text-white" @click="Login()">ເຂົ້າສູ່ລະບົບ</button>
                                    </div>
                                    <div class="alert alert-warning mt-4" v-if="showError">{{textError}}</div>

                                </div>
                            </div>
                        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: 'MyappLogin',

    data() {
        return {
            email:'',
            password:'',
            showError:false,
            textError:'',
        };
    },

    mounted() {


    },

    methods: {
        sigin(e){
            console.log('enter login')
            if(e.which == 13){
                this.Login()
            }
        },
        Login(){
            if(this.email != '' && this.password !=''){
                if(this.password.length > 5){
                    this.$axios.get('/sanctum/csrf-cookie').then(response =>{
                        this.$axios.post('api/login', {
                            email: this.email,
                            password: this.password,

                        }).then(response => {
                            if(response.data.success){
                                window.location.href = '/store';
                            }else{
                                this.showError = true;  this.textError = 'ອີເມວ ຫຼື ລະຫັດຜ່ານຂອງທ່ານ ບໍ່ຖືກຕ້ອງ!'
                            }
                        }).catch(function (error){
                            console.error(error);
                        })
                    })
                }else{
                this.showError = true;  this.textError = 'ລະຫັດຜ່ານ ຕ້ອງຫຼາຍກ່ອນ 6 ຕົວອັກສອນ'
            }
            }else{
                this.showError = true;  this.textError = 'ກະລຸນາປ້ອນ ອີເມວ ແລະ ລະຫັດຜ່ານ'
            }
        }
    },

    beforeRouteEnter(to, from, next){

        if(window.Laravel.isLoggedin){
            window.location.href = "/store";
        }
        next();
    },
};
</script>

<style lang="scss" scoped>

</style>
