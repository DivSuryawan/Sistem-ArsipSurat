<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="{{ asset('dashboard/dist/assets/images/logo/logotitle.png') }}" rel="icon">
    <title>Arsip Surat | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/dist/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('dashboard/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{asset('dashboard/dist/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{asset('dashboard/dist/assets/css/pages/auth.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="">
                        <a href="#"><img src="{{ asset('dashboard/dist/assets/images/logo/logologin.png') }}" height="70px" width="380px" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title mt-5">Log in.</h1>
                    <form action="{{route('auth.loginproccess')}}" method="POST">

                        @csrf
                         @if (session('status'))
                        <div class="mt-4">
                            <p class="text-success text-center">{{ session('status') }}</p>
                        </div>
                        @endif
                        @if (session('error'))
                            <div class="mt-4">
                                <p class="text-danger text-center">{{ session('error') }}</p>
                            </div>
                        @endif
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="email" id="email" placeholder="Email">
                            <div class="form-control-icon">
                              <i class="fa-regular fa-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" id="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                       
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3" type="submit">Log in</button>
                    </form>
                   
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                     <img src="{{ asset('dashboard/dist/assets/images/logo/logomini.png') }}" width="900px" height="750px">
                   
                </div>
         
                </div>
            </div>
        </div>

    </div>


</body></html>