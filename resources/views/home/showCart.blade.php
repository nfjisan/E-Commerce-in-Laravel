<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')


        @if(session()->has('message'))
        <div class="alert alert-success">

            {{session()->get('message')}}

        </div>
        @endif


      <div style="margin: auto; width:50%;">
        <table class="table table-bordered">
            <tr style="font-size: 30px;color:#fff; background:rgb(97, 132, 146)">
                <th>Product title</th>
                <th>Product quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php $totalprice=0; ?>
            @foreach ($cart as $cart)

            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}&#2547;</td>
                <td><img style="width: 110px;" src="/product/{{$cart->image}}"></td>
                <td>
                    <a href="{{url('remove_cart',$cart->id)}}" onclick="return confirm('Are You Sure To Remove This')" class="btn btn-danger">Remove</a>
                </td>
            </tr>
            <?php $totalprice=$totalprice + $cart->price ?>
            @endforeach
        </table>

        <div style="margin: auto; width:50%; text-align:center;">
            <h1 style="font-size: 25px">Total Price :  {{$totalprice}}&#2547;</h1>
        </div>

        <div style="margin: auto; width:50%; text-align:center; padding-top:20px;">
            <h1 style="font-size: 25px; padding-bottom:14px;">Procced To Order</h1>

            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
            <a href="" class="btn btn-danger">Pay Using Cards</a>
        </div>

      </div>


      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
