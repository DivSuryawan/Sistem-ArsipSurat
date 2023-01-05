<div class="sidebar-wrapper active ps ps--active-y">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('dashboard/dist/assets/images/logo/logo.png') }}" style="height: 6vh; width:200px; "    alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        

                        <li class="sidebar-item {{ request()->is('/') ? 'active' :'' }} ">
                            <a href="/" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-title">DATA</li> <hr>
                         <li class="sidebar-item {{ request()->is('surat-masuk/index') ? 'active' :'' }} ">
                            <a href="/surat-masuk/index" class="sidebar-link">
                               <i class="fa-solid fa-envelope-open-text"></i>
                                <span>Surat Masuk</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('surat-keluar/index') ? 'active' :'' }} ">
                            <a href="/surat-keluar/index" class="sidebar-link">
                               <i class="fa-solid fa-envelope-open-text"></i>
                                <span>Surat Keluar</span>
                            </a>
                        </li>
                        
            </div>
        </div>
</div>
