@extends('Layouts.index')

@section('title')
    Surat Masuk
@endsection
@section('judul')
    Dashboard | Surat Masuk
@endsection
@section('content')
  <div class="card">
    <div class="card-header" style="font-family: Verdana;">
        Data Surat Masuk
    </div>
    <div class="card-body">
        <div
            class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
            <div class="dataTable-top">
                <div class="mt-2 d-grid gap-2 d-md-flex justify-content-md-start ">
                                <button type="button"   class="btn btn-outline-primary "
                                data-bs-toggle="modal"
                                data-bs-target="#upsertdata">
                                + Tambah Data
                                 </button>
                            </div>
                    <div class="dataTable-search">
                        <div class="mt-2 d-grid gap-2 d-md-flex ">
                            <input class="dataTable-input justify-content-md-end " placeholder="Search..." type="text">
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
                 
                <div class="dataTable-container mt-2">
                    <table class="table table-striped dataTable-table" id="table1">
                        <thead>
                            <tr>
                                <th data-sortable="" style="width: 5%;">
                                    <a href="#" class="dataTable-sorter">No</a>
                                </th>
                                <th data-sortable="" style="width: 8%;">
                                    <a href="#" class="dataTable-sorter">No Surat</a>
                                </th>
                                <th data-sortable="" style="width: 11.7632%;">
                                    <a href="#" class="dataTable-sorter">Tanggal Masuk</a>
                                </th>
                                <th data-sortable="" style="width: 11.7632%;">
                                    <a href="#" class="dataTable-sorter">Tujuan/Dari</a>
                                </th>

                                <th data-sortable="" style="width: 11.7632%;">
                                    <a href="#" class="dataTable-sorter">Perihal</a>
                                </th>
                                <th data-sortable="" style="width: 11.7632%;">
                                    <a href="#" class="dataTable-sorter">File Surat</a>
                                </th>
                                <th data-sortable="" style="width: 16.4168%;;">
                                    <a href="#" class="dataTable-sorter">Action</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @php 
                                $no = 1; 
                            @endphp 
                            @if (count($data) > 0)
                            @foreach ($data as $d)
                            <tr>
                               
                                <td>{{$no++}}</td>
                                <td>{{$d->no_surat}}</td>
                                <td>{{$d->tgl_masuk}}</td>
                                <td>{{$d->perihal}}</td>
                                <td>{{$d->alamat}}</td>
                                <td>{{$d->file_surat}}</td>
                                <td>
                                    <a
                                        href="{{ route('suratmasuk.download',$d->file_surat) }}"
                                        class="btn btn-outline-success">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                    <button class="btn btn-outline-primary" id="btn_edit" data-id="{{$d->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <a
                                        href="{{ route('suratmasuk.delete',$d->id) }}"
                                        class="btn btn-outline-danger delete-confirm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                           
                            @else
                               <tr>
                                    <td colspan="7" class="text-center font-bold">
                                     <img src=" {{ asset('dashboard/dist/assets/images/logo/search.png') }}" width="50px" height="50px" alt=""> 
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

    {{-- modal --}}
    <div class="form-group">
        <div
            class="modal fade text-left"
            id="upsertdata"
            tabindex="-1"
            aria-labelledby="myModalLabel33"
            style="display: none;"
            aria-hidden="true">
            <div
                class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Form Upsert Data
                        </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </div>
                        <div class="modal-body">
                            <form
                                id="form-input"
                                action="{{ route('suratmasuk.store') }}"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="fomr-group">
                                    <input type="hidden" id="id" name="id" value=""></div>
                                    <div class=" form-group">
                                        <label for="no_surat">No surat</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="no_surat"
                                            id="no_surat"
                                            aria-describedby="emailHelp"
                                            placeholder="Masukan nomor surat"></div>
                                        <div class="form-group">
                                            <label for="tgl_masuk">Tanggal Masuk</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                name="tgl_masuk"
                                                id="tgl_masuk"
                                                placeholder="Masukan tipe surat"></div>
                                            <div class="form-group">
                                                <label for="perihal">Perihal</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="perihal"
                                                    id="perihal"
                                                    placeholder="Masukan perihal"></div>
                                                <div class="form-group">
                                                    <label for="sifat">Sifat</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        name="sifat"
                                                        id="sifat"
                                                        placeholder="Masukan sifat"></div>
                                                    <div class="form-group">
                                                        <label for="lampiran">Lampiran</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="lampiran"
                                                            id="lampiran"
                                                            placeholder="Masukan Lampiran"></div>
                                                        <div class="form-group">
                                                            <label for="alamat">Tujuan/Dari</label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                name="alamat"
                                                                id="alamat"
                                                                placeholder="Masukan Tujuan/Dari"></div>

                                                            <div class="form-group">
                                                                <label for="file_surat">File Surat</label>
                                                                <input
                                                                    type="file"
                                                                    class="form-control"
                                                                    name="file_surat"
                                                                    id="file_surat"
                                                                    placeholder="Upload file"></div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button
                                                                    type="button"
                                                                    id="batal"
                                                                    class="btn btn-outline-danger"
                                                                    data-dismiss="modal">Close</button>
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
            $.get('/surat-masuk/'+ 'edit/' + dataId, function (data){
                $('#upsertdata').modal('show');
                $('#id').val(data.id);
                $('#no_surat').val(data.no_surat);
                $('#tgl_masuk').val(data.tgl_masuk);
                $('#perihal').val(data.perihal);
                $('#sifat').val(data.sifat);
                $('#lampiran').val(data.lampiran);
                $('#alamat').val(data.alamat);
                $('#file_surat').val(data.$filename);
                $('#form-input').attr('action' , '{{ route('suratmasuk.update') }}');
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
