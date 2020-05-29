<!DOCTYPE html>
<html>
<head>
    @include('frontend.includes.head_style')
</head>
<body class="hold-transition login-page">
    
    <div class="login-box">
        @yield('content')
    </div>
    @include('frontend.includes.foot_script')
    
</body>
</html>
