<!DOCTYPE html>
<html>
<head>
    <title>TUTOR | LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <meta name="keywords" content=""/>
    <link href="{{URL::asset('public/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/css/style1.css')}}" rel='stylesheet' type='text/css' />

    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!--/webfonts-->
</head>
<body>
<!--start-main-->
<h1>Welcome!<span>Please login...</span></h1>
<div class="login-box">
    <form id="sign_in" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <input type="text" class="text" value="Username" name="email" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Username';}"  tabindex="1" >
        @if ($errors->has('email'))
            <span id="username-error" class="error" for="username">{{ $errors->first('email') }}</span>
        @endif
        <input type="password" value="Password" name="password" style="{{($errors->has('password')) ? 'padding-top:30px' :'padding-top:60px'}}"  onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Password';}"  tabindex="2" >
        @if ($errors->has('password'))
            <span id="password-error" class="error" for="password">{{ $errors->first('password') }}</span>
        @endif

    <div class="remember">
        <a href="#"  tabindex="3"><p><label class="checkbox-inline" {{ old('remember') ? 'checked' : ''}}><input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">Remember me</label></p></a>
        <!--			<h4>Forgot your password?<a href="#"  tabindex="4" >Click here.</a></h4>-->
    </div>
    <div class="clear"> </div>
    <div class="btn"  tabindex="5"><br>

        <button type="submit" class="btn btn-success">Login</button>
        <!--<input type="submit" value="LOG IN" >-->
    </div>
    <div class="clear"> </div>
    </form>
</div>
<!--//End-login-form-->
<!--start-copyright-->
<div class="copy-right">
    <p>Design by : <a href="http://aquadsoft.com/" target="_blank">Aquadsoft</a></p>
</div>
<!--//end-copyright-->
</body>
</html>