<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset("admin/lib/owlcarousel/assets/owl.carousel.min.css") }}" rel="stylesheet">
    <link href="{{ asset("admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css") }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset("admin/css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset("admin/css/style.css") }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('admin') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class=""></i>Admin panel</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                    <img class="rounded-circle" src="{{ asset('img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Qodirov Abrorbek</h6>
                        <span>Admin</span>
                    </div>
                </div>
               <div class="navbar-nav w-100">
                    <a href="{{ route('admin') }}" class="nav-item nav-link " ><i class="fa fa-home"></i>Home</a>
                    <a href="{{ route('all.main') }}" class="nav-item nav-link "><i class="fa fa-cog" aria-hidden="true"></i>Main</a>
                    <a href="{{ route('all.offer') }}" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Offer</a>
                    <a href="{{ route('all.category') }}" class="nav-item nav-link "><i class="fa fa-table me-2"></i>Category</a>
                    <a href="{{ route('all.product') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Product</a>
                    <a href="{{ route('all.collection') }}" class="nav-item nav-link "><i class="fa fa-chart-bar me-2"></i>Collection</a>
                    <a href="{{ route('all.hotitem') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Hotitem</a>
                    <a href="{{ route('all.ourblog') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Ourblog</a>
                    <a href="{{ route('all.productimage') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Product Image</a>
                    <a href="{{ route('all.productcolor') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Product color</a>
                    <a href="{{ route('all.productsetcolor') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>ProductSetcolor</a>
                    <a href="{{ route('all.productsize') }}" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>Product Size</a>
                     <a href="{{ route('all.productsetsize') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>ProductSetsize</a>
                    <a href="{{ route('all.review') }}" class="nav-item nav-link "><i class="fa fa-chart-bar me-2"></i>Review</a>


                </div>
            </nav>
        </div>

<center style="width: 100%">
<div class=" content mt-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-end">
            <a href="{{ route('productsize.add') }}" class="btn btn-primary float-right">Add to product size </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Size</th>
                <th>Controll</th>

              </tr>
              </thead>
              <tbody>
                @foreach ($productsizes as $item)
                  <tr>


                    <th>{{ $item->id }}</th>
                    <td>{{ $item->size }}</td>
                    <td width="12%">
                      <a href="{{ route('productsize.edit' , $item->id) }}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                      <a href="{{ route('productsize.delete' , $item->id) }}" class="btn btn-danger" title="Delete" id="delete"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
</center>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset("admin/lib/chart/chart.min.js") }}"></script>
    <script src="{{ asset("admin/lib/easing/easing.min.js") }}"></script>
    <script src="{{ asset("admin/lib/waypoints/waypoints.min.js") }}"></script>
    <script src="{{ asset("admin/lib/owlcarousel/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("admin/lib/tempusdominus/js/moment.min.js") }}"></script>
    <script src="{{ asset("admin/lib/tempusdominus/js/moment-timezone.min.js") }}"></script>
    <script src="{{ asset("admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js") }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset("admin/js/main.js") }}"></script>
</body>

</html>
