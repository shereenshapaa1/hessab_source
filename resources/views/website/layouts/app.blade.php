 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>شركة حساب للإستشارات المهنية </title>
<!-- Stylesheets -->
<link href="{{ asset('front/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('front/css/responsive.css')}}" rel="stylesheet">
 
<link rel="shortcut icon" href="{{ asset('front/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{ asset('front/images/favicon.png')}}" type="image/x-icon">
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>
 
<div class="page-wrapper">

    <!-- Start of header section
 ============================================= -->
    @include('website.layouts.header')
    <!-- End of header section
 ============================================= -->

    @yield('content')
    <!-- Start of Footer  section
 ============================================= -->
 @include('website.layouts.footer')
    <!-- End of header section
 ============================================= -->
  
  

</body>
</html>