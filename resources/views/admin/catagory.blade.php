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

                <div class="catagory" style="text-align:center; padding-top:40px;">
                    <h2 style="font-size: 40px;">Add Catagory</h2>

                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf

                        <input type="text" style="color: black;" name="catagory" placeholder="write catagory name">
                        <input type="submit" name="submit" class="btn btn-success" value="Add Catagory">
                    </form>
                </div>

                <table class="table table-bordered" style="margin: auto; width:50%;text-align:center; margin-top:30px;border:3px solid #fff;">
                    <tr>
                        <th>Catagory Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($data as $data)
                    <tr>

                        <td>{{$data->catagory_name}}</td>
                        <td>
                            <a onclick="return confirm('Are You Sure To Delete This')" href="{{url('delete_catagory',$data->id)}}" class="btn btn-danger">Delete</a>
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
