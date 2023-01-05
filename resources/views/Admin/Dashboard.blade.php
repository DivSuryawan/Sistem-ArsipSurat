@extends('Layouts.index')

@section('title')
Dashboard
@endsection
@section('judul')
Dashboard Admin
@endsection
@section('content') 
<div class = "row" > 
    <div class="col-4 col-lg-4 col-md-4">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon green">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Jumlah Surat Masuk</h6>
                    <h6 class="font-extrabold mb-0">0</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-4 col-lg-4 col-md-4">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon red">
                        <i class="fa-solid fa-envelope-open"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Jumlah Surat Keluar</h6>
                    <h6 class="font-extrabold mb-0">0</h6>
                </div>
            </div>
        </div>
    </div>
</div>
 @if (auth()->user()->status=='sekretaris')
<div class="col-4 col-lg-4 col-md-4">
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-icon blue">
                       <i class="fa-solid fa-users-gear"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h6 class="text-muted font-semibold">Jumlah Users</h6>
                    <h6 class="font-extrabold mb-0">0</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
</div>
</div>
<div class="col-lg-12 mb-4 order-0">
<div class="card">
<div class="d-flex align-items-end row">
    <div class="col-sm-7">
        <div class="card-body">
            <h5 class="card-title text-primary">Selamat Datang Di Dashboard 🎉</h5>

            @auth
                      <p class="mb-4">{{ auth()->user()->name }}</p>
                  @endauth

            <i class="fa-sharp fa-solid fa-face-smile text-warning"></i>
            <a href="javascript:;" class="">Enjoy your work !!!</a>
        </div>
    </div>
    <div class="col-sm-5 text-center text-sm-left">
        <div class="card-body pb-0 px-0 px-md-4">
            <img
                src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template-free/assets/img/illustrations/man-with-laptop-light.png"
                height="350"
                alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png"></div>
        </div>
    </div>
</div>
</div>

@endsection