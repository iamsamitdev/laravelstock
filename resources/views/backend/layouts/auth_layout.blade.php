<!DOCTYPE html>
<html>
<head>
    @include('backend.includes.head_style')
</head>
<body class="hold-transition login-page">
    
    <div class="login-box">
        @yield('content')
    </div>
    @include('backend.includes.foot_script')
    
</body>
</html>
