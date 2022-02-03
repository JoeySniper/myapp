<template>
    <div
    class="row justify-content-md-center d-flex align-items-center"
    style="height: 80vh"
  >
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="text-center">
            <h3 class="card-title">ລົງທະບຽນ</h3>
          </div>

          <div class="m-t-40">
            <div class="form-group">
              <label for="email" class="form-label">ຊື່ຜູ້ໃຊ້</label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="Name"
                v-model="name"
              />
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email address</label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Enter email"
                v-model="email"
              />
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                class="form-control"
                id="password"
                placeholder="Password"
                v-model="password"
              />
            </div>
            <div class="form-group">
              <label for="password" class="form-label">ຍືນຍັນ Password</label>
              <input
                type="password"
                class="form-control"
                id="password2"
                placeholder="Password2"
                v-model="password2"
              />
            </div>
            <div class="text-center">
              <button
                type="button"
                class="btn btn-primary text-white"
                @click="Register()"
              >
                ລົງທະບຽນ
              </button>
            </div>
            <div class="alert alert-warning mt-4" v-if="showError">
              {{ textError }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'MyappReport',

    data() {
        return {
            name:'',
            email:'',
            password:'',
            password2:'',
            showError:false,
            textError:'',

        };
    },

    mounted() {

    },

    methods: {
        Register(){
            if(this.name == '' || this.email == '' || this.password == ''){
                this.showError = true; this.textError = "ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ"
            }else{
                if(this.password2 != '' && this.password == this.password2){
                    this.showError = false;     this.textError = ''

                    // Register

                    this.$axios.get("/sanctum/csrf-cookie").then(response => {
                        this.$axios.post('api/register', {
                            name: this.name,
                            email: this.email,
                            password: this.password,
                        }).then(response =>{
                            if(response.data.success){
                                this.$router.push('Login')
                            }else{
                                alert(response.data.message);
                                this.showError = true
                                this.textError = 'ລະບົບຂັດຂ້ອງ ບໍ່ສາມາດລົງທະບຽນໄດ້!'
                            }
                        }).catch(function (error){
                            console.error(error);
                        });
                    })
                }else{
                    this.showError = true; this.textError = 'ລະຫັດຜ່ານຂອງທ່ານບໍ່ກົງກັນ'
                }
            }
        }
    },
};
</script>

<style lang="scss" scoped>

</style>
