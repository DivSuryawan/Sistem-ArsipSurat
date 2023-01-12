@extends('Layouts.index')

@section('title')
    Users
@endsection
@section('judul')
    Dashboard | Users
@endsection
@section('content')
<div class="card">
    <div class="card-header" style="font-family: Verdana;">
        Data Users
    </div>
    <div class="card-body">
        <div
            class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
            <div class="dataTable-top">
                <div class="mt-2 d-grid gap-2 d-md-flex justify-content-md-start ">
                    <button
                        type="button"
                        class="btn btn-outline-primary "
                        data-bs-toggle="modal"
                        data-bs-target="#upsertdata">
                        + Tambah Data
                    </button>
                </div>
                <div class="dataTable-search">
                    <div class="mt-2 d-grid gap-2 d-md-flex ">
                        <input
                            class="dataTable-input justify-content-md-end "
                            placeholder="Search..."
                            type="text">
                            <div class="dataTable-dropdown ">
                                <select class="dataTable-selector form-select">
                                    <option value="5">5</option>
                                    <option value="10" selected="">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="dataTable-container">
                    <table class="table table-striped dataTable-table" id="table1">
                        <thead>
                            <tr>
                                <th data-sortable="" style="width: 5%;">
                                    <a href="#" class="dataTable-sorter">No</a>
                                </th>
                                <th data-sortable="" style="width: 8%;">
                                    <a href="#" class="dataTable-sorter">Namat</a>
                                </th>
                                <th data-sortable="" style="width: 10.7632%;">
                                    <a href="#" class="dataTable-sorter">Email</a>
                                </th>
                                <th data-sortable="" style="width: 12.7632%;">
                                    <a href="#" class="dataTable-sorter">Status</a>
                                </th>
                                <th data-sortable="" style="width: 12.7632%;">
                                    <a href="#" class="dataTable-sorter">Action</a>
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>

                            @php $no = 1; 
                            @endphp 

                            @if (count($data) > 0) 

                            @foreach ($data as $d)
                            <tr>

                                <td>{{$no++}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->status}}</td>
                                <td>
                                   
                                   <button class="btn btn-outline-primary" id="btn_edit" data-id="{{$d->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <a
                                        href="{{ route('user.delete',$d->id) }}"
                                        class="btn btn-outline-danger delete-confirm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td colspan="8" class="text-center font-bold">
                                    <img
                                        src=" {{ asset('dashboard/dist/assets/images/logo/search.png') }}"
                                        width="50px"
                                        height="50px"
                                        alt="">
                                        Tidak Ada Data
                                    </td>
                                </tr>
                             @endif

                        </tbody>
                    </table>
                </div>
                <div class="dataTable-bottom">
                    <div class="dataTable-info">Showing 1 to 10 of 26 entries</div>
                    <ul class="pagination pagination-primary float-end dataTable-pagination">
                        <li class="page-item pager">
                            <a href="#" class="page-link" data-page="1">‹</a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link" data-page="1">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link" data-page="2">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link" data-page="3">3</a>
                        </li>
                        <li class="page-item pager">
                            <a href="#" class="page-link" data-page="2">›</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal --}}
<div class="form-group">
     <div class="modal fade text-left" id="upsertdata" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
             <div class="modal-content">
                <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel33">Form Upsert Data </h4>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                </div>
                <div class="modal-body">
                    <form id="form-input" action="{{ route('user.store') }}"  method="POST" enctype="multipart/form-data">
                     @csrf
                       <div class="fomr-group">
                           <input type="hidden" id="id" name="id" value="">
                        </div>
                        <div class=" form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Masukan Nama" >
                         </div>
                         <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option selected disabled>Pilih</option>
                                <option>pimpinan</option>
                                <option>sekretaris</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"  placeholder="Masukan email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Masukan password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="batal" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            <button type="submit" id="simpan" class="btn btn-outline-primary">Save</button>
                        </div>
                </form>
            </div>
             </div>
         </div>
    </div>
 </div>
 
@endsection
@section('js')
<script>
$(document).ready(function(){
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#batal').on('click',function(){
                    location.reload();
        });

        $('body').on('click','#btn_edit', function()
        {
          
            let dataId = $(this).data('id');
            $.get('/user/'+ 'edit/' + dataId, function (data){
                $('#upsertdata').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#status').val(data.status);
                $('#email').val(data.email);
                $('#password').val(data.password);
                $('#form-input').attr('action' , '{{ route('user.update') }}');
            });
        });
});      
</script>
<script>
    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Anda yakin?',
        text: 'Data akan dihapus secara permanen',
        icon: 'warning',
        dangerMode: true,
        buttons:true
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>
@endsection
