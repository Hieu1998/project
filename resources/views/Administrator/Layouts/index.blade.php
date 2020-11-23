<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/admin_asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/admin_asset/vendors/css/vendor.bundle.base.css">
  <link href="bootstrap-4.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/admin_asset/css/style.css">
  <link href="admin_asset/css/theme.css" rel="stylesheet">
  <!-- endinject -->
  <link rel="shortcut icon" href="/admin_asset/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('Administrator.Layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('Administrator.Layouts.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('Administrator.Layouts.footer')
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/admin_asset/vendors/js/vendor.bundle.base.js"></script>
  <script src="/admin_asset/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/admin_asset/js/off-canvas.js"></script>
  <script src="/admin_asset/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/admin_asset/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <!-- Custom js for this page-->
  <script src="/admin_asset/js/file-upload.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap-4.1/js/jquery-3.3.1.slim.min.js"></script>
  <script src="bootstrap-4.1/popper.min.js"></script>
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'content' );
    $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['content'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Vui lòng không được bỏ trống' );
                e.preventDefault();
            }
        });
</script>
<script>
    function goBack() {
       window.history.back();
    }
</script>
  </html>