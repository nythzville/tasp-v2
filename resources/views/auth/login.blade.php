<!DOCTYPE html>
<!-- saved from url=(0108)file:///C:/Users/mac0/Desktop/Mavericks/themes/Color/seantheme.com/color-admin-v1.7/admin/html/login_v3.html -->
<html lang="en"><!--<![endif]--><!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 11:03:48 GMT --><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>Color Admin | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<!-- <link href="{{url('Elearn/login_files')}}/css" rel="stylesheet"> -->
	<link href="{{url('Elearn/login_files')}}/jquery-ui.min.css" rel="stylesheet">
	<link href="{{url('Elearn/login_files')}}/bootstrap.min.css" rel="stylesheet">
	<link href="{{url('Elearn/login_files')}}/font-awesome.min.css" rel="stylesheet">
	<link href="{{url('Elearn/login_files')}}/animate.min.css" rel="stylesheet">
	<link href="{{url('Elearn/login_files')}}/style.min.css" rel="stylesheet">
	<link href="{{url('Elearn/login_files')}}/style-responsive.min.css" rel="stylesheet">
	<!-- <link href="file:///C:/Users/mac0/Desktop/Mavericks/themes/Color/seantheme.com/color-admin-v1.7/admin/html/assets/css/theme/orange.css" rel="stylesheet" id="theme"> -->

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script async="" src="{{url('Elearn/login_files')}}/analytics.js.download"></script><script src="{{url('Elearn/login_files')}}/pace.min.js.download"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>

<style type="text/css">
    .login .login-header .brand .logo {
    border: 14px solid transparent;
    border-color: #f69a3a #f9732d #f1511f;
}

.btn.btn-success.active, .btn.btn-success:active, .btn.btn-success:focus, .btn.btn-success:hover, .open .dropdown-toggle.btn-success {
    background: #f69a3a;
    border-color: #f69a3a;
}
.btn.btn-success {
    color: #fff;
    background: #f9732d;
    border-color: #f9732d;
}
</style>
<div class="pace-activity"></div></div>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in hide"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade in">
	    <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="{{url('Elearn')}}/assets/img/english-course/everynight.jpg" data-id="login-cover-image" alt="">
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"></i> Easy A English Learning</h4>
                    <p>In EASYA ENGLISH we don’t start the class unless the student is comfortable.
                    Take a 30-minute free trial class with us so that we can assess your English Level and show you how the lessons work!

                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> Easy A English
                        <small>ONE OF THE BEST PLACE TO LEARN ENGLISH</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form method="POST" class="margin-bottom-0" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-b-15">
                            <input id="email" type="email" name="email" class="form-control input-lg" placeholder="Email Address" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-b-15">
                            <input  id="password" type="password" name="password" class="form-control input-lg" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="checkbox m-b-30">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
                        </div>
                        <!-- <div class="m-t-20 m-b-40 p-b-40">
                            Not a member yet? Click <a href="file:///C:/Users/mac0/Desktop/Mavericks/themes/Color/seantheme.com/color-admin-v1.7/admin/html/register_v3.html" class="text-success">here</a> to register.
                        </div> -->
                        <hr>
                        <p class="text-center text-inverse">
                            © MAKENA All Right Reserved 2017
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
        
        
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{url('Elearn/login_files')}}/jquery-1.9.1.min.js.download"></script>
	<script src="{{url('Elearn/login_files')}}/jquery-migrate-1.1.0.min.js.download"></script>
	<script src="{{url('Elearn/login_files')}}/jquery-ui.min.js.download"></script>
	<script src="{{url('Elearn/login_files')}}/bootstrap.min.js.download"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{url('Elearn/login_files')}}/jquery.slimscroll.min.js.download"></script>
	<script src="{{url('Elearn/login_files')}}/jquery.cookie.js.download"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{url('Elearn/login_files')}}/apps.min.js.download"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-53034621-1', 'auto');
      ga('send', 'pageview');
    </script>


<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 11:03:50 GMT -->

</body></html>