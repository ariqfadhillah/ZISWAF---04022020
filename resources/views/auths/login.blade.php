<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
  <title>Login | Aplikasi ZISWAF Ridho Illahi - hariq fadhillah </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
</head>

<body>
  <!-- WRAPPER -->
  <div id="wrapper">
    <div class="vertical-align-wrap">
      <div class="vertical-align-middle">
        <div class="auth-box ">
          <div class="left">
            <div class="content">
              <div class="header">
               
                <div class="logo text-center"><img src="{{asset('admin/assets/img/logo-dark.png')}}" alt="Klorofil Logo"></div>
                <p class="lead">Masukan Email dan Password</p>
              </div>
              <form class="form-auth-small" action="/postlogin" method="post">
                {{csrf_field()}}

                <div class="form-group">
                  <label for="signin-email" class="control-label sr-only">Email</label>
                  <input name="email" type="email" class="form-control" id="signin-email"  placeholder="Masukan Email" value="{{old('email')}}" required>

                  @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                 <label for="signin-password" class="control-label sr-only">Password</label>
                 <input name="password" type="password" class="form-control" id="pass_log_id" placeholder="Masukan Password" value="{{old('password')}}" required>

                 <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" style="margin-right: 410px;">Show/Hide</span>

                 @if ($errors->has('password'))
                 <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              
              <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
              
            </form>
          </div>
        </div>
        <div class="right">
          <div class="overlay"></div>
          <div class="content text">
           <h1 class="heading">ZISWAF</h1>
           <h4 class="footer">Application Transaction Zakat Infaq Sedekah Wakaf</h4>
           <p>by Ariq_Fadh</p>
         </div>
       </div>
       <div class="clearfix"></div>
     </div>
   </div>
 </div>
</div>
<!-- END WRAPPER -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  $("body").on('click', '.toggle-password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#pass_log_id");
    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }

  });
</script>
<script>
  @if(Session::has('error')){
   toastr.error('{{Session::get('error')}}', 'Afwan')
 }
 @endif
</script>

</html>
