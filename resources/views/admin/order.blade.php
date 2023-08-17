<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">

.title_deg
{
   text-align: center;
   font-size: 25px;
   font-weight:bold;
   padding-bottom:50px;

}

.table_deg
{
   border:2px solid red; 
   width:100%;
   margin:auto;
   
   text-align:center;
}

.th_deg
{
    background-color:Red;
}

.img_size
{
  height:140px;
  width:140px;
}


    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
          <div class="content-wrapper">


          <h1 class="title_deg">Orders Here</h1>

          <div style="padding-left:350px; padding-bottom:29px; ">

            <form action="{{url('search')}}" method="get">

            @csrf

            <input type="text" style="color: black;" name="search" placeholder="Search Items">

            <input type="submit" value="search" class="btn btn-outline-warning">
            </form>
          </div>

          <table class="table_deg">

            <tr class="th_deg">

                <th style="padding:8px;">Name</th>
                <th style="padding:8px;">Email</th>
                <th style="padding:8px;">Address</th>
                <th style="padding:8px;">Phone</th>
                <th style="padding:8px;">Product title</th>
                <th style="padding:8px;">Quantity</th>
                <th style="padding:8px;">Price</th>
                <th style="padding:8px;">Payment Status</th>
                <th style="padding:8px;">Delivery Status</th>
                <th style="padding:8px;">Image</th>
                <th style="padding:8px;">Delivered</th>
                <th style="padding:8px;">Print PDF</th>
                <th style="padding:8px;">Send Email</th>
               

                  

            </tr>
        
           @forelse($order as $order)

            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>

                <td><img class="img_size" src="/product/{{$order->image}}"></td>

                
                <td>

                @if($order->delivery_status=='processing')


                  <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered !')" class="btn btn-primary">
                    Delivered</a>

                    @else

                    <p style="color: blue;">Delivered</p>

                  @endif
                </td>

                <td>
                  <a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Print</a>
                </td>

                <td>
                  <a href="{{url('send_email', $order->id)}}" class="btn btn-secondary">Email</a>
                </td>
                
            </tr>
           
            @empty

            <tr>
              <td colspan="15">Data Not Found</td>
            </tr>

           @endforelse
          </table>
</div>
</div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')  
    <!-- End custom js for this page -->

  </body>
</html>