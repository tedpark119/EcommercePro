<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                 <span>Products</span>For<span>Peaches</span>
               </h2>

               <!-- <div>
                  <form action="{{url('product_search')}}" method="GET">

                  @csrf

                     <input style="width: 400px;" type="text" name="search" placeholder="search anything">

                     <input type="submit" value="search">
                  </form>
               </div> -->
            </div>
            <div class="row">

            @foreach($product as $products)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           Product Details
                           </a>

                           <form action="{{url('add_cart', $products->id)}}" method="Post">

                           @csrf
                               <div class="row">
                              <div class="col-md-4">
                              <input type="number" name="quantity" value="1" min="1" style="width: 90px">
                              </div>

                              <div class="col-md-4">
                              <input type="submit" value="Add To Cart" style="height:43px; width:185px">
                              </div>
                               </div>
                              
                           </form>
                          

                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>

                        @if($products->discount_price!=null)

                        <h6 style= "color:red">
                        Discount price
                        <br>
                       Rs{{$products->discount_price}}
                        </h6>
               

                        <h6 style="text-decoration: line-through; 
                        color:blue">
                        Price
                        <br>
                       Rs{{$products->price}}
                        </h6>

                        @else

                        <h6 style="color:blue">
                        Price
                        <br>
                       Rs{{$products->price}}
                        </h6>

                        @endif

                     </div>
                  </div>
               </div>
             @endforeach

             <span style="padding-top:20px">

             {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>

         </div>
      </section>