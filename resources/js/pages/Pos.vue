<template>
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Dashboard 1</h4>
      </div>
      <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item">
              <a href="javascript:void(0)">Home</a>
            </li>
            <li class="breadcrumb-item active">Pos</li>
          </ol>
          <button
            type="button"
            class="btn btn-info d-none d-lg-block m-l-15 text-white"
          >
            <i class="fa fa-plus-circle"></i> Create New
          </button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <input type="text" class="form-control" placeholder="ຄົ້ນຫາ" />
          </div>
        </div>

        <div class="row" style="height: 67vh; overflow:auto;">
            <div class="col-md-3" v-for="list in productData.data" :key="list.id">
                <div class="card cursor-poiter" @click="AddToOrder(list.id)">
                    <img v-if="list.images" class="card-img-top img-responsive" :src="urlLocation +'/assets/images/'+ list.images" style="width:100%; height:140px; object-fit: cover; object-position: center;"  alt="Card image cap">
                    <img v-if="!list.images" class="card-img-top img-responsive" :src="urlLocation +'/assets/images/add_images.png'" style="width:100%; height:140px; object-fit: cover; object-position: center;" alt="Card image cap">

                    <div class="card-body text-center">
                        <p class="card-text">{{list.name}}</p>
                        <p class="card-text text-info">{{formatPrice(list.price_sell)}} kip</p>
                    </div>
                </div>
            </div>
        </div>


      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-info d-flex justify-content-between">
              <span><strong> ລວມຍອດເງິນ: </strong></span>
              <span><strong>0 ກີບ</strong></span>
            </h4>
            <button
              type="button"
              disabled=""
              class="btn btn-success text-white mb-2"
              style="width: 100%">
              <i class="mdi mdi-currency-usd"></i> ຊຳລະເງິນ
              </button>
            <div class="table-responsive" style="height: 65vh; overflow: auto">
              <table class="table color-table muted-table border">
                <thead>
                  <tr>
                    <th>ລາຍການ</th>
                    <th width="120" class="text-center">ລາຄາ</th>
                    <th width="130" class="text-end">
                      ຍອດລວມ (<i class="mdi mdi-close-circle text-danger cursor-pointer"></i>)
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in ListOrder" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ formatPrice(item.price_sell) }} ກີບ <br> {{item.order_amount}}</td>
                    <td>{{ formatPrice(item.price_sell*item.order_amount)}} ກີບ</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MyappPos",

  data() {
    return {
        productData:[],
        SearchProduct:'',
        urlLocation: window.location.origin,
        ListOrder:[],
    };
  },

  mounted() {},

  methods: {
      GetAllStore(page){
            this.$axios.get('/sanctum/csrf-cookie').then((response) => {
                axios.get(`/api/store?page=${page}&s=${this.SearchProduct}`).then((response) =>{
                    this.productData = response.data;
                }).catch((error)=>{
                    console.log(error);
                })
            })
        },

        formatPrice(value){
            let val = (value / 1).toFixed(0).replace(",", ".");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        AddToOrder(id){
          let item = this.productData.data.find((i) =>i.id==id);
            if(this.ListOrder.find((i) => i.id==id)){
              // alert('ມີໃນລາຍການ')
              let old_order_amount = this.ListOrder.find((i)=>id==id).order_amount;
              if(item.amount-old_order_amount>0){
                this.ListOrder.find((i)=>i.id==id).order_amount = old_order_amount + 1
              }else{
                alert('ສິນຄ້າໝົດ')
              }

            }else{
              if(item.amount > 0){
                this.ListOrder.push({
                  id:item.id,
                  name:item.name,
                  price_sell:item.price_sell,
                  order_amount:1
                });
              }else{
                alert('ບໍ່ມີສິນຄ້າ')
              }
            }
        },
    //     AddToOrder(id){

    //         let item = this.productData.data.find((i)=>i.id==id);
    //         if(this.ListOrder.find((i)=>i.id==id)){
    //                     let old_order_amount = this.ListOrder.find((i)=>i.id==id).order_amount;
    //                     if((item.amount-old_order_amount)>0){
    //                         this.ListOrder.find((i)=>i.id==id).order_amount = old_order_amount+1;
    //                     } else { console.log('loss!')}
    //                } else {
    //                    if(item.amount>0){
    //                         this.ListOrder.push({
    //                             id: item.id,
    //                             name: item.name,
    //                             price_sell: item.price_sell,
    //                             order_amount: 1
    //                         });
    //                     } else { console.log('loss!')}
    //                }


    // },
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
