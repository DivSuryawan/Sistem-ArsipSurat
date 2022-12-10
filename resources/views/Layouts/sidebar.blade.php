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
                         <li class="sidebar-item  {{ request()->is('surat-keluar/index') ? 'active' :'' }}">
                            <a href="/surat-keluar/index" class="sidebar-link">
                              <i class="fa-solid fa-envelope-open"></i>
                                <span>Surat Keluar</span>
                            </a> 
                        </li><hr>
                        <li class="sidebar-item  ">
                            <a href="#" class="sidebar-link" >
                                <button type="button" class="btn btn-outline-primary block"
                                            data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                          <i class="fa-solid fa-right-from-bracket"></i>Log Out
                                        </button>
                            </a>
                        </li>
                       
            </div>
        </div>
</div>
{{-- modal log out --}}
<div class="col-md-6 col-12">
     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"     role="document">
                   <div class="modal-content">
                        <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalCenterTitle">Log Out</h5>
                               <button type="button" class="close" data-bs-dismiss="modal"aria-label="Close">
                                  <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Are You Sure ?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-danger"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                       
                                                        <button type="button" class="btn btn-outline-info">
                                                             <a href="{{ route('logout') }}">
                                                            <span class="d-none d-sm-block">Yes</span>
                                                            </a>
                                                        </button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
 

