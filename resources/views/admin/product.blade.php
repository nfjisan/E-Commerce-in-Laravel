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
                    <h2 style="font-size: 40px; padding-bottom:40px;">Add Product</h2>

                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf


                   <div style="padding-bottom: 15px;">
                    <label style="display: inline-block; width:200px;">Product Title:</label>
                    <input type="text" style="color: black;" name="title" placeholder="write product title" required="">
                   </div>

                   <div style="padding-bottom: 15px;">
                    <label style="display: inline-block; width:200px;">Product Description:</label>
                    <input type="text" style="color: black;" name="description" placeholder="write product description" required>
                   </div>

                   <div style="padding-bottom: 15px;">
                    <label style="display: inline-block; width:200px;">Product Price:</label>
                    <input type="text" style="color: black;" name="price" placeholder="write product price" required>
                   </div>

                   <div style="padding-bottom: 15px;">
                    <label style="display: inline-block; width:200px;">Product Quantity:</label>
                    <input type="text" style="color: black;" name="quantity" placeholder="write quantity" required>
                   </div>


                   <div style="padding-bottom: 15px;">
                    <label style="display: inline-block; width:200px;">Discount Price:</label>
                    <input type="text" style="color: black;" name="discount_price" placeholder="write discount price">
                   </div>

                   <div style="padding-bottom: 15px;">
                    <label style="display: inline-block; width:200px;">Product Catagory:</label>

                    <select  style="color: black;" name="catagory" required>

                        <option value="" selected="">Select product catagory</option>
                        @foreach ($catagory as $catagory)
                        <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                        @endforeach

                    </select>
                   </div>

                   <div style="padding-bottom: 15px;">
                    <label style="display: inline-block; width:200px;">Product Image Here:</label>
                    <input type="file" name="image">
                   </div>

                   <div style="padding-bottom: 15px;">
                    <input class="btn btn-primary" type="submit" value="Add Product">
                   </div>


                </form>

                </div>
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
