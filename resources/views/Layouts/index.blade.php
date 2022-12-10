<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('dashboard/dist/assets/images/logo/logotitle.png') }}" rel="icon">
    <title>Arsip Surat | @yield('title') </title>
    @include('Layouts.style')
  
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            
            @include('Layouts.sidebar')
            
        </div>
        <div id="main">
          @include('sweetalert::alert')
            @include('Layouts.navbar')

            <div class="page-heading">
                <h3>@yield('judul')</h3>
            </div>
            <div class="page-content">
             
                <section class="row">
                   @yield('content')
                </section>
            </div>
           
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">Divta Suryawan</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('Layouts.script')
    @yield('js')

    
   
</body>

</html>