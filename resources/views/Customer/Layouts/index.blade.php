<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Ariranglon</title>
    <base href="{{asset('')}}" />
    <!-- Bootstrap CSS-->
    <link href="bootstrap-4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main CSS-->
    <link href="user_asset/css/theme.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body class="animsition toTop">
    <div class="container-scroller">
        @include('Customer.Layouts.header')
        <div class="page-body-wrapper">
          <div class="main-panel">
             @yield('content')
         </div>
         <!-- main-panel ends -->
         @include('Customer.Layouts.footer')
     </div>
 </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="bootstrap-4.1/js/jquery-3.3.1.slim.min.js"></script>
<script src="bootstrap-4.1/popper.min.js"></script>
<script src="bootstrap-4.1/js/bootstrap.js"></script>
<!-- Jquery JS-->
</body>
</html>
<!-- end document-->