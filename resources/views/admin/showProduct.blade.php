<!DOCTYPE html>
<html lang="en">
 @include('admin.head')
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">


                    {{session()->get('message')}}

                </div>
                @endif

                <div class="product" style="text-align:center; padding-top:40px;">
                    <h2 style="font-size: 40px;">All Products</h2>
                </div>

                <table class="table table-bordered" style="margin: auto; width:50%;text-align:center; margin-top:30px;border:3px solid #fff;">
                    <tr style="background: skyblue">
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Discount Price</th>
                        <th>Catagory</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($product as $product)

                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>{{$product->catagory}}</td>
                        <td>
                            <img src="/product/{{$product->image}}">
                        </td>
                        <td>
                            <a href="{{url('update_product',$product->id)}}" class="btn btn-info">Edit</a>

                            <a href="{{url('delete_product',$product->id)}}" onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
