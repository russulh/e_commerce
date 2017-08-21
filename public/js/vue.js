Vue.component('item',{
   'props':['item'],
   'template':`
               <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                        <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{item.name}}</h4>
                            <h5>$ {{item.sales_price}}</h5>
                            <p class="card-text">{{item.description}}</p>
                        </div>
                        <div class="card-footer">
                           <a href="/cart/add" class="btn btn-primary btn-block">Add <i class="fa fa-cart-plus fa-lg" aria-hidden="true"></i></a>
                        </div>
                  </div>
               </div>
            `,
});

Vue.component('useraddress',{
   'props':['address'],
   'template':`
               <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">{{address.region}}, {{address.zip_code}}</h4>
                            <h5>{{address.city}}</h5>
                            <p class="card-text">{{address.country}}</p>
                        </div>
                        <div class="card-footer">
                           <a href="/user/address/update" class="btn btn-primary">Update</a>
                           <a :href="/user/address/delete/'{!!address.id!!}'" class="btn btn-primary">Delete</a>
                        </div>
                  </div>
               </div>
            `,
});
