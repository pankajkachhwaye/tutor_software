<!DOCTYPE html>
<html>
<head>
<title>TUTOR | LOGIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content=""/>
<link href="{{URL::asset('public/css/style.css')}}" rel='stylesheet' type='text/css' />

<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!--/webfonts-->
</head>
<body>
<!--start-main-->
<h1>Welcome!<span>Please login...</span></h1>
<div class="login-box">
		<form>
            {{ csrf_field() }}
			<input type="text" class="text" value="Username" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Username';}"  tabindex="1" >
			<input type="password" value="Password" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Password';}"  tabindex="2" >
		</form>
		<div class="remember">
			<a href="#"  tabindex="3"><p><label class="checkbox-inline"><input type="checkbox" value="">Remember me</label></p></a>
<!--			<h4>Forgot your password?<a href="#"  tabindex="4" >Click here.</a></h4>-->
		</div>
		<div class="clear"> </div>
		<div class="btn"  tabindex="5"><br>

<a href="student_details.html"><button type="button" class="btn btn-success">Login</button></a>
			<!--<input type="submit" value="LOG IN" >-->
		</div>
		<div class="clear"> </div>
</div>
<!--//End-login-form-->
<!--start-copyright-->
<div class="copy-right">
	<p>Design by : <a href="http://aquadsoft.com/" target="_blank">Aquadsoft</a></p> 
</div>
<!--//end-copyright-->		
</body>
</html>