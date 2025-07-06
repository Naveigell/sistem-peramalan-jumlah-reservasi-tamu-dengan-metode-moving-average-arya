@extends('layouts.matrix-admin.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Pengguna</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Pengguna
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary pull-right"><span class="fas fa-plus-circle"></span> Tambah Pengguna</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover  display nowrap"  style="width:100%" id="user-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Surel</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            var userTable = $('#user-table').DataTable({
                language: {
                    lengthMenu: "Tampilkan _MENU_ baris",
                    search: "Cari : ",
                    info: "Tampilkan _START_ sampai _END_ dari _TOTAL_ baris",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    }
                },
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '{!! route('users.datatable') !!}',
                columns: [
                    { data: 'no', name: 'no', searchable: false, orderable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'id',orderable: false, searchable: false}
                ],
                rowCallback: function( row, data, iDisplayIndex ) {
                    var api = this.api();
                    var info = api.page.info();
                    var page = info.page;
                    var length = info.length;
                    var index = (page * length + (iDisplayIndex +1));
                    $('td:eq(0)', row).html(index);
                }
            })
        })
    </script>
@endpush