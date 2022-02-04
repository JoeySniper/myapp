<template>
    <div class="container-fluid">


                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard 1</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Store</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button>
                        </div>
                    </div>
                </div>







        <div class="row g-0">
					<div class="col-lg-3 col-md-6">
						<div class="card border">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="d-flex no-block align-items-center">
											<div>
												<h3><i class="icon-screen-desktop"></i></h3>
												<p class="text-muted">MYNEW CLIENTS</p>
											</div>
											<div class="ms-auto">
												<h2 class="counter text-primary">23</h2>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="progress">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="card border">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="d-flex no-block align-items-center">
											<div>
												<h3><i class="icon-note"></i></h3>
												<p class="text-muted">NEW PROJECTS</p>
											</div>
											<div class="ms-auto">
												<h2 class="counter text-cyan">169</h2>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="progress">
											<div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="card border">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="d-flex no-block align-items-center">
											<div>
												<h3><i class="icon-doc"></i></h3>
												<p class="text-muted">NEW INVOICES</p>
											</div>
											<div class="ms-auto">
												<h2 class="counter text-purple">157</h2>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="progress">
											<div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="card border">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="d-flex no-block align-items-center">
											<div>
												<h3><i class="icon-bag"></i></h3>
												<p class="text-muted">All PROJECTS</p>
											</div>
											<div class="ms-auto">
												<h2 class="counter text-success">431</h2>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="progress">
											<div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>


            <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                 <div class="d-flex">
                                    <div>
                                        <h3 class="card-title">ລາຍການ ສະຕ໋ອກສິນຄ້າ</h3>
                                    </div>
                                    <div class="ms-auto">
                                        <button type="button" v-if="!FormShow"  class="btn btn-success text-white me-2 " @click="AddNew()"  >
                                        <i class="ti ti-plus"></i> ເພີ່ມໃໝ່
                                        </button>
                                        <!-- <button type="button" v-if="FormShow" :class="checkForm" class="btn btn-info text-white me-2 "   @click="SaveForm()" >
                                        <i class="ti ti-save"></i> ບັນທຶກ
                                        </button> -->
                                        <button type="button" v-if="FormShow"  class="btn btn-info text-white me-2 "   @click="checkFormAdd()" >
                                        <i class="ti ti-save"></i> ບັນທຶກ
                                        </button>
                                        <button type="button" v-if="FormShow" class="btn btn-danger text-white"    @click="Cancel()" >
                                        <i class="ti ti-close"></i> ຍົກເລີກ
                                        </button>
                                    </div>
                                </div>
                                <!-- {{FormData}} <hr> -->
                                <div class="row" v-if="FormShow">
                                    <div class="col-md-3 p-2">
                                        <!-- {{imagesPreview}} -->
                                        <img :src="imagesPreview" class="mb-2" style="width: 100%" alt="">
                                        <input type="file" class="form-control" @change="onSelected">
                                    </div>
                                    <div class="col-md-9">

                                        <!-- {{FormProduct}} -->
                                        <div class="form-group" :class="hasDangerName">
                                            <label for="product-name" class="form-label">ຊື່ສິນຄ້າ</label>
                                            <input type="text" v-model="FormProduct.name" :class="inputDangerName" class="form-control" id="product-name" placeholder="ປ້ອນຊື່ສິນຄ້າ">
                                        </div>

                                        <div class="form-group" :class="hasDangerAmount">
                                            <label for="product-amount" class="form-label">ຈຳນວນ</label>
                                            <cleave  type="text" :options="option" v-model="FormProduct.amount" :class="inputDangerAmount" class="form-control" id="product-amount" placeholder="ປ້ອນຈຳນວນ"/>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" :class="hasDangerPrice_buy">
                                                    <label for="price-buy" class="form-label">ລາຄາຊື້</label>
                                                    <cleave type="text" :options="option" v-model="FormProduct.price_buy" :class="inputDangerPrice_buy" class="form-control" id="price-buy" placeholder="ປ້ອນລາຄາຊື້"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" :class="hasDangerPrice_sell">
                                                    <label for="price-sell" class="form-label">ລາຄາຂາຍ</label>
                                                    <cleave type="text" :options="option" v-model="FormProduct.price_sell" :class="inputDangerPrice_sell" class="form-control" id="price-sell" placeholder="ປ້ອນລາຄາຂາຍ"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                 <div class="table-responsive" v-if="!FormShow">
                                     <div class="row pt-3 pb-3">
                                         <div class="col-md-6">

                                         </div>
                                         <div class="col-md-6">
                                             <div class="input-group">
                                                <input type="text" v-model="SearchProduct" @keyup.enter="GetAllStore()" class="form-control" placeholder="ຄົ້ນຫາ...">
                                             </div>
                                         </div>
                                     </div>
                                    <table class="table border color-table purple-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ຊື່ສິນຄ້າ</th>
                                                <th>ຈຳນວນ</th>
                                                <th>ລາຄາຊື້</th>
                                                <th>ຈັດການ</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="list in FormData.data" :key="list.id">
                                                <td width="30">{{list.id}}</td>
                                                <td>{{list.name}}</td>
                                                <td>{{formatPrice(list.amount)}}</td>
                                                <td>{{formatPrice(list.price_buy)}}</td>
                                                <td width="150" class="text-center">
                                                    <button type="button" @click="EditPro(list.id)" class="btn btn-info btn-circle text-white me-2"><i class="ti-pencil"></i> </button>
                                                    <button type="button" @click="DelPro(list.id)" class="btn btn-danger btn-circle text-white"><i class="ti-trash"></i> </button>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                    <pagination :pagination="FormData" @paginate="GetAllStore($event)" :offset="4"></pagination>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>

</template>

<script>
export default {
    name: 'MyappHome',

    data() {
        return {
                FormData: [],
                FormShow: false, //  ສະແດງແບບຟອມ
                FormType: true, // ປະເພດຂອງຟອມ true = ບັນທຶກໃໝ່, false = ອັບເດດ
                FormID: "", // id ສຳລັບອັບເດດ
                urlLocaltion: window.location.origin,
                imagesPreview: window.location.origin+"/assets/images/add_images.png",
                FormProduct: {
                    name: "",
                    amount: "",
                    price_buy: "",
                    price_sell: "",
                },
                option:{
                    // prefix: '$',
                    numeral: true,
                    numeralPositiveOnly:true,
                    noImmediatePrefix:true,
                    rawValueTrimPrefix:true,
                    numeralIntegerScale:10,
                    numeralDecimalScale:2,
                    numeralDecimalMark:'.',
                    delimiter:',',
                },
                hasDangerName:'',
                inputDangerName: '',
                hasDangerAmount: '',
                inputDangerAmount:'',
                hasDangerPrice_buy: '',
                inputDangerPrice_buy:'',
                hasDangerPrice_sell: '',
                inputDangerPrice_sell:'',
                SearchProduct:'',

                imageProduct:'',
                };
    },

    mounted() {

    },

    computed:{
        checkForm(){
            if(this.FormProduct.name == "" || this.FormProduct.amount == "" || this.FormProduct.price_buy == "" || this.FormProduct.price_sell == ""){
                return "disabled";
            }else{
                return "";
            }
        },
    },
    watch:{
        SearchProduct(){
            if(this.SearchProduct == ''){
                this.GetAllStore();
            }
        }
    },
    methods: {
        GetAllStore(page){
            this.$axios.get('/sanctum/csrf-cookie').then((response) => {
                axios.get(`/api/store?page=${page}&s=${this.SearchProduct}`).then((response) =>{
                    this.FormData = response.data;
                }).catch((error)=>{
                    console.log(error);
                })
            })
        },
        AddNew() {
            this.FormShow = true

        },
        Cancel() {
            this.FormShow = false
        },
        SaveForm(){

            if(this.FormType == true){
               // console.log(this.FormProduct);
                // this.FormData.push({
                //     id: Math.floor(Math.random() * 1000),
                //     name: this.FormProduct.name,
                //     amount: this.FormProduct.amount,
                //     price_buy: this.FormProduct.price_buy,
                //     price_sell: this.FormProduct.price_sell,
                // });

                this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
                    let formData = new FormData();
                    formData.append('name', this.FormProduct.name);
                    formData.append('amount', this.FormProduct.amount);
                    formData.append('price_buy', this.FormProduct.price_buy);
                    formData.append('price_sell', this.FormProduct.price_sell);
                    formData.append('file', this.imageProduct);
                    axios.post("/api/store/add", formData, {headers:{"Content-Type": "multipart/form-data"}})
                    .then((response)=>{

                        if(response.data.success){
                            this.GetAllStore();
                            console.log('ບັນທຶກຂໍ້ມູນສຳເລັດ');
                        }else{
                            console.log(response.data.message);
                        }
                    })
                    .catch((error)=>{
                        console.log(error);
                    });
               })


            }else{
            //    console.log("ມີການອັດເດ ID = " + this.FormID)

            //    this.FormData.find((i)=>i.id == this.FormID).name = this.FormProduct.name
            //    this.FormData.find((i)=>i.id == this.FormID).amount = this.FormProduct.amount
            //    this.FormData.find((i)=>i.id == this.FormID).price_buy = this.FormProduct.price_buy
            //    this.FormData.find((i)=>i.id == this.FormID).price_sell = this.FormProduct.price_sell

                this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
                    let formData = new FormData();
                    formData.append('name', this.FormProduct.name);
                    formData.append('amount', this.FormProduct.amount);
                    formData.append('price_buy', this.FormProduct.price_buy);
                    formData.append('price_sell', this.FormProduct.price_sell);
                    formData.append('file', this.imageProduct);

                    axios.post(`/api/store/update/${this.FormID}`, formData, {headers:{"Content-Type": "multipart/form-data"}})
                    .then((response)=>{
                            this.GetAllStore();
                        // if((response.data.success)){
                        //     this.GetAllStore();
                        // } else{
                        //     console.log(response.data.message);
                        // }
                    }).catch((error) => {
                        console.log(error);
                    });
                });
            }

            this.FormProduct.name = ""
            this.FormProduct.amount = ""
            this.FormProduct.price_buy = ""
            this.FormProduct.price_sell = ""
            this.FormProduct.imageProduct = ""

            this.FormShow = false
            //ເພື່ອໃຫ້ເພີ່ມໃໝ່ທຸກຄັ້ງ
            this.FormType = true
        },
        EditPro(id){
            // // console.log(id)
            // let item = this.FormData.find((i)=>i.id == id)
            // // console.log(item)
            this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
                axios.get(`/api/store/edit/${id}`)
                .then((response)=>{
                    console.log(response)
                    this.FormProduct.name = response.data.name
                    this.FormProduct.amount = response.data.amount
                    this.FormProduct.price_buy = response.data.price_buy
                    this.FormProduct.price_sell = response.data.price_sell
                }).catch((error)=>{
                    console.log(error);
                })
            });

            this.FormShow = true



            // ປ່ຽນສະຖານະ ເພື່ອອັບເດດ
            this.FormType = false
            this.FormID = id
        },
        DelPro(id){
            // console.log(id)

            this.$swal({
                title: "ທ່ານແນ່ໃຈບໍ່?",
                text: "ທີ່ຈະລຶບຂໍ້ມູນນີ້",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor:"#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText:"ຢືນຢັນລຶບ!",
                cancelButtonText: "ຍົກເລີກ",
            }).then((result)=>{
                if(result.isConfirmed){
                    // let index = this.FormData.map((i)=>i.id).indexOf(id)
                    // this.FormData.splice(index, 1)

                    this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
                        axios.delete(`/api/store/delete/${id}`)
                        .then((response)=>{
                               this.GetAllStore();
                            // if(response.data.success){
                            //     this.GetAllStore();
                            // }
                        })
                        .catch((error)=>{
                            console.log(error);
                        })
                    });

                    this.$swal.fire(
                        "ລະບົບໄດ້ຖືກລຶບແລ້ວ",
                        "",
                        "info",
                    )
                }
            });


        },
        formatPrice(value){
            let val = (value / 1).toFixed(0).replace(",", ".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        checkFormAdd(){

            if(this.FormProduct.name == ''){
                this.hasDangerName = 'has-danger'
                this.inputDangerName = 'form-control-danger'
            }else{
                 this.hasDangerName = ''
                this.inputDangerName = ''
            }

            if(this.FormProduct.amount == ''){
                this.hasDangerAmount = 'has-danger'
                this.inputDangerAmount = 'form-control-danger'
            }else{
                this.hasDangerAmount = ''
                this.inputDangerAmount = ''
            }

            if(this.FormProduct.price_buy == ''){
                this.hasDangerPrice_buy = 'has-danger'
                this.inputDangerPrice_buy = 'form-control-danger'
            }else{
                 this.hasDangerPrice_buy = ''
                this.inputDangerPrice_buy = ''
            }

            if(this.FormProduct.price_sell == ''){
                this.hasDangerPrice_sell = 'has-danger'
                this.inputDangerPrice_sell = 'form-control-danger'
            }else{
                 this.hasDangerPrice_sell = ''
                this.inputDangerPrice_sell = ''
            }

            if(this.FormProduct.name != "" && this.FormProduct.amount != "" && this.FormProduct.price_buy != "" && this.FormProduct.price_sell != "" ){
                this.SaveForm()
            }
        },
        onSelected(event){
            this.imageProduct = event.target.files[0];
            // console.log(this.imageProduct)
            let reader = new FileReader();
            reader.readAsDataURL(this.imageProduct)
            reader.addEventListener("load", function(){
                this.imagesPreview = reader.result;
            }.bind(this), false)
        }

    },
    created(){
        this.GetAllStore();
    },
    beforeRouteEnter(to, from, next){
        if(!window.Laravel.isLoggedin){
            window.location.href = '/login';
        }
        next();
    },
};
</script>

<style lang="scss" scoped>

</style>
